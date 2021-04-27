<?php

use App\Mail\TestMail;
use App\Mail\Client\SignUpEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'PageController@index');
Route::get('shop/{slug}/{id}', 'PageController@shop');
Route::get('product/{slug}/{id}', 'PageController@product');
Route::get('search/', 'SearchController@search');

Route::group(['namespace' => 'Utils'], function () {
    Route::get('/command/{command}', 'CommandController@command');
    Route::resource('medias', 'MediaController');
    Route::get('sitemap.xml', 'SitemapController@generate');
});

Route::resource('categories', 'Utils\CategoryController');

Route::group(['prefix' => 'shopping', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', function () {
        return view('bend.page.index');
    });
    Route::resource('/products', 'ProductController');
    Route::get('settings', 'SettingController@general');
    Route::post('settings', 'SettingController@store');
});


// Authentication
Auth::routes(['verify' => true]);

Route::get('auth/email-authenticate/{token}', 'Auth\AuthController@authenticateEmail');
Route::get('oauth/{driver}', 'Auth\SocialAuthController@redirectToProvider')->name('social.oauth');
Route::get('oauth/{driver}/callback', 'Auth\SocialAuthController@handleProviderCallback')->name('social.callback');
Route::get('/home', 'HomeController@index')->name('home');
