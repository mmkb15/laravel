<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthController,DashboardController,ProductController,CategoryController,BrandController,OrderController,UserController,ReportController};

Route::middleware('guest')->group(function(){ Route::get('/login',[AuthController::class,'showLogin'])->name('login'); Route::get('/admin/login',[AuthController::class,'showLogin']); Route::post('/login',[AuthController::class,'login'])->name('login.store'); Route::post('/admin/login',[AuthController::class,'login']); Route::get('/register',[AuthController::class,'showRegister'])->name('register'); Route::get('/admin/register',[AuthController::class,'showRegister']); Route::post('/register',[AuthController::class,'register'])->name('register.store'); Route::post('/admin/register',[AuthController::class,'register']); });
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth')->name('logout');
Route::middleware(['auth'])->group(function(){
 Route::get('/',[DashboardController::class,'index'])->name('dashboard');
 Route::resource('products',ProductController::class)->except('show');
 Route::resource('categories',CategoryController::class)->except('show');
 Route::resource('brands',BrandController::class)->except('show');
 Route::resource('orders',OrderController::class)->only(['index','create','store','show']);
 Route::patch('/orders/{order}/status',[OrderController::class,'updateStatus'])->name('orders.status');
 Route::resource('users',UserController::class)->except('show');
 Route::get('/profile',[UserController::class,'profile'])->name('profile'); Route::put('/profile',[UserController::class,'updateProfile'])->name('profile.update');
 Route::get('/reports',[ReportController::class,'index'])->name('reports.index');
});
