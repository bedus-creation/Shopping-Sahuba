<?php

use App\Application\Admin\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::group(
    ['prefix' => 'admin', 'middleware' => ['auth', "role:admin"]],
    function () {
        Route::get("/", [DashboardController::class, ["index"]]);
        Route::get('/command/{command}', 'CommandController@command');
        Route::resource('/users', 'Admin\UserController')->only(["index", "edit", "update"]);
        Route::get('jobs', 'System\JobsController');
    }
);
