<?php


Route::get('/', 'PageController@index');
Route::get('shop/{slug}', 'PageController@shop');
Route::get('product/{id}','PageController@product');

Route::group(['namespace'=>'Utils'], function () {
    Route::get('/command/{command}', 'CommandController@command');
    Route::resource('media','MediaController');
    Route::get('sitemap.xml','SitemapController@generate');
});


Route::group(['prefix'=>'shopping'],function(){
    Route::get('/', function () {
        return view('bend.page.index');
    });
    Route::resource('/products', 'ProductController');
});







Route::get('posts', function () {
    $data= ["hekki"];
    return $data;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
