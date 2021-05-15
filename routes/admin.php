<?php

use App\Application\Admin\Controllers\DashboardController;
use App\Http\Controllers\System\JobsController;
use Illuminate\Support\Facades\Route;

Route::get("/", [DashboardController::class,"index"]);
//Route::resource('users', UsersCon)->only(["index", "edit", "update"]);
Route::get('jobs', JobsController::class);
