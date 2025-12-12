<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Berita;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KategoriBerita;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::with(['kategori', 'media'])->latest();

        // SEARCH
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('judul', 'like', "%{$request->search}%")
                  ->orWhere('penulis', 'like', "%{$request->search}%");
            });
        }

        // FILTER KATEGORI
        if ($request->kategori_id) {
            $query->where('kategori_id', $request->kategori_id);
        }

        // FILTER STATUS
        if ($request->status) {
            $query->where('status', $request->status);
        }

        $berita     = $query->paginate(6)->withQueryString();
        $kategories = KategoriBerita::orderBy('nama')->get();

        return view('pages.berita.index', compact('berita', 'kategories'));
    }

    public function create()
    {
        $kategories = KategoriBerita::orderBy('nama')->get();
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
            'media.*'     => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
        ]);

        // SLUG unik
        $slug = $this->generateUniqueSlug($request->judul);

        $berita = Berita::create([
            'judul'       => $request->judul,
            'slug'        => $slug,
            'kategori_id' => $request->kategori_id,
            'isi_html'    => $request->isi_html,
            'penulis'     => $request->penulis,
            'status'      => $request->status,
            'terbit_at'   => $request->status === 'terbit' ? now() : null,
        ]);

        // UPLOAD MEDIA
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {

                $filename = uniqid() . '-' . time() . '.' . $file->getClientOriginalExtension();
                $path     = $file->storeAs('media/berita', $filename, 'public');

                Media::create([
                    'ref_table' => 'berita',
                    'ref_id'    => $berita->berita_id,
                    'file_name' => $path,
                    'mime_type' => $file->getMimeType(),
                ]);
            }
        }

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dibuat!');
    }

    public function show($id)
    {
        $berita = Berita::with(['kategori', 'media'])->findOrFail($id);
        return view('pages.berita.show', compact('berita'));
    }

    public function edit($id)
    {
        $berita     = Berita::with('media')->findOrFail($id);
        $kategories = KategoriBerita::orderBy('nama')->get();

        return view('pages.berita.edit', compact('berita', 'kategories'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::with('media')->findOrFail($id);

        $request->validate([
            'judul'         => 'required|string|max:255',
            'kategori_id'   => 'required|exists:kategori_berita,kategori_id',
            'isi_html'      => 'required|string',
            'penulis'       => 'required|string|max:100',
            'status'        => 'required|in:draft,terbit',
            'media.*'       => 'nullable|image|max:2048',
            'hapus_media'   => 'nullable|array',
            'hapus_media.*' => 'integer',
        ]);

        // SLUG unik (exclude current id)
        $slug = $this->generateUniqueSlug($request->judul, $id);

        $berita->update([
            'judul'       => $request->judul,
            'slug'        => $slug,
            'kategori_id' => $request->kategori_id,
            'isi_html'    => $request->isi_html,
            'penulis'     => $request->penulis,
            'status'      => $request->status,
            'terbit_at'   => $request->status === 'terbit' ? now() : null,
        ]);

        // HAPUS MEDIA TERPILIH
        if (!empty($request->hapus_media)) {
            foreach ($request->hapus_media as $mediaId) {
                $media = Media::find($mediaId);
                if ($media) {
                    Storage::disk('public')->delete($media->file_name);
                    $media->delete();
                }
            }
        }

        // UPLOAD MEDIA BARU
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {
                $filename = uniqid() . '-' . time() . '.' . $file->getClientOriginalExtension();
                $path     = $file->storeAs('media/berita', $filename, 'public');

                Media::create([
                    'ref_table' => 'berita',
                    'ref_id'    => $berita->berita_id,
                    'file_name' => $path,
                    'mime_type' => $file->getMimeType(),
                ]);
            }
        }

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $berita = Berita::with('media')->findOrFail($id);

        foreach ($berita->media as $media) {
            Storage::disk('public')->delete($media->file_name);
            $media->delete();
        }

        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus!');
    }

    // =====================
    // SLUG UNIK
    // =====================
    private function generateUniqueSlug($judul, $excludeId = null)
    {
        $slug = Str::slug($judul);
        $originalSlug = $slug;
        $counter = 1;

        while (
            Berita::where('slug', $slug)
                ->when($excludeId, fn ($q) => $q->where('berita_id', '!=', $excludeId))
                ->exists()
        ) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
