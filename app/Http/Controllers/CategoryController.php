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

    public function addCategory(Request $request){
        $this->validate($request,[
        'id'=> 'required',
        'name'=>'required',
        'status'=>'required',
    ]);

        $new= new Category();
        $new->id=$request->input('id');
        $new->name=$request->input('name');
        $new->status=$request->input('status');
        $new->save();

        return redirect('/admin/categories')->with('success','Data is stored successfully.');
    }

}

