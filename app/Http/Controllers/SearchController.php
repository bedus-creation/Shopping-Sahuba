<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $products = Product::where('name', 'like', '%'.$request->q.'%')
            ->get();

        return view('search.index', compact('products'));
    }
}
