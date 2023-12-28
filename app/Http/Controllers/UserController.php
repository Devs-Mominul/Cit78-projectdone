<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function user_list(){
        $users=User::all();
        return view('User.user_list',[
            'users'=>$users,
        ]);
    }
    function user_remove($id){
        User::find($id)->delete();
        return back()->with('delete','user delete succesfully');

    }
}
