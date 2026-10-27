<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/users', [UserController::class, 'index']);
Route::apiResource('/departments', DepartmentController::class);

Route::post('/test', function () {
    return "Lara API is working";
});
