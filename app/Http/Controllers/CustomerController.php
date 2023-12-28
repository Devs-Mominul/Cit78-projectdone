<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class CustomerController extends Controller
{
    function Customer_order(){
        $myorders=Order::where('customer_id',Auth::guard('customer')->id())->get();
        return view('order.order',[
            'myorders'=>$myorders,
        ]);
    }
    function invoice_download($id){
        $data=Order::find($id);
        $pdf = PDF::loadView('invoice.invoice', [
            'data'=>$data,
        ]);

        return $pdf->download('asha.pdf');
    }
}
