<?php

namespace App\Application\Front\Controllers;

use App\Core\Http\Controllers\Controller;
use App\Domain\Inventory\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $products = Product::where('name', 'like', '%'.$request->q.'%')
            ->get();

        return view('search.index', compact('products'));
    }
}
