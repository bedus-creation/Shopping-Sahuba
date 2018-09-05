<?php

Route::get('/', 'PageController@index');
Route::get('shop/{slug}/{id}', 'PageController@shop');
Route::get('product/{slug}/{id}','PageController@product');
Route::get('search/','SearchController@search');

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
    Route::get('settings','SettingController@general');
    Route::post('settings','SettingController@store');
});

// system level admin routes
Route::group(['middleware'=>['auth']],function(){
    Route::get('jobs','System\JobsController');
});






Route::get('test', function () {
    \App\Jobs\EmailJobs::dispatch();

    return 'ok';
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
