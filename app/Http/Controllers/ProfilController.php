<?php
namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    // Tampilkan profil (biasanya hanya satu record)
    public function index()
    {
        // Ambil SEMUA profil
        $profils = Profil::all();

        return view('pages.profil.index', compact('profils'));
    }

    public function create()
    {
        return view('pages.profil.create');
    }

    public function edit($id)
    {
        $profil = Profil::findOrFail($id);
        return view('pages.profil.edit', compact('profil'));
    }

    public function update(Request $request, $id)
    {
        $profil = Profil::findOrFail($id);

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

        // update data
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

        // Upload logo
        if ($request->hasFile('logo')) {
            Media::where('ref_table', 'profil')->where('ref_id', $profil->profil_id)->delete();

            $file     = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('media/profil', $filename, 'public');

            Media::create([
                'ref_table' => 'profil',
                'ref_id'    => $profil->profil_id,
                'file_name' => $filename,
                'file_path' => 'media/profil/' . $filename,
                'mime_type' => $file->getClientMimeType(),
            ]);
        }

        return redirect()->route('profil.index')->with('success', 'Profil berhasil diperbarui!');
    }

    public function store(Request $request)
    {
        // ============================
        // 1. VALIDASI INPUT - SESUAI DATABASE
        // ============================
        $validated = $request->validate([
            'nama_desa'     => 'required|string|max:255',
            'kecamatan'     => 'required|string|max:255',
            'kabupaten'     => 'required|string|max:255',
            'provinsi'      => 'required|string|max:255',
            'alamat_kantor' => 'required|string', // ← GUNAKAN alamat_kantor BUKAN alamat
            'email'         => 'nullable|email|max:255',
            'telepon'       => 'nullable|string|max:30',
            'visi'          => 'nullable|string',
            'misi'          => 'nullable|string',

            'logo'          => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
        ]);

        // ============================
        // 2. SIMPAN DATA KE DATABASE
        // ============================
        $profil = Profil::create([
            'nama_desa'     => $validated['nama_desa'],
            'kecamatan'     => $validated['kecamatan'],
            'kabupaten'     => $validated['kabupaten'],
            'provinsi'      => $validated['provinsi'],
            'alamat_kantor' => $validated['alamat_kantor'], // ← SIMPAN DI SINI
            'email'         => $validated['email'] ?? null,
            'telepon'       => $validated['telepon'] ?? null,
            'visi'          => $validated['visi'] ?? null,
            'misi'          => $validated['misi'] ?? null,
            // TIDAK ADA: kepala_desa, alamat, website, foto
        ]);

        // ============================
        // 3. SIMPAN LOGO (kalau ada) ke tabel media
        // ============================
        if ($request->hasFile('logo')) {
            $file     = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('media/profil', $filename, 'public');

            Media::create([
                'ref_table' => 'profil',
                'ref_id'    => $profil->profil_id,
                'file_name' => $filename,
                'file_path' => 'media/profil/' . $filename,
                'mime_type' => $file->getClientMimeType(),
            ]);
        }

        // ============================
        // 4. REDIRECT KEMBALI KE INDEX
        // ============================
        return redirect()
            ->route('profil.index')
            ->with('success', 'Profil desa berhasil ditambahkan!');
    }

    // ProfilController.php
    public function show($id)
    {
        $profil = Profil::findOrFail($id);
        $logo   = Media::where('ref_table', 'profil')
            ->where('ref_id', $profil->profil_id)
            ->first();

        return view('pages.profil.show', compact('profil', 'logo'));
    }

}
