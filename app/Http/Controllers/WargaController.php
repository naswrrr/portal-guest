<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index(Request $request)
    {
         $query = Warga::query();

    // Search
    if ($request->search) {
        $query->where(function ($q) use ($request) {
            $q->where('nama', 'like', '%' . $request->search . '%')
              ->orWhere('nik', 'like', '%' . $request->search . '%')
              ->orWhere('alamat', 'like', '%' . $request->search . '%');
        });
    }

    // Filter jenis kelamin
    if ($request->gender) {
        $query->where('jenis_kelamin', $request->gender);
    }

    // Sorting
    if ($request->sort) {
        switch ($request->sort) {
            case 'nama_asc':
                $query->orderBy('nama', 'asc');
                break;

            case 'nama_desc':
                $query->orderBy('nama', 'desc');
                break;

            case 'nik_asc':
                $query->orderBy('nik', 'asc');
                break;

            case 'nik_desc':
                $query->orderBy('nik', 'desc');
                break;
        }
    }

    // Pagination
    $data['dataWarga'] = $query->paginate(9)->appends($request->all());
    $data['editData'] = null;

    return view('pages.warga.index', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'nik' => 'required|string|size:16|unique:warga,nik',
            'no_kk' => 'required|string|size:16',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string'
        ]);

        Warga::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'no_kk' => $request->no_kk,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat
    ]);

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $warga = Warga::findOrFail($id);
        return view('pages.warga.show', compact('warga'));
    }

    public function edit(string $id)
    {
         $warga = Warga::findOrFail($id);
         return view('pages.warga.edit', compact('warga'));
    }

    public function update(Request $request, string $id)
    {
        $warga = Warga::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'nik' => 'required|string|size:16|unique:warga,nik,' . $warga->warga_id . ',warga_id',
            'no_kk' => 'required|string|size:16',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string'
        ]);

        $warga->update($validated);

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $warga = Warga::findOrFail($id);
        $warga->delete();

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil dihapus!');
    }
}
