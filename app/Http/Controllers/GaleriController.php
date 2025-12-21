<?php
namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    // ===============================
    // INDEX + SEARCH
    // ===============================
    public function index(Request $request)
    {
        $query = Galeri::with('media');

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('judul', 'like', '%' . $request->search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $request->search . '%');
            });
        }

        $galeri = $query
            ->latest()
            ->paginate(9)
            ->withQueryString();

        return view('pages.galeri.index', compact('galeri'));
    }

    // ===============================
    // CREATE
    // ===============================
    public function create()
    {
        return view('pages.galeri.create');
    }

    // ===============================
    // STORE (MULTIPLE FOTO)
    // ===============================
    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'media.*'   => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $galeri = Galeri::create([
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        // ✅ JIKA ADA FILE, SIMPAN
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $index => $file) {
                $path = $file->store('galeri', 'public');

                Media::create([
                    'ref_table'  => 'galeri',
                    'ref_id'     => $galeri->galeri_id,
                    'file_name'  => $path,
                    'mime_type'  => $file->getClientMimeType(),
                    'sort_order' => $index + 1,
                ]);
            }
        }

        return redirect()->route('galeri.index')
            ->with('success', 'Galeri berhasil ditambahkan');
    }

    // ===============================
    // SHOW
    // ===============================
    public function show($id)
    {
        $galeri = Galeri::with('media')->findOrFail($id);
        return view('pages.galeri.show', compact('galeri'));
    }

    // ===============================
    // EDIT
    // ===============================
    public function edit($id)
    {
        $galeri = Galeri::with('media')->findOrFail($id);
        return view('pages.galeri.edit', compact('galeri'));
    }

    // ===============================
    // UPDATE (REPLACE FOTO)
    // ===============================
    public function update(Request $request, $id)
    {
        $galeri = Galeri::with('media')->findOrFail($id);

        $request->validate([
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'media.*'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $galeri->update([
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        if ($request->hasFile('media')) {

            // hapus file lama
            foreach ($galeri->media as $media) {
                if (Storage::disk('public')->exists($media->file_name)) {
                    Storage::disk('public')->delete($media->file_name);
                }
            }

            // hapus data lama
            $galeri->media()->delete();

            // simpan file baru
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

    // ===============================
    // DESTROY
    // ===============================
    public function destroy($id)
    {
        $galeri = Galeri::with('media')->findOrFail($id);

        foreach ($galeri->media as $media) {
            if (Storage::disk('public')->exists($media->file_name)) {
                Storage::disk('public')->delete($media->file_name);
            }
        }

        $galeri->media()->delete();
        $galeri->delete();

        return redirect()->route('galeri.index')
            ->with('success', 'Galeri berhasil dihapus');
    }
}
