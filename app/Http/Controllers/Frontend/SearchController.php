<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Exception;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    /**
     * Search the product with the matching category or products
     * 
     * @param String $searched
     * 
     * @return JSONResponse
     */
    public function search(Request $request)
    {
        try {
            if ($request->keyword) {

                $categories = Category::where('name', 'LIKE', "%{$request->keyword}%")
                    ->where('status', 1)
                    ->get();
                $products = Product::where('product_name', 'LIKE', "%{$request->keyword}%")
                    ->where('status', 1)
                    ->get();
                $newData = $products->merge($categories);
            } else {
                $newData = [];
            }

            return response()->json(['success' => 'Data fetched.', 'data' => $newData], 200);
        } catch (Exception $e) {

            return response()->json(['error' => 'Problem fetching data.'], 500);
        }
    }
}
