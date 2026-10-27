<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.pages.dashboard');
})->name('dashboard');

Route::get('/login', function () {
    return view('admin.pages.auth.login');
})->name('login');

Route::get('/register', function () {
    return view('admin.pages.auth.register');
})->name('register');

// NOTE: auth middleware not added yet (login system pending) - resources are open for demo
Route::resource('categories', CategoryController::class);
Route::resource('brands', BrandController::class);
Route::resource('products', ProductController::class);

// Uncomment below once User/UserController + auth are wired up:
// use App\Http\Controllers\UserController;
// Route::middleware('auth')->group(function () {
//     Route::resource('users', UserController::class);
// });

// require __DIR__.'/auth.php';
