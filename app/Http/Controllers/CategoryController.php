<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    function category(){
        $category=Category::all();
        return view('category.category',[
            'category'=>$category,
        ]);
    }
    function category_store(Request $request){
        $photo=$request->category_img;
        $extension=$photo->extension();
        $file_name=Str::lower(str_replace(' ','-',$request->category_name)).'-'.random_int(100000,900000).'.'.$extension;
        $image=Image::make($photo)->save(public_path('uploads/category/'.$file_name));
        Category::insert([
            'category_name'=>$request->category_name,
            'category_img'=>$file_name,
            'created_at'=>Carbon::now(),
        ]);

    }
    function category_update($id){
        $categories=Category::find($id);
        return view('category.category_list',[
            'categories'=>$categories,
        ]);
    }
    function category_update_store(Request $request){
        $categories=Category::find($request->category_id);
      if($request->category_img==null){
        Category::find($request->category_id)->update([
            'category_name'=>$request->category_name,
            'created_at'=>Carbon::now(),

        ]);

    }
    else{
        $current_img=public_path('uploads/category/'.$categories->category_img);
        unlink($current_img);
        $photo=$request->category_img;
        $extension=$photo->extension();
        $file_name=Str::lower(str_replace(' ','-',$request->category_name)).'-'.random_int(100000,900000).'.'.$extension;
        $image=Image::make($photo)->save(public_path('uploads/category/'.$file_name));
        $categories=Category::find($request->category_id)->update([
            'category_name'=>$request->category_name,
            'category_img'=>$file_name,
        ]);

    }
    }
}
