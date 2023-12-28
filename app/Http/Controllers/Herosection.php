<?php

namespace App\Http\Controllers;

use App\Models\HerosectionContent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class Herosection extends Controller
{
    public function herosection(){
        $hero_details=HerosectionContent::all();
        return view('herosection.herosection',[
            'hero_details'=>$hero_details,
        ]
    );
    }
    public function herosection_post(Request $request){

       $request->validate([
        'h_text'=>'required',
        'p_text'=>'required',
        'h_image'=>'required',
       ]);
       $h_image=$request->h_image;
       $extension=$h_image->extension();
       $file_name=Str::lower(str_replace(' ','-',Auth::user()->name)).'-'.random_int(100000,900000).'.'.$extension;
       $image=Image::make($h_image)->save(public_path('hero_image/image/'.$file_name));

       HerosectionContent::insert([
        'h_text'=>$request->h_text,
        'p_text'=>$request->p_text,
        'h_image'=>$file_name,

       ]);
    }
    function heroedit($id){
        $details=HerosectionContent::find($id);
        return view('herosection.hero_edit',[
            'details'=>$details,
        ]);
    }
    function heroedit_store(Request $request,$id){
        $detail=HerosectionContent::find($id);


        $request->validate([
            'h_text'=>'required',
            'p_text'=>'required',
            'h_image'=>'required',
           ]);
           $current_image=public_path('hero_image/image/'.$detail->h_image);
            unlink($current_image);
           $h_image=$request->h_image;
           $extension=$h_image->extension();
           $file_name=Str::lower(str_replace(' ','-',Auth::user()->name)).'-'.random_int(100000,900000).'.'.$extension;
           $image=Image::make($h_image)->save(public_path('hero_image/image/'.$file_name));
           HerosectionContent::find($id)->update([
            'h_text'=>$request->h_text,
            'p_text'=>$request->p_text,
            'h_image'=>$file_name,

           ]);




    }
    function heroedit_remove($id){
        HerosectionContent::find($id)->delete();
    }
}
