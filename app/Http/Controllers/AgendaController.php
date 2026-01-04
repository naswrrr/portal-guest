<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AgendaController extends Controller
{
    // ==================================================
    // INDEX
    // Menampilkan daftar agenda dengan search & filter
    // ==================================================
    public function index(Request $request)
    {
        $query = Agenda::query();

        // ================= SEARCH =================
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('judul', 'like', '%' . $request->search . '%')
                  ->orWhere('lokasi', 'like', '%' . $request->search . '%')
                  ->orWhere('penyelenggara', 'like', '%' . $request->search . '%');
            });
        }

        // ================= FILTER TANGGAL =================
        if ($request->filled('tanggal')) {
            $query->whereDate('tanggal_mulai', $request->tanggal);
        }

        // ================= PAGINATION =================
        $agendas = $query
            ->orderBy('tanggal_mulai', 'desc') // urut dari terbaru
            ->paginate(9)
            ->withQueryString();

        return view('pages.agenda.index', compact('agendas'));
    }

    // ==================================================
    // CREATE
    // Menampilkan form tambah agenda baru
    // ==================================================
    public function create()
    {
        return view('pages.agenda.create');
    }

    // ==================================================
    // STORE
    // Menyimpan data agenda baru beserta media
    // ==================================================
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'           => 'required|string|max:255',
            'lokasi'          => 'required|string|max:255',
            'tanggal_mulai'   => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'penyelenggara'   => 'required|string|max:255',
            'deskripsi'       => 'nullable|string',
            'filename.*'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Simpan data agenda
        $agenda = Agenda::create($validated);

        // ================= SIMPAN MEDIA =================
        if ($request->hasFile('filename')) {
            foreach ($request->file('filename') as $index => $file) {

                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('media/agenda', $filename, 'public');

                Media::create([
                    'ref_table'  => 'agenda',
                    'ref_id'     => $agenda->agenda_id,
                    'file_name'  => 'media/agenda/' . $filename,
                    'mime_type'  => $file->getClientMimeType(),
                    'sort_order' => $index + 1,
                ]);
            }
        }

        return redirect()
            ->route('agenda.index')
            ->with('success', 'Agenda berhasil ditambahkan!');
    }

    // ==================================================
    // SHOW
    // Menampilkan detail agenda beserta media
    // ==================================================
    public function show($id)
    {
        $agenda = Agenda::with('media')->findOrFail($id);
        return view('pages.agenda.show', compact('agenda'));
    }

    // ==================================================
    // EDIT
    // Menampilkan form edit agenda beserta media
    // ==================================================
    public function edit($id)
    {
        $agenda = Agenda::with('media')->findOrFail($id);
        return view('pages.agenda.edit', compact('agenda'));
    }

    // ==================================================
    // UPDATE
    // Update data agenda dan ganti media jika ada file baru
    // ==================================================
    public function update(Request $request, $id)
    {
        $agenda = Agenda::findOrFail($id);

        $request->validate([
            'judul'           => 'required|string',
            'lokasi'          => 'required|string',
            'tanggal_mulai'   => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'penyelenggara'   => 'required|string',
            'deskripsi'       => 'nullable|string',
            'filename.*'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Update data agenda
        $agenda->update($request->only([
            'judul',
            'lokasi',
            'tanggal_mulai',
            'tanggal_selesai',
            'penyelenggara',
            'deskripsi',
        ]));

        // Jika ada file baru → hapus media lama & simpan yang baru
        if ($request->hasFile('filename')) {

            // Hapus file lama dari storage
            $oldMedia = Media::where('ref_table', 'agenda')
                ->where('ref_id', $agenda->agenda_id)
                ->get();

            foreach ($oldMedia as $media) {
                if (Storage::disk('public')->exists($media->file_name)) {
                    Storage::disk('public')->delete($media->file_name);
                }
                $media->delete();
            }

            // Simpan file baru
            foreach ($request->file('filename') as $index => $file) {

                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('media/agenda', $filename, 'public');

                Media::create([
                    'ref_table'  => 'agenda',
                    'ref_id'     => $agenda->agenda_id,
                    'file_name'  => 'media/agenda/' . $filename,
                    'mime_type'  => $file->getClientMimeType(),
                    'sort_order' => $index + 1,
                ]);
            }
        }

        return redirect()
            ->route('agenda.index')
            ->with('success', 'Agenda berhasil diperbarui!');
    }

    // ==================================================
    // DESTROY
    // Hapus agenda dan semua media terkait
    // ==================================================
    public function destroy($id)
    {
        $agenda = Agenda::findOrFail($id);

        // Hapus media lama dari storage dan database
        $mediaList = Media::where('ref_table', 'agenda')
            ->where('ref_id', $agenda->agenda_id)
            ->get();

        foreach ($mediaList as $media) {
            Storage::disk('public')->delete($media->file_name);
            $media->delete();
        }

        // Hapus agenda
        $agenda->delete();

        return back()->with('success', 'Agenda berhasil dihapus');
    }
}
