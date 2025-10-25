<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\KategoriBeritaController;


Route::get('/', function () {
    return view('auth.login');
});

// // route tabel warga
// Route::resource('warga', WargaController::class);

// Route::resource('kategori_berita', KategoriBeritaController::class);

// Route::resource('users', UserController::class);

// Auth Routes (bisa diakses tanpa login) - DI LUAR
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// SEMUA ROUTE LAIN HARUS LOGIN DULU - DI DALAM
Route::middleware(['auth'])->group(function () {
    Route::get('/', function () { return view('guest'); })->name('guest');
    Route::resource('users', UserController::class);
    Route::resource('warga', WargaController::class);
    Route::resource('bina-desa', BinaDesaController::class);
    Route::resource('kategori_berita', KategoriBeritaController::class);
});
