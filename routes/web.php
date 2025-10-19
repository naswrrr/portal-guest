<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\KategoriBeritaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('guest');
});

Route::resource('warga', WargaController::class);

Route::resource('kategori_berita', KategoriBeritaController::class);
