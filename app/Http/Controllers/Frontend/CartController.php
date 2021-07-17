<?php

namespace App\Http\Controllers\Frontend;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * List all the item added to cart
     * checkout
     *
     *
     */
    public function index()
    {
        $items = Cart::with('product')->where('user_id', Auth::id())
            ->where('is_checked_out', 0)
            ->orderBy('id', 'desc')
            ->get();
        // return $items;
        return view("front.viewCart", compact('items'));
    }

    /**
     * Add product to cart
     *
     * @param int $productId
     *
     * @return JSONResponse
     */
    public function addToCart(Request $request, $productId)
    {
        $product = Product::find($productId);
        $cartExist = Cart::where('product_id', $productId)
            ->where('is_checked_out', 0)
            ->where('user_id', Auth::id())
            ->first();
        if (!$cartExist) {
            Cart::create([
                'product_id' => $product->id,
                'user_id' => Auth::id(),
                'quantity' => 1,
                'total' => $product->product_price * 1,
                'discount' => $product->product_discount,
                'price' => $product->product_price,

            ]);
        } else {
            if ($cartExist && $request->qty && isset($request->singlePage)) {
                $qty = $request->qty;
                $cart = Cart::where('id', $cartExist->id)->first();
                $cart->update(['quantity' => $qty + $cart->quantity, 'total' => ($cart->price * ($qty + $cart->quantity))]);
            } else {
                if ($request->qty) {
                    $qty = $request->qty;
                    $cart = Cart::where('id', $cartExist->id)->first();
                    $cart->update(['quantity' => $qty, 'total' => ($cart->price * $qty)]);
                } else {
                    $cart = Cart::where('id', $cartExist->id)->first();
                    $cart->increment('quantity', 1, ['total' => ($cart->price * $cart->quantity)]);
                }
            }
        }

        $count = Cart::where('is_checked_out', 0)
            ->where('user_id', Auth::id())
            ->count();
        return response()->json(['success' => "Product added to cart successfully.", 'data' => $count], 200);
    }

    /**
     * Remove from the cart
     *
     * @param int $id
     * @return JSONResponse
     */
    public function removeItemFromCart($id)
    {
        DB::beginTransaction();
        try {
            $cart = Cart::where('id', $id)->where('is_checked_out', 0)->first();
            if ($cart) {
                $cart->delete();
            } else {
                DB::rollback();
                return response()->json(['error' => "Problem deleting cart."], 500);
            }
            $count = Cart::where('is_checked_out', 0)
                ->where('user_id', Auth::id())
                ->count();
            DB::commit();
            return response()->json(['success' => "Cart deleted successfully.", 'data' => $count], 200);
        } catch (Exception $th) {
            DB::rollback();
            return response()->json(['error' => "Cart deleted successfully.", 'data' => $count], 200);
        }
    }


    /**
     * Checkout view page
     *
     * @return Render
     */
    public function checkoutOrder()
    {
        $user = Auth::user();
        $carts = Cart::where('is_checked_out', 0)
            ->where('user_id', Auth::id())
            ->get();

        return view('front.checkout', compact('user', 'carts'));
    }
}
