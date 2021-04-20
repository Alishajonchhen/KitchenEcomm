<?php

namespace App\Http\Controllers;

use App\Category;
use App\OrderItem;
use Illuminate\Support\Str;
use App\Product;
use App\Traits\UploadImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use UploadImage;
    public function listProduct()
    {
        $products = Product::with('category')->get();
        $categories = Category::where('status', 1)->get();
        return view('admin.products.product')->with(compact('products', 'categories'));
    }

    public function addProduct(Request $request)
    {
        $this->validate($request, [
            'product_code' => 'nullable|unique:products',
            'product_name' => 'required',
            'product_price' => 'required',
            'product_discount' => 'sometimes|nullable|numeric',
            'product_description' => 'required|min:5',
            'product_color' => 'required',
            'product_image' => 'required|mimes:jpeg,jpg,png,gif',
            'category_id' => 'required',
            'status' => 'required',
        ]);

        $storelocation = "lib/Images/products/";

        $new = new Product();

        $new->product_code = $request->input('product_code');
        $new->product_name = $request->input('product_name');
        $new->product_price = $request->input('product_price');
        $new->product_discount = $request->input('product_discount');
        $new->quantity = $request->input('quantity');
        $new->available = $request->input('quantity');
        $new->product_description = $request->input('product_description');
        $new->product_voltage = $request->input('product_voltage');
        $new->product_color = $request->input('product_color');
        $new->category_id = $request->input('category_id');
        $new->status = $request->input('status');
        if ($request->hasFile('product_image')) {

            $fileNameToStore = $this->uploadimagePublic($request->product_image, $storelocation);
            $new->product_image = $fileNameToStore;
        }
        $new->save();


        return redirect()->route('admin.products.product')->with('success', 'Product is added successfully.');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);

        $orderItem = OrderItem::where('product_id', $id)->first();
        if (!$orderItem) {
            if ($product->product_image) {
                $image_path = public_path() . '/lib/Images/products/' . $product->product_image;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            $product->delete();
        } else {
            return redirect()->back()->with('error', 'Some quantity of product is already sold. so it cannot be canceled.Please deactive the item.');
        }
        return redirect()->route('admin.products.product')->with('success', 'Product is deleted successfully.');
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $editData = Product::with('category')->findOrFail($id);
        $categories = Category::all();
        return view('admin.products.editProduct')->with(compact('editData', 'categories'));
    }

    /**
     * Update the product
     * 
     * @param Request $request
     * @param int $id
     * 
     * @return response
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'product_name' => 'required',
                'product_price' => 'required',
                'product_discount' => 'sometimes|nullable|numeric',
                'product_description' => 'required|min:5',
                'product_color' => 'required',
                'product_image' => 'nullable|mimes:jpeg,jpg,png,gif',
                'category_id' => 'required',
                'status' => 'required',
            ]
        );
        $storelocation = "lib/Images/products/";
        $new = Product::where('id', $id)->first();
        if ($new) {

            $new['product_code'] = $request->product_code;
            $new['product_name'] = $request->product_name;
            $new['product_price'] = $request->product_price;
            $new['product_discount'] = $request->product_discount;
            $new['product_description'] = $request->product_description;
            $new['product_voltage'] = $request->product_voltage;
            $new['product_color'] = $request->product_color;
            $new['category_id'] = $request->category_id;
            $new['status'] = $request->status;
            if ($request->hasFile('product_image')) {
                //first remove the image 
                if ($new->product_image) {
                    $image_path = public_path() . '/lib/Images/products/' . $new->product_image;
                    if (file_exists($image_path)) {
                        unlink($image_path);
                    }
                }
                //and then save the new image
                $fileNameToStore = $this->uploadimagePublic($request->product_image, $storelocation);
                $new->product_image = $fileNameToStore;
            }

            $new->update();

            return redirect()->route('admin.products.product')->with('success', 'Product  updated successfully.');
        } else {
            return redirect()->route('admin.products.product')->with('error', 'Product not found');
        }
    }
}
