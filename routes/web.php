<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'index'])->name('auth.index');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/register', [AuthController::class, 'indexRegister'])->name('auth.register');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register'); //

Route::get('/admin/dashboard', function () {
    return view('dashboard');
})->name('admin.dashboard');
