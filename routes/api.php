<?php

use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;

Route::post('users/login', [UserController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::post('/users', [UserController::class, 'store']);

    Route::post('/posts', [PostController::class, 'store']);
    Route::get('/posts/today', [PostController::class, 'getPostsToday']);
    Route::get('/posts/week', [PostController::class, 'getPostsThisWeek']);
    Route::get('/posts/all', [PostController::class, 'getAllPosts']);
});