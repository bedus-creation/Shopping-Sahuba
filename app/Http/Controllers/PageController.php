<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Product;

class PageController extends Controller
{
    public function index(){
        $user= \App\User::all();
        $data=Product::with('medias')
            ->with('price')
            ->OrderBy('id','desc')->get();
        return view('welcome',['data'=>$data,'users'=>$user]);
    }

    public function shop($slug,$id){
        $shop=User::where('id',$id)
            ->with('products.medias')
            ->with('products.price')
            ->with('coverImage')
            ->with('profileImage')
            ->firstOrFail();
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
