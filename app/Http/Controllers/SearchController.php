<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function search(Request $request){
        $products=Product::where('name','like','%'.$request->q.'%')
            ->get();
        return view('search.index',compact('products'));
    }
}
