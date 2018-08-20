<?php

namespace App\Http\Controllers\Utils;

use App\Http\Controllers\Controller;
use App\Models\Product;

class SitemapController extends Controller{

    public function generate(){
        $products=Product::with('medias')->get();
        $shop=[];
        $category=[];
        $content = view('utils.sitemap', ["products"=>$products,'category'=>$category,'shop'=>$shop]);
        return response($content, 200)
            ->header('Content-Type', 'text/xml');
    }

}