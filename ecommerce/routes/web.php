<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerAccountController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestCustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StorefrontController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Fontend Routes
Route::get('/', [StorefrontController::class, 'home'])->name('home');
Route::get('/contact', function () {
    return view('frontend.pages.contact');
})->name('contact');
Route::get('/shop', [StorefrontController::class, 'shop'])->name('shop');
Route::get('/product/{product:slug}', [StorefrontController::class, 'show'])->name('product');
Route::get('/cart', [StorefrontController::class, 'cart'])->name('cart');
Route::get('/cart/products', [StorefrontController::class, 'cartProducts'])->name('cart.products');
Route::get('/checkout', [StorefrontController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [StorefrontController::class, 'placeOrder'])->name('checkout.store');

// Admin Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::get('/admin/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1')->name('login.store');
Route::post('/admin/login', [AuthController::class, 'login'])->middleware('throttle:5,1');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::get('/admin/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register'])->middleware('throttle:5,1')->name('register.store');
Route::post('/admin/register', [AuthController::class, 'register'])->middleware('throttle:5,1');
Route::get('/forgot-password', [PasswordController::class, 'requestForm'])->name('password.request');
Route::post('/forgot-password', [PasswordController::class, 'sendResetLink'])->middleware('throttle:5,1')->name('password.email');
Route::get('/reset-password/{token}', [PasswordController::class, 'resetForm'])->name('password.reset');
Route::post('/reset-password', [PasswordController::class, 'reset'])->middleware('throttle:5,1')->name('password.update');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class)->except('show');
    Route::resource('brands', BrandController::class)->except('show');
    Route::resource('orders', OrderController::class)->only(['index', 'create', 'store', 'show']);
    Route::patch('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.status');
    Route::get('/users/guest-customers', [GuestCustomerController::class, 'index'])->name('users.guests');
    Route::get('/users/guest-customers/{guestCustomer}/edit', [GuestCustomerController::class, 'edit'])->name('users.guests.edit');
    Route::put('/users/guest-customers/{guestCustomer}', [GuestCustomerController::class, 'update'])->name('users.guests.update');
    Route::delete('/users/guest-customers/{guestCustomer}', [GuestCustomerController::class, 'destroy'])->name('users.guests.destroy');
    Route::resource('users', UserController::class)->except('show');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::put('/profile', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
});

Route::middleware(['auth', 'customer'])->prefix('account')->name('account.')->group(function () {
    Route::get('/', [CustomerAccountController::class, 'index'])->name('index');
    Route::get('/orders/{order}', [CustomerAccountController::class, 'showOrder'])->name('orders.show');
    Route::put('/profile', [CustomerAccountController::class, 'updateProfile'])->name('profile.update');
});
