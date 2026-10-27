<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CustomerAccountController;
use App\Http\Controllers\Api\Frontend\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/products', [HomeController::class, 'products']);
Route::get('/categories', [HomeController::class, 'categories']);
Route::post('/orders', [HomeController::class, 'storeOrder']);

Route::prefix('auth')->name('api.auth.')->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1')->name('login');
    Route::post('/register', [AuthController::class, 'register'])->middleware('throttle:5,1')->name('register');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->middleware('throttle:5,1')->name('password.email');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->middleware('throttle:5,1')->name('password.update');
    Route::get('/user', [AuthController::class, 'user'])->middleware('auth:sanctum')->name('user');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('logout');
});

Route::prefix('account')->name('api.account.')->middleware(['auth:sanctum', 'customer'])->group(function () {
    Route::get('/orders', [CustomerAccountController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [CustomerAccountController::class, 'showOrder'])->name('orders.show');
    Route::put('/profile', [CustomerAccountController::class, 'updateProfile'])->name('profile.update');
});
