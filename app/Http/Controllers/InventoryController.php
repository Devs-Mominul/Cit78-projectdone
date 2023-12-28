<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Category;
use App\Models\Size;
use App\Models\Product;
use App\Models\Inventory;


class InventoryController extends Controller
{
    function variation(){
        $colors=Color::all();
        $categories=Category::all();
        $sizes=Size::all();
        return view('variation.variation',[
            'colors'=>$colors,
            'categories'=>$categories,
            'sizes'=>$sizes,
        ]);
    }
    function variation_post(Request $request){
        Color::insert([
            'color_name'=>$request->color_name,
            'color_code'=>$request->color_code,

        ]);
        return back();
    }
    function variation_remove($id){
        Color::find($id)->delete();
        return back();
    }
    function size_post(Request $request){
        Size::insert([
            'category_id'=>$request->category_id,
            'size_name'=>$request->size_name,

        ]);
        return back();
    }
    function inventory_view($id){
        $product=Product::find($id);
        $color=Color::all();
        $inventory=Inventory::where('product_id',$id)->get();

        return view('variation.inventory',[
            'product'=>$product,
            'color'=>$color,
            'inventory'=>$inventory,
        ]);
    }
    function inventory_store(Request $request,$id){
        Inventory::insert([
            'product_id'=>$id,
            'color_id'=>$request->color_id,
            'size_id'=>$request->size_id,
            'quantity'=>$request->quantity,

        ]);
        return back();
    }
}
