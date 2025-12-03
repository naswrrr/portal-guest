<?php
namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KategoriBerita;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::with('kategori')->latest();

        // Search by judul / penulis
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('judul', 'like', '%' . $request->search . '%')
                    ->orWhere('penulis', 'like', '%' . $request->search . '%');
            });
        }

        // Filter kategori
        if ($request->kategori_id) {
            $query->where('kategori_id', $request->kategori_id);
        }

        // Filter status
        if ($request->status) {
            $query->where('status', $request->status);
        }

        // Pagination (6 per page)
        $berita = $query->paginate(6)->withQueryString();

        // Semua kategori buat dropdown filter
        $kategories = KategoriBerita::all();

        return view('pages.berita.index', compact('berita', 'kategories'));
    }

    public function create()
    {
        $kategories = KategoriBerita::all();
        return view('pages.berita.create', compact('kategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'       => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori_berita,kategori_id',
            'isi_html'    => 'required|string',
            'penulis'     => 'required|string|max:100',
            'status'      => 'required|in:draft,terbit',
            'media'       => 'nullable',
            'media.*'     => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048', // validasi file
        ]);

        // 1. Simpan berita dahulu
        $berita = Berita::create([
            'judul'       => $request->judul,
            'slug'        => Str::slug($request->judul),
            'kategori_id' => $request->kategori_id,
            'isi_html'    => $request->isi_html,
            'penulis'     => $request->penulis,
            'status'      => $request->status,
            'terbit_at'   => $request->status == 'terbit' ? now() : null,
        ]);

        // 2. Jika ada upload file
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {
                $filename = time() . '-' . $file->getClientOriginalName();
                $path     = $file->storeAs('media/berita', $filename, 'public');

                Media::create([
                    'ref_table' => 'berita',
                    'ref_id'    => $berita->berita_id,
                    'file_name' => $filename,
                    'file_path' => $path,
                    'mime_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dibuat!');
    }

    // GUNAKAN $id MANUAL UNTUK HINDARI BUG
    public function show($id)
    {
        // Ambil data berita beserta relasi
        $berita = Berita::with(['kategori', 'media'])->findOrFail($id);

        return view('pages.berita.show', compact('berita'));
    }

    public function edit($id)
    {
        $berita     = Berita::findOrFail($id);
        $kategories = KategoriBerita::all();
        return view('pages.berita.edit', compact('berita', 'kategories'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        // Validasi
        $request->validate([
            'judul'         => 'required|string|max:255',
            'kategori_id'   => 'required|exists:kategori_berita,kategori_id',
            'isi_html'      => 'required|string',
            'penulis'       => 'required|string|max:100',
            'status'        => 'required|in:draft,terbit',
            'media.*'       => 'nullable|image|max:2048',
            'hapus_media'   => 'array',
            'hapus_media.*' => 'integer',
        ]);

        // Update berita
        $berita->update([
            'judul'       => $request->judul,
            'slug'        => Str::slug($request->judul),
            'kategori_id' => $request->kategori_id,
            'isi_html'    => $request->isi_html,
            'penulis'     => $request->penulis,
            'status'      => $request->status,
            'terbit_at'   => $request->status == 'terbit' ? now() : null,
        ]);

        // ===============================
        // HAPUS MEDIA LAMA (jika dicentang)
        // ===============================
        if ($request->has('hapus_media')) {
            $mediaToDelete = Media::whereIn('media_id', $request->hapus_media)->get();

            foreach ($mediaToDelete as $media) {
                // Hapus file fisik
                if (Storage::disk('public')->exists($media->file_path)) {
                    Storage::disk('public')->delete($media->file_path);
                }
                // Hapus record
                $media->delete();
            }
        }

        // ===============================
        // UPLOAD MEDIA BARU
        // ===============================
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {
                $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $filePath = 'media/berita/' . $fileName;

                // Simpan file ke storage
                $file->storeAs('media/berita', $fileName, 'public');

                // Simpan ke database
                Media::create([
                    'ref_table' => 'berita',
                    'ref_id'    => $berita->berita_id,
                    'file_name' => $fileName,
                    'file_path' => $filePath,
                    'mime_type' => $file->getMimeType(),
                ]);
            }
        }

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

}
