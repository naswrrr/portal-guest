<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('login-form');
    }

    /**
     * Memproses form login
     * Route: POST /auth/login
     */
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:3',
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password harus minimal 3 karakter',
        ]);

        $username = $request->username;
        $password = $request->password;

        // Cek apakah password mengandung huruf kapital
        if (!preg_match('/[A-Z]/', $password)) {
            return back()
                ->withInput()
                ->withErrors(['password' => 'Password harus mengandung minimal satu huruf kapital']);
        }

        // Cek apakah username dan password sama
        if ($username !== $password) {
            return back()
                ->withInput()
                ->withErrors(['password' => 'Username dan password harus sama']);
        }

        // Jika semua validasi berhasil, redirect ke halaman success
        return view('success', ['username' => $username]);
    }
}
