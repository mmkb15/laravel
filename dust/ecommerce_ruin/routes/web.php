<?php

use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth Routes (guest)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    /*
    |--------------------------------------------------------------------------
    | Existing modules (already done — resource routes example)
    |--------------------------------------------------------------------------
    | Route::resource('categories', CategoryController::class);
    | Route::resource('brands', BrandController::class);
    | Route::resource('products', ProductController::class);
    */

    /*
    |--------------------------------------------------------------------------
    | Role module
    |--------------------------------------------------------------------------
    */
    Route::resource('roles', RoleController::class);

    /*
    |--------------------------------------------------------------------------
    | User module
    |--------------------------------------------------------------------------
    */
    Route::resource('users', UserController::class);

    /*
    |--------------------------------------------------------------------------
    | Attribute module
    |--------------------------------------------------------------------------
    */
    Route::resource('attributes', AttributeController::class);
    Route::delete('attribute-values/{value}', [AttributeController::class, 'destroyValue'])->name('attribute-values.destroy');

    /*
    |--------------------------------------------------------------------------
    | Coupon module
    |--------------------------------------------------------------------------
    */
    Route::resource('coupons', CouponController::class);

    /*
    |--------------------------------------------------------------------------
    | Order module (index, show, edit-status, update-status)
    |--------------------------------------------------------------------------
    */
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    Route::put('orders/{order}', [OrderController::class, 'update'])->name('orders.update');

    /*
    |--------------------------------------------------------------------------
    | Review module (index, show, destroy)
    |--------------------------------------------------------------------------
    */
    Route::get('reviews', [ReviewController::class, 'index'])->name('reviews.index');
    Route::get('reviews/{review}', [ReviewController::class, 'show'])->name('reviews.show');
    Route::delete('reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
});
