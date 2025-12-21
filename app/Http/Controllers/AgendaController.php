<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AgendaController extends Controller
{
    // =========================
    // INDEX (SEARCH + FILTER)
    // =========================
    public function index(Request $request)
    {
        $query = Agenda::query();

        // SEARCH
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('judul', 'like', '%' . $request->search . '%')
                  ->orWhere('lokasi', 'like', '%' . $request->search . '%')
                  ->orWhere('penyelenggara', 'like', '%' . $request->search . '%');
            });
        }

        // FILTER TANGGAL
        if ($request->filled('tanggal')) {
            $query->whereDate('tanggal_mulai', $request->tanggal);
        }

        $agendas = $query
            ->orderBy('tanggal_mulai', 'desc')
            ->paginate(9)
            ->withQueryString();

        return view('pages.agenda.index', compact('agendas'));
    }

    // =========================
    // CREATE
    // =========================
    public function create()
    {
        return view('pages.agenda.create');
    }

    // =========================
    // STORE
    // =========================
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

        $agenda = Agenda::create($validated);

        // SIMPAN MEDIA
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

    // =========================
    // SHOW
    // =========================
    public function show($id)
    {
        $agenda = Agenda::with('media')->findOrFail($id);
        return view('pages.agenda.show', compact('agenda'));
    }

    // =========================
    // EDIT
    // =========================
    public function edit($id)
    {
        $agenda = Agenda::with('media')->findOrFail($id);
        return view('pages.agenda.edit', compact('agenda'));
    }

    // =========================
    // UPDATE
    // =========================
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

        $agenda->update($request->only([
            'judul',
            'lokasi',
            'tanggal_mulai',
            'tanggal_selesai',
            'penyelenggara',
            'deskripsi',
        ]));

        // JIKA ADA FOTO BARU → GANTI TOTAL
        if ($request->hasFile('filename')) {

            $oldMedia = Media::where('ref_table', 'agenda')
                ->where('ref_id', $agenda->agenda_id)
                ->get();

            foreach ($oldMedia as $media) {
                if (Storage::disk('public')->exists($media->file_name)) {
                    Storage::disk('public')->delete($media->file_name);
                }
                $media->delete();
            }

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

    // =========================
    // DESTROY
    // =========================
    public function destroy($id)
    {
        $agenda = Agenda::findOrFail($id);

        $mediaList = Media::where('ref_table', 'agenda')
            ->where('ref_id', $agenda->agenda_id)
            ->get();

        foreach ($mediaList as $media) {
            Storage::disk('public')->delete($media->file_name);
            $media->delete();
        }

        $agenda->delete();

        return back()->with('success', 'Agenda berhasil dihapus');
    }
}
