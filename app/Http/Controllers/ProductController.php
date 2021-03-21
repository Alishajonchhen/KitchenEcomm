<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function listProduct()
    {
        $products = Product::get();
        return view('admin.products.product')->with(compact('products'));
    }

    public function addProduct(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'product_name' => 'required',
            'product_price' => 'required',
            'product_discount' => 'required',
            'product_description' => 'required|min:5',
            'product_voltage' => 'required',
            'product_color' => 'required',
            'product_image' => 'required|mimes:jpeg,jpg,png,gif',
            'category_id' => 'required',
            'status' => 'required',
        ]);

        $new = new Product();

        $new->id = $request->input('id');
        $new->product_name = $request->input('product_name');
        $new->product_price = $request->input('product_price');
        $new->product_discount = $request->input('product_discount');
        $new->product_description = $request->input('product_description');
        $new->product_voltage = $request->input('product_voltage');
        $new->product_color = $request->input('product_color');
        $new->category_id = $request->input('category_id');
        $new->status = $request->input('status');
        $new->product_image = $request->input('product_image');
        dd($request);
        $new->save();
        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $ext = $image->getClientOriginalExtension();
            $imageName = Str::random() . '.' . $ext;
            $uploadPath = public_path('lib/Images/products/');
            $image->move($uploadPath, $imageName);

            $new['product_image'] = $imageName;
            $new->id = $request->input('id');
            $new->product_name = $request->input('product_name');
            $new->product_price = $request->input('product_price');
            $new->product_discount = $request->input('product_discount');
            $new->product_description = $request->input('product_description');
            $new->product_voltage = $request->input('product_voltage');
            $new->product_color = $request->input('product_color');
            $new->category_id = $request->input('category_id');
            $new->status = $request->input('status');
            $new->save();
            return redirect('/admin/products')->with('success', 'Data is added successfully.');
        }
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        if (Product::findOrFail($id)->delete()) {
            return redirect()->route('admin.products.product')->with('success', 'Data is deleted successfully.');
        }
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $editData = Product::findOrFail($id);
        return view('admin.products.editProduct')->with(compact('editData'));
    }

    public function editAction(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }
        if ($request->isMethod('post')) {
            try {
                $this->validate($request, [
                        'id' => 'required',
                        'product_name' => 'required',
                        'product_price' => 'required',
                        'product_discount' => 'required',
                        'product_description' => 'required|min:5',
                        'product_voltage' => 'required',
                        'product_color' => 'required',
                        'product_image' => 'required|mimes:jpeg,jpg,png,gif',
                        'category_id' => 'required',
                        'status' => 'required',
                    ]
                );
                dd($request);
            } catch (\Throwable $e) {
                dd($e);
            }
            $id = $request->id;
            dd($id);
            $new['id'] = $request->id;
            $new['product_name'] = $request->product_name;
            $new['product_price'] = $request->product_price;
            $new['product_discount'] = $request->product_discount;
            $new['product_description'] = $request->product_description;
            $new['product_voltage'] = $request->product_voltage;
            $new['product_color'] = $request->product_color;
            $new['product_image'] = $request->product_image;
            $new['category_id'] = $request->category_id;
            $new['status'] = $request->status;

            if (Product::where('id', $id)->update($new)) {
                return redirect()->route('admin.products.product')->with('success', 'Data is updated successfully.');
            }
        }
    }
}
