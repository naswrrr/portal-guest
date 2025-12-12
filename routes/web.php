<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KategoriBeritaController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES (SEMUA ORANG BISA AKSES)
|--------------------------------------------------------------------------
*/
Route::get('/contact', fn() => view('pages.contact'))->name('contact');
Route::get('/about', fn() => view('pages.about'))->name('about');
Route::get('/identitas', fn() => view('pages.identitas'))->name('identitas');
// Landing page umum
Route::get('/', fn() => view('pages.guest'))->name('landing');

/*
|--------------------------------------------------------------------------
| AUTH ROUTES (HANYA UNTUK YANG BELUM LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

    Route::get('/dashboard', function () {
        return view('pages.guest'); // <-- ganti view PASTI
    })->name('dashboard');

/*
|--------------------------------------------------------------------------
| PROTECTED ROUTES (LOGIN REQUIRED)
|--------------------------------------------------------------------------
*/
Route::middleware(['checkislogin'])->group(function () {

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard (HARUS PAKAI HALAMAN AUTH BUKAN GUEST)

    /*
    |--------------------------------------------------------------------------
    | ADMIN ONLY (RESOURCE)
    |--------------------------------------------------------------------------
    */
    Route::middleware('checkrole:Admin')->group(function () {

        //User CRUD

        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

        //Warga CRUD

        Route::get('/warga/create', [WargaController::class, 'create'])->name('warga.create');
        Route::post('/warga', [WargaController::class, 'store'])->name('warga.store');
        Route::get('/warga/{id}/edit', [WargaController::class, 'edit'])->name('warga.edit');
        Route::put('/warga/{id}', [WargaController::class, 'update'])->name('warga.update');
        Route::delete('/warga/{id}', [WargaController::class, 'destroy'])->name('warga.destroy');

        //Kategori Berita CRUD

        Route::get('/kategori_berita/create', [KategoriBeritaController::class, 'create'])->name('kategori_berita.create');
        Route::post('/kategori_berita', [KategoriBeritaController::class, 'store'])->name('kategori_berita.store');
        Route::get('/kategori_berita/{id}', [KategoriBeritaController::class, 'show'])->name('kategori_berita.show');
        Route::get('/kategori_berita/{id}/edit', [KategoriBeritaController::class, 'edit'])->name('kategori_berita.edit');
        Route::put('/kategori_berita/{id}', [KategoriBeritaController::class, 'update'])->name('kategori_berita.update');
        Route::delete('/kategori_berita/{id}', [KategoriBeritaController::class, 'destroy'])->name('kategori_berita.destroy');

        // Profil (CRUD)
        Route::get('/profil/create', [ProfilController::class, 'create'])->name('profil.create');
        Route::post('/profil', [ProfilController::class, 'store'])->name('profil.store');
        Route::get('/profil/{id}', [ProfilController::class, 'show'])->name('profil.show');
        Route::get('/profil/{id}/edit', [ProfilController::class, 'edit'])->name('profil.edit');
        Route::put('/profil/{id}', [ProfilController::class, 'update'])->name('profil.update');
        Route::delete('/profil/{id}', [ProfilController::class, 'destroy'])->name('profil.destroy');

        // Berita (CRUD)
        Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
        Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
        Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');
        Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
        Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('berita.update');
        Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | USER & ADMIN BISA AKSES
    |--------------------------------------------------------------------------
    */
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index');
    Route::get('/profil/{id}', [ProfilController::class, 'show'])->name('profil.show'); // untuk halaman detail
    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/warga', [WargaController::class, 'index'])->name('warga.index');
    Route::get('/kategori_berita', [KategoriBeritaController::class, 'index'])->name('kategori_berita.index');
});
