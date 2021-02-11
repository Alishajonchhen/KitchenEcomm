<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function listProduct(){
        $products=Product::get();
        return view('admin.products.product')->with(compact('products'));
    }
    public function addCategory(Request $request){
        $this->validate($request,[
            'product_id'=> 'required',
            'product_name'=>'required',
            'product_price'=>'required',
            'product_discount'=>'required',
            'product_description'=>'required',
            'product_voltage'=>'required',
            'product_color'=>'required',
            'product_image'=>'required',
            'category_id'=>'required',
            'status'=>'required',
        ]);

        $new=new Product();

        $new->product_id=$request->input('product_id');
        $new->product_name=$request->input('product_name');
        $new->product_price=$request->input('product_price');
        $new->product_discount=$request->input('product_discount');
        $new->product_discount=$request->input('product_description');
        $new->product_voltage=$request->input('product_voltage');
        $new->product_color=$request->input('product_color');
        $new->product_image=$request->input('product_image');
        $new->category_id=$request->input('category_id');
        $new->status=$request->input('status');

        $new->save();

        return redirect('/admin/products')->with('success','Data saved.');
    }
}
