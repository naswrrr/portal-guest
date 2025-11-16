<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KategoriBeritaController;

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

// Route manual untuk berita
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('berita.update');
Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');
