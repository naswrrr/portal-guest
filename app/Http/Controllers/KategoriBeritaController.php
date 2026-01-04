<?php
namespace App\Http\Controllers;

use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriBeritaController extends Controller
{
    // ==================================================
    // INDEX
    // Menampilkan daftar kategori berita
    // Fitur:
    // - Search nama & slug
    // - Filter berdasarkan created_at (latest / oldest)
    // - Pagination
    // ==================================================
    public function index(Request $request)
    {
        $query = KategoriBerita::query();

        // ================= SEARCH =================
        // Jika ada input search, cari di nama & slug
        if ($request->search) {
            $query->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('slug', 'like', '%' . $request->search . '%');
        }

        // ================= FILTER =================
        // Bisa filter berdasarkan tanggal dibuat
        if ($request->filter == 'latest') {
            $query->orderBy('created_at', 'desc');
        } elseif ($request->filter == 'oldest') {
            $query->orderBy('created_at', 'asc');
        }

        // ================= PAGINATION =================
        $data['dataKategori'] = $query->paginate(6)->withQueryString();

        // Untuk edit default null
        $data['editData'] = null;

        return view('pages.kategori_berita.index', $data);
    }

    // ==================================================
    // CREATE
    // Menampilkan form tambah kategori berita baru
    // ==================================================
    public function create()
    {
        return view('pages.kategori_berita.create');
    }

    // ==================================================
    // STORE
    // Menyimpan kategori berita baru
    // Termasuk generate slug unik
    // ==================================================
    public function store(Request $request)
    {
        // ================= VALIDASI =================
        $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        // ================= GENERATE SLUG UNIK =================
        $slug         = \Str::slug($request->nama); // slug dasar
        $counter      = 1;
        $originalSlug = $slug;

        // Jika slug sudah ada, tambahkan angka di belakang
        while (KategoriBerita::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        // ================= SIMPAN DATA =================
        KategoriBerita::create([
            'nama'      => $request->nama,
            'slug'      => $slug, // pakai slug unik
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('kategori_berita.index')
            ->with('success', 'Kategori berita berhasil ditambahkan!');
    }

    // ==================================================
    // SHOW
    // Menampilkan detail kategori berita
    // ==================================================
    public function show(string $id)
    {
        // Ambil data kategori berdasarkan id
        $kategori = KategoriBerita::findOrFail($id);

        return view('pages.kategori_berita.show', compact('kategori'));
    }

    // ==================================================
    // EDIT
    // Menampilkan form edit kategori berita
    // ==================================================
    public function edit(string $id)
    {
        // Ambil data kategori untuk diedit
        $kategori = KategoriBerita::findOrFail($id);

        // Opsional: ambil semua data kategori (misal untuk dropdown di view)
        $dataKategori = KategoriBerita::all();

        return view('pages.kategori_berita.edit', compact('kategori', 'dataKategori'));
    }

    // ==================================================
    // UPDATE
    // Memperbarui data kategori berita
    // ==================================================
    public function update(Request $request, string $id)
    {
        $kategori = KategoriBerita::findOrFail($id);

        // ================= VALIDASI =================
        $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        // ================= UPDATE DATA =================
        $kategori->update([
            'nama'      => $request->nama,
            'slug'      => Str::slug($request->nama), // update slug baru
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('kategori_berita.index')
            ->with('success', 'Kategori berita berhasil diperbarui!');
    }

    // ==================================================
    // DESTROY
    // Menghapus kategori berita
    // ==================================================
    public function destroy(string $id)
    {
        // Ambil data kategori
        $kategori = KategoriBerita::findOrFail($id);

        // Hapus data
        $kategori->delete();

        return redirect()->route('kategori_berita.index')
            ->with('success', 'Kategori berita berhasil dihapus!');
    }
}
