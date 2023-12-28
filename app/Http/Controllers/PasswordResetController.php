<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\PasswordReset;
use App\Notifications\PasswordResetNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class PasswordResetController extends Controller
{
    function password_reset_controller(){
        return view('frontend.customer.password_reset_req');
    }
    function password_reset_controller_post(Request $request){
      if(Customer::where('email',$request->email)->exists()){
        $customer=Customer::where('email',$request->email)->first();
        PasswordReset::where('customer_id',$customer->id)->delete();
        $reset_info=PasswordReset::create([
            'customer_id'=>$customer->id,
            'token'=>uniqid(),
            'created_at'=>Carbon::now(),

        ]);
      }
      Notification::send($customer, new PasswordResetNotification($reset_info));
    }
    function password_reset_form($token){
        return view('frontend.password_reset_form',[
            'token'=>$token,
        ]);
    }
    function password_reset_confirm(Request $request,$token){
       $customer_id=PasswordReset::where('token',$token)->first()->customer_id;
       Customer::find($customer_id)->update([
        'password'=>bcrypt($request->password),
        'updated_at'=>Carbon::now()

       ]);
       PasswordReset::where('token',$token)->delete();
    }
}
