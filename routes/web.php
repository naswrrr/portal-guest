<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth', [AuthController::class, 'index'])->name('auth.form');

Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
