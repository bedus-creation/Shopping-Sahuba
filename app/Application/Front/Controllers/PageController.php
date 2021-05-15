<?php

namespace App\Application\Front\Controllers;

use App\Core\Http\Controllers\Controller;
use App\Domain\Inventory\Models\Product;
use App\Domain\Users\Models\User;

/**
 * Class PageController
 *
 * @package App\Application\Front\Controllers
 */
class PageController extends Controller
{
    public function index()
    {
        $user = User::with('profileImage', 'profile')->limit(10)->get();

        $data = Product::with('medias')
            ->with('price')
            ->limit(20)
            ->OrderBy('id', 'desc')->get();

        return view('welcome', ['data' => $data, 'users' => $user]);
    }

    public function shop($slug, $id)
    {
        $shop = User::query()
            ->with('products.medias')
            ->with('products.price')
            ->with('coverImage')
            ->with('profileImage')
            ->findOrFail($id);

        return view('front/shop/details', compact('shop'));
    }

    public function product($name, $id)
    {
        $data = Product::where(['id' => $id])
            ->with('price')
            ->first();

        $data->views += 1;
        $data->save();

        return view('front/product/details', ['product' => $data]);
    }
}
