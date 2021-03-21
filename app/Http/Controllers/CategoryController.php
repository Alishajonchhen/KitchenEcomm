<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{

    public function listCategory()
    {
        $categories = Category::get();
        return view('admin.categories.category')->with(compact('categories'));
    }

    public function addCategory(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'name' => 'required',
            'status' => 'required',
        ]);

        $new = new Category();
        $new->id = $request->input('id');
        $new->name = $request->input('name');
        $new->status = $request->input('status');
        $new->save();

        return redirect('/admin/categories')->with('success', 'Data is added successfully.');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        if (Category::findOrFail($id)->delete()) {
            return redirect()->route('admin.categories.category')->with('success', 'Data is deleted successfully.');
        }
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $editData = Category::findOrFail($id);
        return view('admin.categories.editCategory', compact('editData'));
    }

    public function editAction(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'id' => 'required',
                'name' => 'required',
                'status' => 'required'
            ]
            );
            $id = $request->id;
            $new['id']=$request->id;
            $new['name']=$request->name;
            $new['status']=$request->status;

            if (Category::where('id',$id)->update($new)){
                return redirect()->route('admin.categories.category')->with('success', 'Data is updated successfully.');
            }
        }
    }
}

