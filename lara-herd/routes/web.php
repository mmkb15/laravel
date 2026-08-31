<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
// Route::get('/', function () {
//     return view('layouts.app');
// });
Route::get('/price', function () {
    return view('pages.price');
})->name('pricing'); 

Route::get('/compare', function () {
    return view('pages.compare');
})->name('compare-plan');

Route::get('/login', function () {
    return view('pages.auth.login');
})->name('lara-login');
