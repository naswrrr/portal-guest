<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // ✅ Menampilkan halaman login
    public function index()
    {
        return view('auth.login');
    }

    // ✅ Handle logika form login
    public function login(Request $request)
    {
        // ✅ Jika username = nim dan password = nim, arahkan ke Dashboard Admin
        if ($request->username == $request->password) {
            return redirect()->route('admin.dashboard')->with('success', 'Selamat Datang Admin!');
        }

        return back()->with('error', 'Login gagal!');
    }

    public function indexRegister()
    {
        return view('auth.register');
    }

    // ✅ Handle logika form register
    public function register(Request $request)
    {
        // ✅ VALIDASI SESUAI SOAL
        $validator = Validator::make($request->all(), [
            'nama' => 'required|regex:/^[a-zA-Z\s]+$/',
            'alamat' => 'required|max:300',
            'tanggal_lahir' => 'required|date',
            'username' => 'required',
            'password' => 'required|min:6|regex:/^(?=.*[A-Z])(?=.*\d)/',
            'password_confirmation' => 'required|same:password'
        ], [
            'nama.regex' => 'Nama tidak boleh mengandung angka',
            'alamat.max' => 'Alamat maksimal 300 karakter',
            'password.regex' => 'Password harus mengandung huruf kapital dan angka',
            'password_confirmation.same' => 'Password dan Confirm Password tidak sama'
        ]);

        // ✅ Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // ✅ JIKA BERHASIL → redirect ke halaman Login dengan flashdata
        return redirect()->route('auth.index')->with('success', 'Registrasi berhasil! Silakan Login');
    }
}
