<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| PUBLIC PAGE (Halaman Umum)
|--------------------------------------------------------------------------
*/

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

/*
|--------------------------------------------------------------------------
| AUTH ROUTES (Login, Register, Logout)
|--------------------------------------------------------------------------
*/

// LOGIN — harus SELALU didefinisikan (tidak boleh dalam middleware guest)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

/*
|--------------------------------------------------------------------------
| AUTHENTICATED ROUTES (Hanya bisa dibuka setelah login)
|--------------------------------------------------------------------------
*/

Route::middleware(['checkislogin', 'checkrole:Admin'])->group(function () {

    Route::get('/dashboard', function () {
        return view('pages.guest');
    })->name('dashboard');

    Route::resource('users', UserController::class);
    Route::resource('warga', WargaController::class);
    Route::resource('kategori_berita', KategoriBeritaController::class);
    Route::resource('berita', BeritaController::class);
    Route::resource('profil', ProfilController::class);

});

Route::middleware(['checkislogin', 'checkrole:User'])->group(function () {

    Route::get('/dashboard', function () {
        return view('pages.guest');
    })->name('dashboard');
    
    Route::resource('users', UserController::class)->only(['index', 'show']);
    Route::resource('warga', WargaController::class)->only(['index', 'show']);
    Route::resource('kategori_berita', KategoriBeritaController::class)->only(['index', 'show']);
    Route::resource('berita', BeritaController::class)->only(['index', 'show']);
    Route::resource('profil', ProfilController::class)->only(['index', 'show']);

});

