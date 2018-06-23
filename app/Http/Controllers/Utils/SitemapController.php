<?php

namespace App\Http\Controllers\Utils;

use App\Http\Controllers\Controller;

class SitemapController extends Controller{

    public function generate(){
        $product=[];
        $shop=[];
        $category=[];
        $content = view('utils.sitemap', ["product"=>$product,'category'=>$category,'shop'=>$shop]);
        return response($content, 200)
            ->header('Content-Type', 'text/xml');
    }

}