<?php

Route::get('/', function () {
    return view('welcome');
});


Route::get('company/{slug}', function () {
    return view('front/company/details');
});
Route::get('jobs/{slug}', function () {
    return view('front/jobs/details');
});
