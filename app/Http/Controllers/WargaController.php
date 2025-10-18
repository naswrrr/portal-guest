<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga; // JANGAN LUPA INI

class WargaController extends Controller
{
    public function index()
    {
        $data['dataWarga'] = Warga::all();
        $data['editData'] = null;
        return view('warga.index', $data);
    }

    public function create()
    {
        return view('warga.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_depan' => 'required|string|max:100',
            'nama_belakang' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'email' => 'nullable|email|unique:warga,email',
            'no_telepon' => 'nullable|numeric'
        ]);

        Warga::create($validated);

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $data['editData'] = Warga::findOrFail($id);
        $data['dataWarga'] = Warga::all();
        return view('warga.index', $data);
    }

    public function update(Request $request, string $id)
    {
        $warga = Warga::findOrFail($id);

        $validated = $request->validate([
            'nama_depan' => 'required|string|max:100',
            'nama_belakang' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'email' => 'nullable|email|unique:warga,email,' . $warga->warga_id . ',warga_id',
            'no_telepon' => 'nullable|numeric'
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
