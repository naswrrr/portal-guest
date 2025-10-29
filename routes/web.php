<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use Illuminate\Support\Facades\Route;

// PUBLIC ROUTES
Route::get('/', function () {
    return view('pages.guest');
})->name('home');

// AUTH ROUTES
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// RESOURCE ROUTES (bisa diakses tanpa middleware)
Route::resource('users', UserController::class);
Route::resource('warga', WargaController::class);
Route::resource('kategori_berita', KategoriBeritaController::class);

// Di routes/web.php
Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

// routes/web.php
Route::get('/about', function () {
    return view('pages.about');
})->name('about');
