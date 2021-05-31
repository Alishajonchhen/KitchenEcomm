<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Traits\UploadImage;
use Illuminate\Support\Str;

class AdminCategoryController extends Controller
{
    use UploadImage;
    public function listCategory()
    {
        $categories = Category::get();
        return view('admin.categories.category')->with(compact('categories'));
    }

    public function addCategory(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories',
            'status' => 'required',
        ]);
        //location to save the category image
        $storelocation = "lib/Images/categories/";

        $new = new Category();
        $new->category_code = $request->input('category_code');
        $new->name = $request->input('name');
        $new->slug = Str::slug($request->input('name'));
        $new->status = $request->input('status');
        if ($request->hasFile('category_image')) {

            $fileNameToStore = $this->uploadimagePublic($request->category_image, $storelocation);
            $new->category_image = $fileNameToStore;
        }
        $new->save();

        return redirect('/admin/categories')->with('success', 'Category is added successfully.');
    }

    public function delete($id)
    {
        $product = Product::with('category')->where('category_id', $id)->first();
        if (!$product) {
            $category = Category::findOrFail($id);
            if ($category->category_image) {
                $image_path = public_path() . '/lib/Images/categories/' . $category->category_image;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            $category->delete();
            return redirect()->route('admin.categories.category')->with('success', 'Category deleted successfully.');
        } else {
            return redirect()->route('admin.categories.category')->with('error', $product->category->name . ' category is used by product. Please delete associated product first to delete this category.');
        }
    }

    public function edit($id)
    {
        $editData = Category::findOrFail($id);
        return view('admin.categories.editCategory', compact('editData'));
    }


    /**
     * Update the Category
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
                'name' => 'required|unique:categories,name,' . $id,
                'status' => 'required'
            ]
        );
        //location to save the category image
        $storelocation = "lib/Images/categories/";

        $category = Category::FindOrFail($id);
        $category['category_code'] = $request->category_code;
        $category['name'] = $request->name;
        $category['slug'] = Str::slug($request->name);
        $category['status'] = $request->status;
        if ($request->hasFile('category_image')) {
            //first remove the image
            if ($category->category_image) {
                $image_path = public_path() . '/lib/Images/categories/' . $category->category_image;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            //and then save the new image
            $fileNameToStore = $this->uploadimagePublic($request->category_image, $storelocation);
            $category->category_image = $fileNameToStore;
        }

        $category->update();

        return redirect()->route('admin.categories.category')->with('success', 'Category  updated successfully.');
    }
}
