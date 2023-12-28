<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Order_product;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    function index(){
        $categories=Category::all();
        $products=Product::all();
        $product=Product::where('status',1)->get();
        $latest = Product::latest()->paginate(3);

        return view('frontend.index',[
            'categories'=>$categories,
            'product'=>$product,
            'products'=>$products,
            'latest'=>$latest,
        ]);
    }
    function category_product($id){
        $categories=Product::where('category_id',$id)->get();
        return view('frontend.category_product',[
            'categories'=>$categories,
        ]);
    }
    function category_products($id){
        $categories=Product::where('subcategory_id',$id)->get();
        return view('frontend.category_product',[
            'categories'=>$categories,
        ]);
    }
    function product_details($slug){
        $product_id=Product::where('slug',$slug)->first()->id;
        $product_details=Product::find($product_id);
        $available_color=Inventory::where('product_id',$product_id)->groupBy('color_id')->selectRaw('count(*) as total,color_id')->get();
        $available_size=Inventory::where('product_id',$product_id)->groupBy('size_id')->selectRaw('count(*) as total,size_id')->get();


        return view('frontend.product_details',[
            'product_details'=>$product_details,
            'available_color'=>$available_color,
            'available_size'=>$available_size,
        ]);
    }
    function review_store(Request $request){
        Order_product::where('customer_id',Auth::guard('customer')->id())->where('product_id',$request->product_id)->first()->update([
            'star'=>$request->stars,
            'review'=>$request->review,

        ]);
    }
    function shop(Request $request){
        $data=$request->all();

        $products=Product::where(function($q) use ($data){
            if(!empty($data['search_input'])&&$data['search_input']!=''&&$data['search_input']!='undefined'){
                $q->where(function($q) use ($data){
                    $q->where('product_name','Like','%'.$data['search_input'].'%')->count();

                });

            }

        })->get();
        return view('frontend.shop',[
            'products'=>$products
        ]);
    }
}
