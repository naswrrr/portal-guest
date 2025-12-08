<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use Illuminate\Support\Facades\Route;

// PUBLIC
Route::get('/contact', function () { return view('pages.contact'); })->name('contact');
Route::get('/about', function () { return view('pages.about'); })->name('about');

// AUTH
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// DASHBOARD - HANYA UNTUK YANG LOGIN
Route::middleware(['checkislogin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.guest');
    })->name('dashboard');
});

// ADMIN ROUTES
Route::middleware(['checkislogin', 'checkrole:Admin'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('warga', WargaController::class);
    Route::resource('kategori_berita', KategoriBeritaController::class);
    Route::resource('berita', BeritaController::class);
    Route::resource('profil', ProfilController::class);
});

// USER ROUTES (READ ONLY)
Route::middleware(['checkislogin', 'checkrole:User'])->group(function () {

    // User hanya bisa melihat data user (opsional, biasanya tidak dibolehkan)
    Route::resource('users', UserController::class)->only(['index', 'show']);

    // User lihat kategori berita
    Route::resource('kategori_berita', KategoriBeritaController::class)->only(['index', 'show']);

    // User lihat berita
    Route::resource('berita', BeritaController::class)->only(['index', 'show']);

    // User lihat profil desa
    Route::resource('profil', ProfilController::class)->only(['index', 'show']);

});

