<?php


Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace'=>'Utils'], function () {
    Route::get('/command/{command}', 'CommandController@command');
    Route::resource('media','MediaController');
});


Route::group(['prefix'=>'shopping'],function(){
    Route::get('/', function () {
        return view('bend.page.index');
    });
    Route::resource('/products', 'ProductController');
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
