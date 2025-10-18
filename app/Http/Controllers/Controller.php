<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    /**
     * MENAMPILKAN HALAMAN UTAMA DATA WARGA
     * Method: GET
     */
    public function index(Request $request)
    {
        // ===== HANDLE FORM SUBMISSION =====
        // Jika user submit form (method POST)
        if ($request->isMethod('post')) {

            // Jika tombol "Simpan Data" ditekan (CREATE)
            if ($request->has('store')) {
                return $this->store($request);
            }

            // Jika tombol "Update Data" ditekan (UPDATE)
            elseif ($request->has('update')) {
                return $this->update($request, $request->id);
            }
        }

        // ===== HANDLE DELETE =====
        // Jika tombol delete ditekan
        if ($request->has('delete')) {
            return $this->destroy($request->id);
        }

        // ===== AMBIL DATA DARI DATABASE =====
        // Get semua data warga dari database
        $dataWarga = Warga::orderBy('warga_id', 'desc')->get();

        // ===== CEK APAKAH SEDANG EDIT =====
        // Jika user klik tombol edit, ambil data yang mau diedit
        $editData = null;
        if ($request->has('edit')) {
            $editData = Warga::findOrFail($request->edit);
        }

        // ===== TAMPILKAN VIEW =====
        return view('warga.index', [
            'dataWarga' => $dataWarga,
            'editData' => $editData
        ]);
    }

    /**
     * MENYIMPAN DATA BARU (CREATE)
     * Method: POST
     */
    private function store(Request $request)
    {
        // ===== VALIDASI INPUT =====
        $request->validate([
            'nama_depan' => 'required|string|max:100',
            'nama_belakang' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'email' => 'required|email|unique:warga,email',
            'no_telepon' => 'required|numeric'
        ]);

        // ===== SIMPAN KE DATABASE =====
        Warga::create([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon
        ]);

        // ===== REDIRECT DENGAN PESAN SUKSES =====
        return redirect()->route('warga.index')
            ->with('success', 'Data warga berhasil ditambahkan!');
    }

    /**
     * UPDATE DATA YANG SUDAH ADA
     * Method: POST
     */
    private function update(Request $request, $id)
    {
        // ===== CARI DATA YANG MAU DIUPDATE =====
        $warga = Warga::findOrFail($id);

        // ===== VALIDASI INPUT =====
        $request->validate([
            'nama_depan' => 'required|string|max:100',
            'nama_belakang' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'email' => 'required|email|unique:warga,email,' . $warga->warga_id . ',warga_id',
            'no_telepon' => 'required|numeric'
        ]);

        // ===== UPDATE DATA DI DATABASE =====
        $warga->update([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon
        ]);

        // ===== REDIRECT DENGAN PESAN SUKSES =====
        return redirect()->route('warga.index')
            ->with('success', 'Data warga berhasil diupdate!');
    }

    /**
     * HAPUS DATA (DELETE)
     * Method: POST
     */
    private function destroy($id)
    {
        // ===== CARI DATA YANG MAU DIHAPUS =====
        $warga = Warga::findOrFail($id);

        // ===== HAPUS DATA =====
        $warga->delete();

        // ===== REDIRECT DENGAN PESAN SUKSES =====
        return redirect()->route('warga.index')
            ->with('success', 'Data warga berhasil dihapus!');
    }
}
