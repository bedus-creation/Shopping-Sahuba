<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $data=\App\Models\Product::OrderBy('id','desc')->get();
        return view('welcome',['data'=>$data]);
    }

    public function shop(){
        return view('front/shop/details');
    }
    
    public function product($id){
        $data=\App\Models\Product::where(['id'=>$id])->OrderBy('id','desc')->first();
        return view('front/product/details',['product'=>$data]);
    }
}
