<?php
namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // ===============================
    // LIST USER
    // ===============================
    public function index(Request $request)
    {
        $query = User::query();

        // Search nama/email
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%")
                    ->orWhere('email', 'like', "%{$request->search}%");
            });
        }

        // Filter role
        if ($request->filter) {
            $query->where('role', $request->filter);
        }

        $data['users']    = $query->paginate(6)->appends($request->all());
        $data['editData'] = null;

        return view('pages.user.index', $data);
    }

    // ===============================
    // FORM CREATE USER
    // ===============================
    public function create()
    {
        return view('pages.user.create');
    }

    // ===============================
// STORE USER BARU
// ===============================
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'role'     => 'required|in:Admin,User',
            'foto'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Simpan user
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'role'     => $request->role,
            'password' => Hash::make($request->password),
        ]);

        // Upload foto -> tabel media
        if ($request->hasFile('foto')) {

            $file     = $request->file('foto');
            $filename = time() . "_" . $file->getClientOriginalName();

            // Path yang akan disimpan di database
            $filePath = "uploads/users/{$user->id}/{$filename}";

            // Simpan file ke storage/app/public/...
            $file->storeAs("uploads/users/{$user->id}", $filename, 'public');

            Media::create([
                'ref_table'  => 'users',
                'ref_id'     => $user->id,
                'file_name'  => $filePath, // FIX DISINI
                'caption'    => 'Foto User',
                'mime_type'  => $file->getMimeType(),
                'sort_order' => 1,
            ]);
        }

        return redirect()->route('users.index')
            ->with('success', 'User berhasil ditambahkan');
    }

// ===============================
// UPDATE USER
// ===============================
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email,' . $id,
            'role'     => 'required|string',
            'password' => 'nullable|min:8|confirmed',
            'foto'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Data update
        $data = [
            'name'  => $request->name,
            'email' => $request->email,
            'role'  => $request->role,
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        // Upload foto baru jika ada
        if ($request->hasFile('foto')) {

            // Hapus record media lama
            Media::where('ref_table', 'users')
                ->where('ref_id', $user->id)
                ->delete();

            $file     = $request->file('foto');
            $filename = time() . "_" . $file->getClientOriginalName();

            // Path yang akan disimpan di database
            $filePath = "uploads/users/{$user->id}/{$filename}";

            // upload baru (pakai disk public)
            $file->storeAs("uploads/users/{$user->id}", $filename, 'public');

            Media::create([
                'ref_table'  => 'users',
                'ref_id'     => $user->id,
                'file_name'  => $filePath, // FIX DISINI
                'caption'    => 'Foto User',
                'mime_type'  => $file->getMimeType(),
                'sort_order' => 1,
            ]);
        }

        return redirect()->route('users.index')
            ->with('success', 'User berhasil diupdate');
    }

    public function edit($id)
    {
        // Ambil user beserta relasi media
        $data['editData'] = User::with('media')->findOrFail($id);

        return view('pages.user.edit', $data);
    }

}
