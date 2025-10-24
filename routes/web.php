<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\KategoriBeritaController;


Route::get('/', function () {
    return view('guest');
});

// route tabel warga
Route::resource('warga', WargaController::class);

Route::resource('kategori_berita', KategoriBeritaController::class);

Route::resource('users', UserController::class);
