<?php
namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WargaController extends Controller
{
    // =====================================
    // LIST WARGA
    // =====================================
    public function index(Request $request)
    {
        $query = Warga::with('media');

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', "%{$request->search}%")
                    ->orWhere('no_ktp', 'like', "%{$request->search}%")
                    ->orWhere('email', 'like', "%{$request->search}%");
            });
        }

        if ($request->gender) {
            $query->where('jenis_kelamin', $request->gender);
        }

        if ($request->sort == 'nama_asc') {
            $query->orderBy('nama', 'asc');
        }

        if ($request->sort == 'nama_desc') {
            $query->orderBy('nama', 'desc');
        }

        if ($request->sort == 'nik_asc') {
            $query->orderBy('no_ktp', 'asc');
        }

        if ($request->sort == 'nik_desc') {
            $query->orderBy('no_ktp', 'desc');
        }

        $warga = $query->paginate(10);

        return view('pages.warga.index', compact('warga'));
    }

    // =====================================
    // CREATE
    // =====================================
    public function create()
    {
        return view('pages.warga.create');
    }

    // =====================================
    // STORE
    // =====================================
    public function store(Request $request)
    {
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

        $warga = Warga::create($request->except('foto'));

        // Simpan foto multiple
        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $file) {

                $filename = time() . '_' . $file->getClientOriginalName();
                $path     = $file->storeAs("warga/{$warga->warga_id}", $filename, 'public');

                Media::create([
                    'ref_table' => 'warga',
                    'ref_id'    => $warga->warga_id,
                    'file_name' => $path,
                    'mime_type' => $file->getClientMimeType(),
                    'caption'   => 'Foto Warga',
                ]);

            }
        }

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil ditambahkan.');
    }

    // =====================================
    // EDIT
    // =====================================
    public function edit($id)
    {
        $warga = Warga::findOrFail($id);

        $fotos = Media::where('ref_table', 'warga')
            ->where('ref_id', $id)
            ->get();

        return view('pages.warga.edit', compact('warga', 'fotos'));
    }

    // =====================================
    // UPDATE
    // =====================================
    public function update(Request $request, $id)
    {
        $warga = Warga::findOrFail($id);

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

        $warga->update($request->except('foto'));

        // ============================================
        // 1. HAPUS SEMUA FOTO LAMA
        // ============================================
        $fotosLama = Media::where('ref_table', 'warga')
            ->where('ref_id', $id)
            ->get();

        foreach ($fotosLama as $foto) {
            if (Storage::disk('public')->exists($foto->file_name)) {
                Storage::disk('public')->delete($foto->file_name);
            }
            $foto->delete();
        }

        // ============================================
        // 2. SIMPAN FOTO BARU
        // ============================================
        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $path     = $file->storeAs("warga/{$warga->warga_id}", $filename, 'public');

                Media::create([
                    'ref_table' => 'warga',
                    'ref_id'    => $warga->warga_id,
                    'file_name' => $path,
                    'mime_type' => $file->getClientMimeType(),
                    'caption'   => 'Foto Warga',
                ]);
            }
        }

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil diperbarui.');
    }

    // =====================================
    // DELETE
    // =====================================
    public function destroy($id)
    {
        $warga = Warga::findOrFail($id);

        $fotos = Media::where('ref_table', 'warga')->where('ref_id', $id)->get();

        foreach ($fotos as $foto) {
            if (Storage::disk('public')->exists($foto->file_name)) { // ✅ GANTI
                Storage::disk('public')->delete($foto->file_name);       // ✅ GANTI
            }
            $foto->delete();
        }

        $warga->delete();

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil dihapus.');
    }

}
