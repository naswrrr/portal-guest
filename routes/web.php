<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WargaController;

Route::get('/', function () {
    return view('guest');
});

Route::get('/warga', [WargaController::class, 'index']);
