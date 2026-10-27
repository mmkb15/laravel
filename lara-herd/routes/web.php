<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
// Route::get('/', function () {
//     return view('layouts.app');
// });
// Route::get('/price', function () {
//     return view('pages.price');
// })->name('pricing'); 

Route::get('/price',[UserController::class, 'test'])->name("pricing");

Route::get('/compare', function () {
    return view('pages.compare');
})->name('compare-plan');

Route::get('/login', function () {
    return view('pages.auth.login');
})->name('lara-login');

Route::get('/roles',[RoleController::class, 'index'])->name("roles.index");
Route::get('/roles/create',[RoleController::class, 'create'])->name("roles.create");
Route::get('/roles/{id}/edit',[RoleController::class, 'edit'])->name("roles.edit");
Route::get('/role/{id}',[RoleController::class, 'show'])->name("roles.show");
