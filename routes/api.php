<?php

use App\Http\Controllers\BlogCategoryAPIController;
use App\Http\Controllers\BlogAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('blogs', BlogCategoryAPIController::class);


Route::apiResource('blog_categories', BlogCategoryAPIController::class);
