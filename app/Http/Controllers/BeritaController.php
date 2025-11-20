<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KategoriBerita;
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
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori_berita,kategori_id',
            'isi_html' => 'required|string',
            'penulis' => 'required|string|max:100',
            'status' => 'required|in:draft,terbit',
        ]);

        Berita::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'kategori_id' => $request->kategori_id,
            'isi_html' => $request->isi_html,
            'penulis' => $request->penulis,
            'status' => $request->status,
            'terbit_at' => $request->status == 'terbit' ? now() : null,
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dibuat!');
    }

    // GUNAKAN $id MANUAL UNTUK HINDARI BUG
    public function show($id)
    {
        $berita = Berita::with('kategori')->findOrFail($id);
        return view('pages.berita.show', compact('berita'));
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        $kategories = KategoriBerita::all();
        return view('pages.berita.edit', compact('berita', 'kategories'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori_berita,kategori_id',
            'isi_html' => 'required|string',
            'penulis' => 'required|string|max:100',
            'status' => 'required|in:draft,terbit',
        ]);

        $berita->update([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'kategori_id' => $request->kategori_id,
            'isi_html' => $request->isi_html,
            'penulis' => $request->penulis,
            'status' => $request->status,
            'terbit_at' => $request->status == 'terbit' ? ($berita->terbit_at ?? now()) : null,
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diupdate!');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();
        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}
