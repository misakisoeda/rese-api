<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ShopController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UsersController;
// use App\Http\Controllers\LikesController;
// use App\Http\Controllers\BookingController;

Route::get('/shop', [ShopController::class, 'index']);
Route::get('/shop/{shop_id}', [ShopController::class, 'store']);

Route::post('/register', [RegisterController::class, 'post']);
Route::post('/login', [LoginController::class, 'post']);

Route::post('/logout', [LogoutController::class, 'post']);

Route::get('/user', [UsersController::class, 'get']);
Route::put('/user', [UsersController::class, 'put']);

// Route::post('/like', [LikesController::class, 'post']);
// Route::delete('/like', [LikesController::class, 'delete']);

// Route::post('/booking', [BookingController::class, 'post']);
