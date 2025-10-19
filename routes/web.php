<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\BeritaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('guest');
});

// route tabel warga
Route::resource('warga', WargaController::class);

// Berita Routes
Route::resource('berita', BeritaController::class);
