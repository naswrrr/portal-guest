<?php
namespace App\Http\Controllers;

use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = KategoriBerita::query();

        // --- SEARCH ---
        if ($request->search) {
            $query->where('nama', 'like', '%' . $request->search . '%')
                ->orWhere('slug', 'like', '%' . $request->search . '%');
        }

        // --- FILTER (opsional, kalo mau berdasarkan created_at) ---
        if ($request->filter == 'latest') {
            $query->orderBy('created_at', 'desc');
        } elseif ($request->filter == 'oldest') {
            $query->orderBy('created_at', 'asc');
        }

        // --- PAGINATION ---
        $data['dataKategori'] = $query->paginate(6)->withQueryString();

        // Untuk edit (null default)
        $data['editData'] = null;

        return view('pages.kategori_berita.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.kategori_berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        // Buat slug yang unique
        $slug         = \Str::slug($request->nama);
        $counter      = 1;
        $originalSlug = $slug;

        // Cek jika slug sudah ada, tambahkan angka
        while (KategoriBerita::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        KategoriBerita::create([
            'nama'      => $request->nama,
            'slug'      => $slug, // PAKAI SLUG YANG SUDAH DICEK
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('kategori_berita.index')
            ->with('success', 'Kategori berita berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kategori = KategoriBerita::findOrFail($id);

        return view('pages.kategori_berita.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori     = KategoriBerita::findOrFail($id);
        $dataKategori = KategoriBerita::all(); // opsional kalau masih dibutuhkan di view

        return view('pages.kategori_berita.edit', compact('kategori', 'dataKategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kategori = KategoriBerita::findOrFail($id);

        $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $kategori->update([
            'nama'      => $request->nama,
            'slug'      => Str::slug($request->nama),
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('kategori_berita.index')
            ->with('success', 'Kategori berita berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = KategoriBerita::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori_berita.index')
            ->with('success', 'Kategori berita berhasil dihapus!');
    }
}
