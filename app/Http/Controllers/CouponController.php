<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Coupon;

class CouponController extends Controller
{
    function coupon(){
        $coupons=Coupon::all();
        return view('coupon.coupon',[
            'coupons'=>$coupons,
        ]);
    }
    function coupon_store(Request $request){
        Coupon::insert([
            'coupon_name'=>$request->coupon_name,
            'type'=>$request->type,
            'amount'=>$request->amount,
            'limit'=>$request->limit,
            'validity'=>$request->validity,
            'created_at'=>Carbon::now(),

        ]);
        return back();
    }
    function ChangeCoupon(Request $request){
        Coupon::find($request->coupon_id)->update([

            'status'=>$request->status,
        ]);
    }
}
