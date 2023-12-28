<?php

namespace App\Http\Controllers;

use App\Models\CounterUp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class CounterUpController extends Controller
{
    function counterup(){
        $counter_details=CounterUp::all();
        return view('counter_up_section.counter',[
            'counter_details'=>$counter_details,

        ]);
    }
    function counterup_store(Request $request){
        $request->validate([
            'counter_head'=>'required',
            'counter_number'=>'required',
            'counter_image'=>'required',
        ]);
        $counter_image=$request->counter_image;
        $extension=$counter_image->extension();
        $file_name=Auth::user()->id.'.'.$extension;
        $image=Image::make($counter_image)->save(public_path('counterUp/image/'.$file_name));

        CounterUp::insert([
            'counter_head'=>$request->counter_head,
            'counter_number'=>$request->counter_number,
            'counter_image'=>$file_name,


        ]);
    }
    function counterup_edit($id){
        $counter_details=CounterUp::find($id);
        return view('counter_up_section.counter_edit',[
            'counter_details'=>$counter_details,
        ]);
    }
    function counterup_remove($id){
        CounterUp::find($id)->delete();
    }
    function counterup_edit_store(Request $request,$id){
        $counter_details=CounterUp::find($id);
        $current_image=public_path('counterUp/image/'.$counter_details->counter_image);
        unlink($current_image);
        $request->validate([
            'counter_head'=>'required',
            'counter_number'=>'required',
            'counter_image'=>'required',
        ]);
        $counter_image=$request->counter_image;
        $extension=$counter_image->extension();
        $file_name=Auth::user()->id.'.'.$extension;
        $image=Image::make($counter_image)->save(public_path('counterUp/image/'.$file_name));
        CounterUp::find($id)->update([
            'counter_head'=>$request->counter_head,
            'counter_number'=>$request->counter_number,
            'counter_image'=>$file_name,


        ]);


    }
}
