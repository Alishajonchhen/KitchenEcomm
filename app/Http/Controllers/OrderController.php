<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItem;
use App\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    /**
     * All the orders
     */
    public function index()
    {

        $orders = Order::with('items', 'orderDeliveryAddress', 'payment')
            ->orderBy('id', 'desc')
            ->get();
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Update the status of the order
     * 
     * @param int $id
     * 
     * @return Renderable
     */
    public function updateStatus(Request $request, $id)
    {

        $order = Order::with('items')->where('id', $id)->first();
        DB::beginTransaction();
        try {
            if ($request->status == 1) {
                $order->update(['status' => 1, 'completed_by' => Auth::id()]);
                OrderItem::where('order_id', $order->id)
                    ->where('status', '!=', 2)
                    ->update(['status' => 1]);

                //this updates the available qunatity of the product
                foreach ($order->items as $key => $item) {

                    $product = Product::where('id', $item->product_id)->first();
                    if ($item->quantity <= $product->available) {

                        $product->update(['available' => ($product->available - $item->quantity)]);
                    } else {
                        return redirect()->back()->with('error', 'Not enough ' . $product->product_name . ' available to sell.Please add stock first.');
                    }
                }
            }
            if ($request->status == 2) {
                $order->update(['status' => 2, 'canceled_by' => Auth::id(), 'canceled_date' => today()]);
                OrderItem::where('order_id', $order->id)
                    ->where('status', '!=', 1)
                    ->update(['status' => 2, 'canceled_by' => Auth::id()]);
            }
            DB::commit();
        } catch (Exception $e) {
            return redirect()->back()->with('success', 'Something went wrong');
        }

        return redirect()->back()->with('success', 'Order status updated successfully.');
    }

    /**
     * View the order details
     * 
     * @param int $id
     * @return Renderable
     */

    public function viewOrder($id)
    {
        $order = Order::with('items', 'orderDeliveryAddress', 'payment')->where('id', $id)->first();

        return view('admin.orders.viewOrder', compact('order'));
    }

    /**
     * Cancel the Order
     * 
     * @param int $id
     * 
     * @return Renderable
     */
    public function delete($id)
    {
        $order = Order::findOrFail($id);
        $order->update([
            'canceled'
        ]);
        $order->update($id);
        return redirect()->back()->with('success', 'Order canceled  successfully.');
    }

    /**
     * Update the orderItem status
     * 
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function updateItemStatus(Request $request, $id)
    {

        if ($request->status == 2) {

            $item =  OrderItem::where('id', $id)->update(
                [
                    'status' => 2,
                    'canceled_by' => Auth::id(),
                    'remarks' => $request->remarks
                ]
            );
        } else {
            $item = OrderItem::where('id', $id)->update(['status' => $request->status]);
        }

        return redirect()->back()->with('success', 'Item status updated successfully.');
    }
}
