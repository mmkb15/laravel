<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Api\Frontend\HomeController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');



Route::get('/products', [HomeController::class, 'products']);
Route::get('/categories', [HomeController::class, 'categories']);
Route::post('/orders', [HomeController::class, 'storeOrder']);