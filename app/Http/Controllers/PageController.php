<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PageController extends Controller
{
    public function index(){
        $user= \App\User::all();
        $data=\App\Models\Product::with('medias')->OrderBy('id','desc')->get();
        return view('welcome',['data'=>$data,'users'=>$user]);
    }

    public function shop($slug,$id){
        $shop=User::find($id)->with('products')->firstOrFail();
        return view('front/shop/details',compact('shop'));
    }
    
    public function product($name,$id){
        $data=\App\Models\Product::where(['id'=>$id])
            ->with('price')->first();
        $data->views+=1;
        $data->save();

        return view('front/product/details',['product'=>$data]);
    }
}
