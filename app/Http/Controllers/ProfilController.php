<?php
namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    // ===========================
    // INDEX: daftar profil
    // ===========================
    public function index(Request $request)
    {
        $query = Profil::with('media');

        // Filter dan search (sama seperti sebelumnya)
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('nama_desa', 'like', '%' . $request->search . '%')
                    ->orWhere('kecamatan', 'like', '%' . $request->search . '%')
                    ->orWhere('kabupaten', 'like', '%' . $request->search . '%')
                    ->orWhere('provinsi', 'like', '%' . $request->search . '%');
            });
        }
        if ($request->provinsi) {
            $query->where('provinsi', $request->provinsi);
        }

        if ($request->kabupaten) {
            $query->where('kabupaten', $request->kabupaten);
        }

        $profils = $query->paginate(9)->withQueryString();

        $distinctProvinsi  = Profil::select('provinsi')->distinct()->get();
        $distinctKabupaten = Profil::select('kabupaten')->distinct()->get();

        // PASANG LOGO ATAU PLACEHOLDER
        foreach ($profils as $profil) {
            $media = $profil->media->first();
            if ($media && file_exists(public_path('storage/' . $media->file_name))) {
                // File media ada → pakai storage
                $profil->logo = asset('storage/' . $media->file_name);
            } else {
                // Placeholder → pakai path public langsung
                $profil->logo = asset('assets-guest/img/profil1.jpg');
            }
        }

        return view('pages.profil.index', compact('profils', 'distinctProvinsi', 'distinctKabupaten'));
    }

    // ===========================
    // SHOW: detail profil
    // ===========================
    public function show($id)
    {
        $profil = Profil::with('media')->findOrFail($id);

        // Gunakan first media kalau ada, jika tidak pakai placeholder
        $media        = $profil->media->first();
        $profil->logo = ($media && file_exists(public_path('storage/' . $media->file_name)))
            ? asset('storage/' . $media->file_name)
            : asset('assets-guest/img/profil1.jpg');

        return view('pages.profil.show', compact('profil'));
    }

    // ===========================
    // CREATE
    // ===========================
    public function create()
    {
        return view('pages.profil.create');
    }

    // ===========================
    // EDIT
    // ===========================
    public function edit($id)
    {
        $profil = Profil::findOrFail($id);
        return view('pages.profil.edit', compact('profil'));
    }

    // ===========================
    // STORE
    // ===========================
    public function store(Request $request)
    {
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

        // Simpan data profil
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

        // Upload logo jika ada
        if ($request->hasFile('logo')) {
            $file     = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('media/profil', $filename, 'public');

            Media::create([
                'ref_table' => 'profil',
                'ref_id'    => $profil->profil_id,
                'file_name' => 'media/profil/' . $filename,
                'mime_type' => $file->getClientMimeType(),
            ]);
        }

        return redirect()->route('profil.index')->with('success', 'Profil desa berhasil ditambahkan!');
    }

    // ===========================
    // UPDATE
    // ===========================
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

        // Update data profil
        $profil->update($request->only([
            'nama_desa', 'kecamatan', 'kabupaten', 'provinsi',
            'alamat_kantor', 'email', 'telepon', 'visi', 'misi',
        ]));

        // Update logo jika ada
        if ($request->hasFile('logo')) {
            // Hapus logo lama
            Media::where('ref_table', 'profil')
                ->where('ref_id', $profil->profil_id)
                ->delete();

            // Simpan logo baru
            $file     = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('media/profil', $filename, 'public');

            Media::create([
                'ref_table' => 'profil',
                'ref_id'    => $profil->profil_id,
                'file_name' => 'media/profil/' . $filename,
                'mime_type' => $file->getClientMimeType(),
            ]);
        }

        return redirect()->route('profil.index')->with('success', 'Profil berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $profil = Profil::findOrFail($id);
        $profil->delete();

        return redirect()->route('profil.index')->with('success', 'Profil berhasil dihapus.');
    }

}
