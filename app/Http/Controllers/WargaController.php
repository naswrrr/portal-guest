<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WargaController extends Controller
{
    // ==================================================
    // INDEX
    // Fungsi untuk menampilkan daftar warga
    // Mendukung fitur: search, filter gender, sorting, pagination
    // ==================================================
    public function index(Request $request)
    {
        // Query awal warga + relasi media
        $query = Warga::with('media');

        // ================= SEARCH =================
        // Pencarian berdasarkan nama, NIK, atau email
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', "%{$request->search}%")
                  ->orWhere('no_ktp', 'like', "%{$request->search}%")
                  ->orWhere('email', 'like', "%{$request->search}%");
            });
        }

        // ================= FILTER GENDER =================
        // Filter berdasarkan jenis kelamin
        if ($request->gender) {
            $query->where('jenis_kelamin', $request->gender);
        }

        // ================= SORTING =================
        // Urutkan berdasarkan nama (ASC/DESC)
        if ($request->sort == 'nama_asc') {
            $query->orderBy('nama', 'asc');
        }

        if ($request->sort == 'nama_desc') {
            $query->orderBy('nama', 'desc');
        }

        // Urutkan berdasarkan NIK (ASC/DESC)
        if ($request->sort == 'nik_asc') {
            $query->orderBy('no_ktp', 'asc');
        }

        if ($request->sort == 'nik_desc') {
            $query->orderBy('no_ktp', 'desc');
        }

        // ================= PAGINATION =================
        // Batasi data 10 per halaman
        $warga = $query->paginate(10);

        // Kirim data ke view index warga
        return view('pages.warga.index', compact('warga'));
    }

    // ==================================================
    // CREATE
    // Menampilkan halaman form tambah warga
    // ==================================================
    public function create()
    {
        return view('pages.warga.create');
    }

    // ==================================================
    // STORE
    // Menyimpan data warga baru ke database
    // Termasuk upload foto multiple
    // ==================================================
    public function store(Request $request)
    {
        // ================= VALIDASI INPUT =================
        $request->validate([
            'no_ktp'        => 'required|unique:warga,no_ktp',
            'nama'          => 'required',
            'jenis_kelamin' => 'required',
            'agama'         => 'required',
            'pekerjaan'     => 'required',
            'telp'          => 'nullable',
            'email'         => 'nullable|email',
            'foto.*'        => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // ================= SIMPAN DATA WARGA =================
        // Simpan data warga tanpa field foto
        $warga = Warga::create($request->except('foto'));

        // ================= SIMPAN FOTO MULTIPLE =================
        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $file) {

                // Generate nama file unik
                $filename = time() . '_' . $file->getClientOriginalName();

                // Simpan file ke storage/public/warga/{id}
                $path = $file->storeAs(
                    "warga/{$warga->warga_id}",
                    $filename,
                    'public'
                );

                // Simpan metadata file ke tabel media
                Media::create([
                    'ref_table' => 'warga',
                    'ref_id'    => $warga->warga_id,
                    'file_name' => $path,
                    'mime_type' => $file->getClientMimeType(),
                    'caption'   => 'Foto Warga',
                ]);
            }
        }

        // Redirect ke halaman index dengan pesan sukses
        return redirect()
            ->route('warga.index')
            ->with('success', 'Data warga berhasil ditambahkan.');
    }

    // ==================================================
    // EDIT
    // Menampilkan halaman edit data warga
    // ==================================================
    public function edit($id)
    {
        // Ambil data warga berdasarkan ID
        $warga = Warga::findOrFail($id);

        // Ambil seluruh foto warga
        $fotos = Media::where('ref_table', 'warga')
            ->where('ref_id', $id)
            ->get();

        // Kirim data ke view edit
        return view('pages.warga.edit', compact('warga', 'fotos'));
    }

    // ==================================================
    // UPDATE
    // Memperbarui data warga dan foto
    // ==================================================
    public function update(Request $request, $id)
    {
        // Ambil data warga
        $warga = Warga::findOrFail($id);

        // ================= VALIDASI INPUT =================
        $request->validate([
            'no_ktp'        => 'required|unique:warga,no_ktp,' . $id . ',warga_id',
            'nama'          => 'required',
            'jenis_kelamin' => 'required',
            'agama'         => 'required',
            'pekerjaan'     => 'required',
            'telp'          => 'nullable',
            'email'         => 'nullable|email',
            'foto.*'        => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // ================= UPDATE DATA WARGA =================
        $warga->update($request->except('foto'));

        // ==================================================
        // 1. HAPUS SEMUA FOTO LAMA
        // ==================================================
        $fotosLama = Media::where('ref_table', 'warga')
            ->where('ref_id', $id)
            ->get();

        foreach ($fotosLama as $foto) {
            // Hapus file dari storage
            if (Storage::disk('public')->exists($foto->file_name)) {
                Storage::disk('public')->delete($foto->file_name);
            }
            // Hapus record dari database
            $foto->delete();
        }

        // ==================================================
        // 2. SIMPAN FOTO BARU (JIKA ADA)
        // ==================================================
        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $file) {

                $filename = time() . '_' . $file->getClientOriginalName();
                $path     = $file->storeAs(
                    "warga/{$warga->warga_id}",
                    $filename,
                    'public'
                );

                Media::create([
                    'ref_table' => 'warga',
                    'ref_id'    => $warga->warga_id,
                    'file_name' => $path,
                    'mime_type' => $file->getClientMimeType(),
                    'caption'   => 'Foto Warga',
                ]);
            }
        }

        // Redirect dengan pesan sukses
        return redirect()
            ->route('warga.index')
            ->with('success', 'Data warga berhasil diperbarui.');
    }

    // ==================================================
    // DESTROY
    // Menghapus data warga beserta seluruh fotonya
    // ==================================================
    public function destroy($id)
    {
        // Ambil data warga
        $warga = Warga::findOrFail($id);

        // Ambil seluruh foto warga
        $fotos = Media::where('ref_table', 'warga')
            ->where('ref_id', $id)
            ->get();

        // Hapus semua file dan record media
        foreach ($fotos as $foto) {
            if (Storage::disk('public')->exists($foto->file_name)) {
                Storage::disk('public')->delete($foto->file_name);
            }
            $foto->delete();
        }

        // Hapus data warga
        $warga->delete();

        // Redirect dengan pesan sukses
        return redirect()
            ->route('warga.index')
            ->with('success', 'Data warga berhasil dihapus.');
    }

    // ==================================================
    // SHOW
    // Menampilkan detail data warga
    // ==================================================
    public function show($id)
    {
        // Ambil data warga beserta media
        $warga = Warga::with('media')->findOrFail($id);

        // Tampilkan halaman detail warga
        return view('pages.warga.show', compact('warga'));
    }
}
