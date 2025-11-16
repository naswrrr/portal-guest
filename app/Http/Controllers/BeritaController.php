<?php
namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::with('kategori')->latest()->get();
        return view('pages.berita.index', compact('berita'));
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

    // PAKAI PARAMETER $beritum KARENA SYSTEM MINTA BEGITU
    public function show($beritum)
    {
        $berita = Berita::findOrFail($beritum);
        return view('pages.berita.show', compact('berita'));
    }

    public function edit($beritum)
    {
        $berita = Berita::findOrFail($beritum);
        $kategories = KategoriBerita::all();
        return view('pages.berita.edit', compact('berita', 'kategories'));
    }

    public function update(Request $request, $beritum)
    {
        $berita = Berita::findOrFail($beritum);

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

    public function destroy($beritum)
    {
        $berita = Berita::findOrFail($beritum);
        $berita->delete();
        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}
