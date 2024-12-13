<?php

use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('blogs', BlogController::class);
Route::resource('blog_categories', BlogCategoryController::class);
