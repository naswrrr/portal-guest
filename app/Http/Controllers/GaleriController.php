<?php
namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    // ==================================================
    // INDEX + SEARCH
    // Menampilkan daftar galeri dengan opsi search
    // ==================================================
    public function index(Request $request)
    {
        $query = Galeri::with('media'); // Ambil data galeri beserta media terkait

        // ================= SEARCH =================
        if ($request->filled('search')) {
            // Cari berdasarkan judul atau deskripsi
            $query->where(function ($q) use ($request) {
                $q->where('judul', 'like', '%' . $request->search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $request->search . '%');
            });
        }

        // ================= PAGINATION =================
        $galeri = $query
            ->latest() // urutkan dari terbaru
            ->paginate(9)
            ->withQueryString(); // tetap mempertahankan query string

        return view('pages.galeri.index', compact('galeri'));
    }

    // ==================================================
    // CREATE
    // Menampilkan form tambah galeri baru
    // ==================================================
    public function create()
    {
        return view('pages.galeri.create');
    }

    // ==================================================
    // STORE
    // Menyimpan galeri baru beserta multiple media
    // ==================================================
    public function store(Request $request)
    {
        // ================= VALIDASI =================
        $request->validate([
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'media.*'   => 'image|mimes:jpg,jpeg,png|max:2048', // multiple file
        ]);

        // ================= SIMPAN GALERI =================
        $galeri = Galeri::create([
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        // ================= SIMPAN MEDIA =================
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $index => $file) {
                $path = $file->store('galeri', 'public'); // simpan di storage/public/galeri

                Media::create([
                    'ref_table'  => 'galeri',
                    'ref_id'     => $galeri->galeri_id,
                    'file_name'  => $path,
                    'mime_type'  => $file->getClientMimeType(),
                    'sort_order' => $index + 1, // urutan media
                ]);
            }
        }

        return redirect()->route('galeri.index')
            ->with('success', 'Galeri berhasil ditambahkan');
    }

    // ==================================================
    // SHOW
    // Menampilkan detail galeri beserta media
    // ==================================================
    public function show($id)
    {
        $galeri = Galeri::with('media')->findOrFail($id);
        return view('pages.galeri.show', compact('galeri'));
    }

    // ==================================================
    // EDIT
    // Menampilkan form edit galeri beserta media
    // ==================================================
    public function edit($id)
    {
        $galeri = Galeri::with('media')->findOrFail($id);
        return view('pages.galeri.edit', compact('galeri'));
    }

    // ==================================================
    // UPDATE
    // Memperbarui galeri dan mengganti media jika ada
    // ==================================================
    public function update(Request $request, $id)
    {
        $galeri = Galeri::with('media')->findOrFail($id);

        // ================= VALIDASI =================
        $request->validate([
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'media.*'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // ================= UPDATE GALERI =================
        $galeri->update([
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        // ================= UPDATE MEDIA =================
        if ($request->hasFile('media')) {

            // Hapus file lama dari storage
            foreach ($galeri->media as $media) {
                if (Storage::disk('public')->exists($media->file_name)) {
                    Storage::disk('public')->delete($media->file_name);
                }
            }

            // Hapus record media lama dari DB
            $galeri->media()->delete();

            // Simpan file baru
            foreach ($request->file('media') as $index => $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('media/galeri', $filename, 'public');

                Media::create([
                    'ref_table'  => 'galeri',
                    'ref_id'     => $galeri->galeri_id,
                    'file_name'  => 'media/galeri/' . $filename,
                    'mime_type'  => $file->getClientMimeType(),
                    'sort_order' => $index + 1,
                ]);
            }
        }

        return redirect()->route('galeri.index')
            ->with('success', 'Galeri berhasil diperbarui');
    }

    // ==================================================
    // DESTROY
    // Menghapus galeri beserta semua media terkait
    // ==================================================
    public function destroy($id)
    {
        $galeri = Galeri::with('media')->findOrFail($id);

        // Hapus file media dari storage
        foreach ($galeri->media as $media) {
            if (Storage::disk('public')->exists($media->file_name)) {
                Storage::disk('public')->delete($media->file_name);
            }
        }

        // Hapus record media
        $galeri->media()->delete();

        // Hapus galeri
        $galeri->delete();

        return redirect()->route('galeri.index')
            ->with('success', 'Galeri berhasil dihapus');
    }
}
