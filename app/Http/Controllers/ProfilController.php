<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    // ==================================================
    // INDEX
    // Menampilkan daftar profil desa
    // Fitur:
    // - Search (nama desa, kecamatan, kabupaten, provinsi)
    // - Filter provinsi & kabupaten
    // - Pagination
    // - Menentukan logo (media / placeholder)
    // ==================================================
    public function index(Request $request)
    {
        // Query awal profil beserta relasi media
        $query = Profil::with('media');

        // ================= SEARCH =================
        // Pencarian berdasarkan beberapa kolom
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('nama_desa', 'like', '%' . $request->search . '%')
                  ->orWhere('kecamatan', 'like', '%' . $request->search . '%')
                  ->orWhere('kabupaten', 'like', '%' . $request->search . '%')
                  ->orWhere('provinsi', 'like', '%' . $request->search . '%');
            });
        }

        // ================= FILTER PROVINSI =================
        if ($request->provinsi) {
            $query->where('provinsi', $request->provinsi);
        }

        // ================= FILTER KABUPATEN =================
        if ($request->kabupaten) {
            $query->where('kabupaten', $request->kabupaten);
        }

        // Pagination + pertahankan query string
        $profils = $query->paginate(9)->withQueryString();

        // Ambil daftar provinsi & kabupaten unik (untuk dropdown filter)
        $distinctProvinsi  = Profil::select('provinsi')->distinct()->get();
        $distinctKabupaten = Profil::select('kabupaten')->distinct()->get();

        // ================= LOGO / PLACEHOLDER =================
        // Tentukan logo setiap profil
        foreach ($profils as $profil) {
            $media = $profil->media->first();

            // Jika media ada dan file tersedia di storage
            if ($media && file_exists(public_path('storage/' . $media->file_name))) {
                $profil->logo = asset('storage/' . $media->file_name);
            } else {
                // Jika tidak ada logo, gunakan placeholder
                $profil->logo = asset('assets-guest/img/profile.jpg');
            }
        }

        // Tampilkan halaman index profil
        return view(
            'pages.profil.index',
            compact('profils', 'distinctProvinsi', 'distinctKabupaten')
        );
    }

    // ==================================================
    // SHOW
    // Menampilkan detail profil desa
    // ==================================================
    public function show($id)
    {
        // Ambil data profil beserta media
        $profil = Profil::with('media')->findOrFail($id);

        // ================= LOGO PROFIL =================
        // Gunakan logo dari media jika ada, jika tidak pakai placeholder
        $media        = $profil->media->first();
        $profil->logo = ($media && file_exists(public_path('storage/' . $media->file_name)))
            ? asset('storage/' . $media->file_name)
            : asset('assets-guest/img/profile.jpg');

        // Tampilkan halaman detail profil
        return view('pages.profil.show', compact('profil'));
    }

    // ==================================================
    // CREATE
    // Menampilkan form tambah profil desa
    // ==================================================
    public function create()
    {
        return view('pages.profil.create');
    }

    // ==================================================
    // EDIT
    // Menampilkan form edit profil desa
    // ==================================================
    public function edit($id)
    {
        // Ambil data profil berdasarkan ID
        $profil = Profil::findOrFail($id);

        // Tampilkan halaman edit
        return view('pages.profil.edit', compact('profil'));
    }

    // ==================================================
    // STORE
    // Menyimpan data profil desa baru
    // Termasuk upload logo (jika ada)
    // ==================================================
    public function store(Request $request)
    {
        // ================= VALIDASI INPUT =================
        $validated = $request->validate([
            'nama_desa'     => 'required|string|max:255',
            'kecamatan'     => 'required|string|max:255',
            'kabupaten'     => 'required|string|max:255',
            'provinsi'      => 'required|string|max:255',
            'alamat_kantor' => 'required|string',
            'email'         => 'nullable|email|max:255',
            'telepon'       => 'nullable|string|max:30',
            'visi'          => 'nullable|string',
            'misi'          => 'nullable|string',
            'logo'          => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
        ]);

        // ================= SIMPAN DATA PROFIL =================
        $profil = Profil::create([
            'nama_desa'     => $validated['nama_desa'],
            'kecamatan'     => $validated['kecamatan'],
            'kabupaten'     => $validated['kabupaten'],
            'provinsi'      => $validated['provinsi'],
            'alamat_kantor' => $validated['alamat_kantor'],
            'email'         => $validated['email'] ?? null,
            'telepon'       => $validated['telepon'] ?? null,
            'visi'          => $validated['visi'] ?? null,
            'misi'          => $validated['misi'] ?? null,
        ]);

        // ================= UPLOAD LOGO =================
        if ($request->hasFile('logo')) {
            $file     = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();

            // Simpan file logo ke storage public
            $file->storeAs('media/profil', $filename, 'public');

            // Simpan metadata logo ke tabel media
            Media::create([
                'ref_table' => 'profil',
                'ref_id'    => $profil->profil_id,
                'file_name' => 'media/profil/' . $filename,
                'mime_type' => $file->getClientMimeType(),
            ]);
        }

        // Redirect ke halaman index profil
        return redirect()
            ->route('profil.index')
            ->with('success', 'Profil desa berhasil ditambahkan!');
    }

    // ==================================================
    // UPDATE
    // Memperbarui data profil desa dan logo
    // ==================================================
    public function update(Request $request, $id)
    {
        // Ambil data profil
        $profil = Profil::findOrFail($id);

        // ================= VALIDASI INPUT =================
        $request->validate([
            'nama_desa'     => 'required|string',
            'kecamatan'     => 'required|string',
            'kabupaten'     => 'required|string',
            'provinsi'      => 'required|string',
            'alamat_kantor' => 'required|string',
            'email'         => 'nullable|email',
            'telepon'       => 'nullable|string',
            'visi'          => 'nullable|string',
            'misi'          => 'nullable|string',
            'logo'          => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
        ]);

        // ================= UPDATE DATA PROFIL =================
        $profil->update($request->only([
            'nama_desa',
            'kecamatan',
            'kabupaten',
            'provinsi',
            'alamat_kantor',
            'email',
            'telepon',
            'visi',
            'misi',
        ]));

        // ================= UPDATE LOGO =================
        if ($request->hasFile('logo')) {

            // Hapus data logo lama di tabel media
            Media::where('ref_table', 'profil')
                ->where('ref_id', $profil->profil_id)
                ->delete();

            // Simpan logo baru
            $file     = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('media/profil', $filename, 'public');

            // Simpan metadata logo baru
            Media::create([
                'ref_table' => 'profil',
                'ref_id'    => $profil->profil_id,
                'file_name' => 'media/profil/' . $filename,
                'mime_type' => $file->getClientMimeType(),
            ]);
        }

        // Redirect ke halaman index profil
        return redirect()
            ->route('profil.index')
            ->with('success', 'Profil berhasil diperbarui!');
    }

    // ==================================================
    // DESTROY
    // Menghapus data profil desa
    // ==================================================
    public function destroy($id)
    {
        // Ambil data profil
        $profil = Profil::findOrFail($id);

        // Hapus profil
        $profil->delete();

        // Redirect dengan pesan sukses
        return redirect()
            ->route('profil.index')
            ->with('success', 'Profil berhasil dihapus.');
    }
}
