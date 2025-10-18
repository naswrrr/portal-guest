<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WargaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('guest');
});

Route::resource('warga', WargaController::class);
