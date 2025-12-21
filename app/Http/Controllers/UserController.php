<?php
namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'foto'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Semua user baru otomatis User
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'role'     => 'User', // tetap User
            'password' => Hash::make($request->password),
        ]);

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $file     = $request->file('foto');
            $filename = time() . "_" . $file->getClientOriginalName();
            $filePath = "uploads/users/{$user->id}/{$filename}";
            $file->storeAs("uploads/users/{$user->id}", $filename, 'public');

            Media::create([
                'ref_table'  => 'users',
                'ref_id'     => $user->id,
                'file_name'  => $filePath,
                'caption'    => 'Foto User',
                'mime_type'  => $file->getMimeType(),
                'sort_order' => 1,
            ]);
        }

        return redirect()->route('users.index')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // ===============================
    // FORM EDIT USER
    // ===============================
    public function edit($id)
    {
        $data['editData'] = User::with('media')->findOrFail($id);
        return view('pages.user.edit', $data);
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
            'password' => 'nullable|min:8|confirmed',
            'foto'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Role hanya bisa diubah oleh admin login (misal id = 1)
        $data = [
            'name'  => $request->name,
            'email' => $request->email,
        ];
        if (Auth::user()->id === 1) { // user admin
            $data['role'] = $request->role ?? 'User';
        }

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
            $filePath = "uploads/users/{$user->id}/{$filename}";
            $file->storeAs("uploads/users/{$user->id}", $filename, 'public');

            Media::create([
                'ref_table'  => 'users',
                'ref_id'     => $user->id,
                'file_name'  => $filePath,
                'caption'    => 'Foto User',
                'mime_type'  => $file->getMimeType(),
                'sort_order' => 1,
            ]);
        }

        return redirect()->route('users.index')->with('success', 'User berhasil diupdate');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User berhasil dihapus');
    }

    public function show($id)
    {
        $user = User::with('media')->findOrFail($id);
        return view('pages.user.show', compact('user'));
    }

}
