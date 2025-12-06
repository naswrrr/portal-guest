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

// REGISTER (opsional, sama seperti login)
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Hanya guest yang boleh akses halaman login/register
Route::middleware('guest')->group(function () {
    // (biarkan kosong, atau tambahkan halaman guest lainnya)
});

/*
|--------------------------------------------------------------------------
| AUTHENTICATED ROUTES (Hanya bisa dibuka setelah login)
|--------------------------------------------------------------------------
*/

Route::middleware(['checkislogin'])->group(function () {

    // LOGOUT
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // DASHBOARD
    Route::get('/dashboard', function () {
        return view('pages.guest');
    })->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | RESOURCE ROUTES (CRUD)
    |--------------------------------------------------------------------------
    */

    Route::resource('users', UserController::class);
    Route::resource('warga', WargaController::class);
    Route::resource('kategori_berita', KategoriBeritaController::class);

    /*
    |--------------------------------------------------------------------------
    | BERITA ROUTES
    |--------------------------------------------------------------------------
    */

    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');
    Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');

    /*
    |--------------------------------------------------------------------------
    | PROFIL ROUTES
    |--------------------------------------------------------------------------
    */

    Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index');
    Route::get('/profil/create', [ProfilController::class, 'create'])->name('profil.create');
    Route::post('/profil', [ProfilController::class, 'store'])->name('profil.store');
    Route::get('/profil/{id}', [ProfilController::class, 'show'])->name('profil.show');
    Route::get('/profil/{id}/edit', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::put('/profil/{id}', [ProfilController::class, 'update'])->name('profil.update');
    Route::delete('/profil/{id}', [ProfilController::class, 'destroy'])->name('profil.destroy');

});
