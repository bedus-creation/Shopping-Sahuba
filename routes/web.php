<?php


Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace'=>'Utils'], function () {
    Route::get('/command/{command}', 'CommandController@command');
});


Route::get('shopping', function () {
    return view('bend.page.index');
});
Route::get('shopping/products/create', function () {
    return view('bend.product.create');
});



Route::get('shop/{slug}', function () {
    return view('front/shop/details');
});
Route::get('product/{slug}', function () {
    return view('front/product/details');
});


Route::get('posts', function () {
    $data= ["hekki"];
    return $data;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
