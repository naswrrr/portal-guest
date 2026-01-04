<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ==================================================
    // SHOW LOGIN FORM
    // Menampilkan halaman form login
    // ==================================================
    public function showLoginForm()
    {
        return view('pages.auth.login');
    }

    // ==================================================
    // SHOW REGISTER FORM
    // Menampilkan halaman form registrasi
    // ==================================================
    public function showRegisterForm()
    {
        return view('pages.auth.register');
    }

    // ==================================================
    // REGISTER
    // Memproses registrasi user baru
    // ==================================================
    public function register(Request $request)
    {
        // ================= VALIDASI =================
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email', // email unik
            'password' => 'required|min:6|confirmed', // harus ada password_confirmation
        ]);

        // ================= SIMPAN USER =================
        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password), // hash password
            'role'     => 'User', // default role
        ]);

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // ==================================================
    // LOGIN
    // Memproses login user
    // ==================================================
    public function login(Request $request)
    {
        // ================= VALIDASI =================
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        // ================= AUTHENTIKASI =================
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // regenerasi session untuk keamanan

            return redirect()
                ->route('dashboard')
                ->with('success', 'Login berhasil! Selamat datang.');
        }

        // Jika gagal → kembali ke form login dengan error
        return back()
            ->with('error', 'Email atau password salah.')
            ->withInput($request->except('password')); // tetap simpan input kecuali password
    }

    // ==================================================
    // LOGOUT
    // Logout user dan hapus session
    // ==================================================
    public function logout(Request $request)
    {
        Auth::logout(); // logout user
        $request->session()->invalidate(); // invalidasi session
        $request->session()->regenerateToken(); // regenerasi CSRF token

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')
            ->with('success', 'Anda berhasil logout.');
    }
}
