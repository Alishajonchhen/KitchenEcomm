<?php

namespace App\Http\Controllers\Frontend;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $items = Cart::with('product')->where('user_id', Auth::id())->orderBy('id', 'desc')->get();
        // return $items;
        return view("front.addTocart", compact('items'));
    }

    /**
     * Add product to cart
     * 
     * @param int $productId
     * 
     * @return JSONResponse
     */
    public function addToCart($productId)
    {
        // return response($productId);
        $product = Product::findOrFail($productId);
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
            Cart::where('id', $cartExist->id)->increment('quantity', 1);
        }


        return response()->json(['success' => "Product added to cart successfully."], 200);
    }
}
