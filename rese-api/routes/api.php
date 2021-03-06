<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ShopController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LikesController;
// use App\Http\Controllers\BookingController;

// Route::get('/shop', [ShopController::class, 'index']);
// Route::get('/shop/{shop_id}', [ShopController::class, 'store']);

Route::prefix('shop')->group(function () {
    Route::get('', [ShopController::class, 'index']);
    Route::get('/shop/{shop_id}', [UserController::class,'store']);
});

Route::post('/register', [RegisterController::class, 'post']);

Route::post('/login', [LoginController::class, 'post']);

Route::post('/logout', [LogoutController::class, 'post']);

Route::get('/user', [UsersController::class, 'get']);
Route::put('/user', [UsersController::class, 'put']);

// Route::get('/like', [LikesController::class, 'index']);
Route::post('/like', [LikesController::class, 'post']);
Route::delete('/like',[LikesController::class,'destroy']);
// Route::post('/like', [LikesController::class, 'delete']);
// Route::get('/delete', [LikesController::class, 'delete']);
// Route::post('/delete', [LikesController::class, 'remove']);


// Route::post('/booking', [BookingController::class, 'post']);
