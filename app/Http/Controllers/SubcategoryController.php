<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function subcategory(){
        $categories=Category::all();
        return view('subcategory.subcategory',[
            'categories'=>$categories,
        ]);
    }
    public function subcategory_store(Request $request){
        Subcategory::insert([
            'category_id'=>$request->category_id,
            'subcategory_name'=>$request->subcategory_name,
        ]);

    }
    public function sub_remove($id){
        Subcategory::find($id)->find($id)->delete();

    }
    public function sub_edit($id){
        $categories=Category::all();
        Subcategory::find($id)->find($id);
        return view('subcategory.subcategory_edit',[
            'categories'=>$categories,
        ]);

    }
    function sub_edit_store(Request $request){
        Subcategory::find($request->category_id)->update([
            'category_id'=>$request->category_id,
            'subcategory_name'=>$request->subcategory_name,

        ]);
    }
}
