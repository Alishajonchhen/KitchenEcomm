<?php

namespace App\Http\Controllers\Frontend;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Order;
use App\OrderDeliveryDetail;
use App\OrderItem;
use App\OrderPaymentDetail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Place the order once user checksout
     * @param Request $request
     *
     * @return Renderable
     */
    public function store(OrderRequest $request)
    {
        DB::beginTransaction();
        try {
            $carts =  Cart::where('is_checked_out', 0)
                ->where('user_id', Auth::id())
                ->get();
            $sum = $carts->sum('total');

            $order = Order::create([
                'order_no' => time(),
                'user_id' => Auth::id(),
                'status' => 0,
                'total' => $sum,
                'grand_total' => $sum
            ]);

            foreach ($carts as $key => $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'total' => $item->total,
                    'discount' => $item->discount,
                    'price' => $item->price,
                ]);
            }

            //order delivery
            OrderDeliveryDetail::create([
                'order_id' => $order->id,
                'full_name' => $request['full_name'],
                'contact_number' => $request['contact_number'],
                'email' => $request['email'],
                'delivery_location' => $request['delivery_location'],
                'address' => $request['address'],
                'message' => $request['message'],
            ]);

            //saving the payment method
            OrderPaymentDetail::create([
                'order_id' => $order->id,
                'payment_method' => 'cash'
            ]);

           //making the cart items as checked out
            Cart::where('user_id', Auth::id())->update(['is_checked_out' => 1]);

            DB::commit();
            Session::flash('success', 'Thank you for shopping with us. Do shop again!!');
            return redirect()->route('checkout-order');
        } catch (Exception $e) {
            return $e;
           DB::rollBack();
            return redirect()->back()->with('error', 'Problem creating order');
        }
    }

    /**
     * Tracking the user order
     *
     * @return renderable
     */
    public function orderTrack()
    {

        $orderItems = OrderItem::with('product', 'order.payment')
            ->whereHas('order', function ($q) {
                $q->where('user_id', Auth::id());
            })
            ->orderBy('id', 'desc')
            ->get();

        return view('front.trackOrder', compact('orderItems'));
    }

    /**
     * User canceling the ordered item | specific item
     *
     */
    public function cancelOrderItem(Request $request, $id)
    {
        $item = OrderItem::findOrFail($id);

        $item->update(['status' => 2, 'canceled_by' => Auth::id()]);

        return redirect()->back()->with('success', 'Order canceled successfully.');
    }
}
