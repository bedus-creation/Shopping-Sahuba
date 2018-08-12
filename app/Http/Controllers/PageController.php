<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $user= \App\User::all();
        $data=\App\Models\Product::with('medias')->OrderBy('id','desc')->get();
        return view('welcome',['data'=>$data,'users'=>$user]);
    }

    public function shop(){
        return view('front/shop/details');
    }
    
    public function product($name,$id){
        $data=\App\Models\Product::where(['id'=>$id])->first();
        return view('front/product/details',['product'=>$data]);
    }
}
