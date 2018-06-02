<?php


Route::get('/', function () {
    return view('welcome');
});


Route::get('shop/{slug}', function () {
    return view('front/company/details');
});
Route::get('jobs/{slug}', function () {
    return view('front/jobs/details');
});

Route::get('posts', function () {
    $data= ["hekki"];
    return $data;
});
