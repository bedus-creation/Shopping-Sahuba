<?php


Route::get('/', function () {
    return view('welcome');
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
