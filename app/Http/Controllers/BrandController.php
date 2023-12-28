<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
   function brand(){
    return view('brand.brand');
   }
   function brand_store(Request $request){
        $photo=$request->brand_img;
        $extension=$photo->extension();
        $file_name=Str::lower(str_replace(' ','-',$request->brand_name)).'-'.random_int(100000,900000).'.'.$extension;
        $image=Image::make($photo)->save(public_path('uploads/brand/'.$file_name));
        Brand::insert([
            'brand_name'=>$request->brand_name,
            'brand_img'=>$file_name,

        ]);
        return back();
   }
}
