<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * List all the products associated with a specific category
     * 
     * @param String $slug
     */
    public function index($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $products = Product::with('category')
            ->where('available', '>', 0)
            ->where('category_id', $category->id)->get();
        // return $category;
        // return $products;
        return view("front.product", compact('category', 'products'));
    }

    /**
     * Show specific product Detail
     * 
     * @param Int $id
     * @return Renderable
     */
    public function productDetail($id)
    {
        $product = Product::where('id', $id)->where('status', 1)->first();

        return view('front.productDetail', compact('product'));
    }
}
