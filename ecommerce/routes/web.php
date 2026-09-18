<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;



// Temporary: dashboard without auth (login system later)
Route::get('/', function () {
    return view('admin.pages.dashboard');
})->name('dashboard');

Route::get('/login', function () {
    return view('admin.pages.auth.login');
})->name('login');

Route::get('/register', function () {
    return view('admin.pages.auth.register');
})->name('register');

Route::resource('categories', CategoryController::class);

Route::resource('products', ProductController::class);