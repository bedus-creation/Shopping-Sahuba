<?php

namespace App\Application\Front\Controllers;

use App\Core\Http\Controllers\Controller;
use App\Domain\Inventory\Models\Product;

/**
 * Class SitemapController
 * @package App\Http\Controllers\Utils
 */
class SitemapController extends Controller
{
    public function generate()
    {
        $products = Product::with('medias')->orderBy('id', 'desc')->get();
        $shop = [];
        $category = [];
        $content = view('utils.sitemap', ["products" => $products, 'category' => $category, 'shop' => $shop]);

        return response($content, 200)
            ->header('Content-Type', 'text/xml');
    }
}
