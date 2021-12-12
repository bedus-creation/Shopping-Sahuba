<?php

use App\Application\Auth\Controllers\LoginController;
use App\Application\Auth\Controllers\RegisterController;
use App\Application\Base\Controllers\MediaController;
use App\Application\Client\Controllers\CategoryController;
use App\Application\Client\Controllers\ProductController;
use App\Application\Client\Controllers\SettingController;
use App\Application\Front\Controllers\PageController;
use App\Application\Front\Controllers\SearchController;
use App\Application\Front\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, "index"]);
Route::get('shop/{slug}/{id}', [PageController::class, "shop"]);
Route::get('product/{slug}/{id}', [PageController::class, "product"]);
Route::get('search/', SearchController::class);

Route::resource('medias', MediaController::class)->only(["index", "store", "destroy"]);
Route::get('sitemap.xml', [SitemapController::class, "generate"]);

Route::resource('categories', CategoryController::class);

Route::group(['prefix' => 'shopping', 'middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('bend.page.index');
    });
    Route::resource('/products', ProductController::class);
    Route::get('settings', [SettingController::class, "general"]);
    Route::post('settings', [SettingController::class, 'store']);
});


// Authentication
Route::post("/register", [RegisterController::class, "register"]);
Route::post("/logout", [LoginController::class, "logout"])->name("logout");

Route::get('auth/email-authenticate/{token}', 'Auth\AuthController@authenticateEmail');
Route::get('oauth/{driver}', 'Auth\SocialAuthController@redirectToProvider')->name('social.oauth');
Route::get('oauth/{driver}/callback', 'Auth\SocialAuthController@handleProviderCallback')->name('social.callback');
Route::get('/home', 'HomeController@index')->name('home');
