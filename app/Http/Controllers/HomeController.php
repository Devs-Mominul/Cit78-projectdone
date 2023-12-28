<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    function profile_image_update(Request $request){
        $photo=$request->photo;
         $extension=$photo->extension();
        $file_name=Auth::user()->id.'.'.$extension;
        $image = Image::make($photo)->resize(320, 240)->save(public_path('image_profile/'.$file_name));
        User::find(Auth::user()->id)->update(
         [
            'photo'=>$file_name,
         ]
         );




    }
}
