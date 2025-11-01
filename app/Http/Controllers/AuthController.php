<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('guest.pages.auth.login');
    }

    // Show register form
    public function showRegisterForm()
    {
        return view('guest.pages.auth.register');
    }

    // Process register
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ], [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 6 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok'
        ]);

        // Buat user baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // Redirect ke login dengan success message
        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // Process login - PERBAIKAN: gunakan redirect langsung ke URL
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 6 karakter'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // OPTION 1: Redirect langsung ke URL (lebih aman)
            return redirect('/')
                ->with('success', 'Login berhasil! Selamat datang.');

            // OPTION 2: Atau jika route home sudah benar
            // return redirect()->route('home')
            //     ->with('success', 'Login berhasil! Selamat datang.');
        }

        return back()
            ->withErrors(['email' => 'Email atau password salah.'])
            ->withInput($request->except('password'));
    }

    // Logout - PERBAIKAN: gunakan redirect langsung ke URL
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke home page setelah logout
        return redirect('/')
            ->with('success', 'Logout berhasil!');
    }
}
