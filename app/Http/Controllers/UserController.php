<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // ==================================================
    // INDEX
    // Menampilkan daftar user
    // Mendukung fitur pencarian (nama & email) + pagination
    // ==================================================
    public function index(Request $request)
    {
        // Query awal user
        $query = User::query();

        // ================= SEARCH =================
        // Pencarian berdasarkan nama atau email
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%")
                  ->orWhere('email', 'like', "%{$request->search}%");
            });
        }

        // Pagination 6 data per halaman + mempertahankan query string
        $data['users'] = $query->paginate(6)->appends($request->all());

        // Variabel untuk data edit (default null)
        $data['editData'] = null;

        // Tampilkan halaman index user
        return view('pages.user.index', $data);
    }

    // ==================================================
    // CREATE
    // Menampilkan halaman form tambah user
    // ==================================================
    public function create()
    {
        return view('pages.user.create');
    }

    // ==================================================
    // STORE
    // Menyimpan data user baru ke database
    // Termasuk upload foto (jika ada)
    // ==================================================
    public function store(Request $request)
    {
        // ================= VALIDASI INPUT =================
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'foto'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // ================= SIMPAN DATA USER =================
        // Semua user baru otomatis memiliki role "User"
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'role'     => 'User', // role default
            'password' => Hash::make($request->password), // enkripsi password
        ]);

        // ================= UPLOAD FOTO USER =================
        // Jika user mengupload foto
        if ($request->hasFile('foto')) {
            $file     = $request->file('foto');
            $filename = time() . "_" . $file->getClientOriginalName();

            // Path penyimpanan file
            $filePath = "uploads/users/{$user->id}/{$filename}";

            // Simpan file ke storage public
            $file->storeAs("uploads/users/{$user->id}", $filename, 'public');

            // Simpan metadata foto ke tabel media
            Media::create([
                'ref_table'  => 'users',
                'ref_id'     => $user->id,
                'file_name'  => $filePath,
                'caption'    => 'Foto User',
                'mime_type'  => $file->getMimeType(),
                'sort_order' => 1,
            ]);
        }

        // Redirect ke halaman index user dengan pesan sukses
        return redirect()
            ->route('users.index')
            ->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // ==================================================
    // EDIT
    // Menampilkan form edit user berdasarkan ID
    // ==================================================
    public function edit($id)
    {
        // Ambil data user beserta media
        $data['editData'] = User::with('media')->findOrFail($id);

        // Tampilkan halaman edit user
        return view('pages.user.edit', $data);
    }

    // ==================================================
    // UPDATE
    // Memperbarui data user dan foto
    // ==================================================
    public function update(Request $request, $id)
    {
        // Ambil data user
        $user = User::findOrFail($id);

        // ================= VALIDASI INPUT =================
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8|confirmed',
            'foto'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // ================= DATA YANG AKAN DIUPDATE =================
        $data = [
            'name'  => $request->name,
            'email' => $request->email,
        ];

        // ================= ROLE (KHUSUS ADMIN) =================
        // Role hanya bisa diubah oleh admin (contoh: user id = 1)
        if (Auth::user()->id === 1) {
            $data['role'] = $request->role ?? 'User';
        }

        // ================= UPDATE PASSWORD =================
        // Jika password diisi, maka password diperbarui
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        // Update data user
        $user->update($data);

        // ================= UPDATE FOTO =================
        if ($request->hasFile('foto')) {

            // Hapus data media lama (record DB)
            Media::where('ref_table', 'users')
                ->where('ref_id', $user->id)
                ->delete();

            // Simpan foto baru
            $file     = $request->file('foto');
            $filename = time() . "_" . $file->getClientOriginalName();
            $filePath = "uploads/users/{$user->id}/{$filename}";

            $file->storeAs("uploads/users/{$user->id}", $filename, 'public');

            // Simpan metadata foto baru
            Media::create([
                'ref_table'  => 'users',
                'ref_id'     => $user->id,
                'file_name'  => $filePath,
                'caption'    => 'Foto User',
                'mime_type'  => $file->getMimeType(),
                'sort_order' => 1,
            ]);
        }

        // Redirect dengan pesan sukses
        return redirect()
            ->route('users.index')
            ->with('success', 'User berhasil diupdate');
    }

    // ==================================================
    // DESTROY
    // Menghapus data user
    // ==================================================
    public function destroy($id)
    {
        // Ambil data user
        $user = User::findOrFail($id);

        // Hapus user
        $user->delete();

        // Redirect dengan pesan sukses
        return redirect()
            ->route('users.index')
            ->with('success', 'User berhasil dihapus');
    }

    // ==================================================
    // SHOW
    // Menampilkan detail user
    // ==================================================
    public function show($id)
    {
        // Ambil data user beserta media
        $user = User::with('media')->findOrFail($id);

        // Tampilkan halaman detail user
        return view('pages.user.show', compact('user'));
    }
}
