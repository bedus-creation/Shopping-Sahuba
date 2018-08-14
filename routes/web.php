<?php


Route::get('/', 'PageController@index');
Route::get('shop/{slug}/', 'PageController@shop');
Route::get('product/{slug}/{id}','PageController@product');

Route::group(['namespace'=>'Utils'], function () {
    Route::get('/command/{command}', 'CommandController@command');
    Route::resource('medias','MediaController');
    Route::get('sitemap.xml','SitemapController@generate');
});


Route::group(['prefix'=>'shopping'],function(){
    Route::get('/', function () {
        return view('bend.page.index');
    });
    Route::resource('/products', 'ProductController');
});







Route::get('test', function () {
   return view('test');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
