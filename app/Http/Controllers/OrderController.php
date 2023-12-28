<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    function orders(){
        $orders=Order::where('customer_id',Auth::guard('customer')->id())->get();
        return view('orders.order',[
            'orders'=>$orders
        ]);
    }
    function order_status(Request $request){
       Order::where('order_id',$request->order_id)->update([
        'status'=>$request->status,

       ]);
    }
}
