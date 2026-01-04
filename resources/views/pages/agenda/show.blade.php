@extends('layouts.guest.app')
{{-- Menggunakan layout utama guest (header, footer, dll) --}}

@section('content')
    {{-- Include navbar guest --}}
    @include('layouts.guest.navbar')

    {{-- Container utama halaman --}}
    <div class="container-fluid content-section">
        <div class="container py-5">

            <!-- ===================== ACTION BAR ===================== -->
            {{-- Bagian atas halaman: judul halaman + tombol kembali --}}
            <div class="action-bar mb-4">
                <div class="action-left">
                    {{-- Judul halaman --}}
                    <h4 class="mb-0 fw-bold text-dark">
                        <i class="fas fa-calendar-alt me-2 text-primary"></i>
                        Detail Agenda
                    </h4>

                    {{-- Subjudul menampilkan judul agenda --}}
                    <p class="text-muted mb-0 mt-1">
                        "{{ $agenda->judul }}"
                    </p>
                </div>

                {{-- Tombol kembali ke daftar agenda --}}
                <div class="action-right">
                    <a href="{{ route('agenda.index') }}" class="btn-modern btn-secondary-modern">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </div>

            <div class="row">

                <!-- ===================== KONTEN UTAMA ===================== -->
                <div class="col-lg-8">
                    <div class="card-modern mb-4">

                        {{-- Header card --}}
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-info-circle"></i>
                                <h5>Informasi Agenda</h5>
                            </div>
                        </div>

                        {{-- Body card --}}
                        <div class="card-body p-0">
                            <div class="card-warga">

                                <!-- ===================== HEADER AGENDA ===================== -->
                                {{-- Menampilkan ikon dan judul agenda --}}
                                <div class="card-warga-header">
                                    <div class="user-avatar-modern">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>

                                    <div class="user-info">
                                        {{-- Judul agenda --}}
                                        <h6 class="user-name">{{ $agenda->judul }}</h6>

                                        {{-- Lokasi agenda --}}
                                        <span class="badge-gender badge-male">
                                            <i class="fas fa-map-marker-alt me-1"></i>
                                            {{ $agenda->lokasi }}
                                        </span>
                                    </div>
                                </div>

                                <!-- ===================== DETAIL INFORMASI ===================== -->
                                <div class="card-warga-body">

                                    {{-- Penyelenggara --}}
                                    <div class="info-item">
                                        <div class="info-icon bg-success">
                                            <i class="fas fa-users"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Penyelenggara</span>
                                            <span class="info-value">{{ $agenda->penyelenggara }}</span>
                                        </div>
                                    </div>

                                    {{-- Tanggal mulai agenda --}}
                                    <div class="info-item">
                                        <div class="info-icon bg-warning">
                                            <i class="fas fa-calendar-plus"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Tanggal Mulai</span>
                                            <span class="info-value">
                                                {{ \Carbon\Carbon::parse($agenda->tanggal_mulai)->format('d M Y') }}
                                            </span>
                                        </div>
                                    </div>

                                    {{-- Tanggal selesai agenda --}}
                                    <div class="info-item">
                                        <div class="info-icon bg-danger">
                                            <i class="fas fa-calendar-check"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Tanggal Selesai</span>
                                            <span class="info-value">
                                                {{ \Carbon\Carbon::parse($agenda->tanggal_selesai)->format('d M Y') }}
                                            </span>
                                        </div>
                                    </div>

                                    {{-- ID agenda --}}
                                    <div class="info-item">
                                        <div class="info-icon bg-info">
                                            <i class="fas fa-hashtag"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">ID Agenda</span>
                                            <span class="info-value">#{{ $agenda->agenda_id }}</span>
                                        </div>
                                    </div>

                                    {{-- Waktu pembuatan agenda --}}
                                    <div class="info-item">
                                        <div class="info-icon bg-primary">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Dibuat</span>
                                            <span class="info-value">
                                                {{ $agenda->created_at->format('d M Y H:i') }}
                                            </span>
                                        </div>
                                    </div>

                                    {{-- Waktu terakhir diperbarui --}}
                                    <div class="info-item">
                                        <div class="info-icon bg-success">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Update Terakhir</span>
                                            <span class="info-value">
                                                {{ $agenda->updated_at->format('d M Y H:i') }}
                                            </span>
                                        </div>
                                    </div>

                                </div>

                                <!-- ===================== DESKRIPSI ===================== -->
                                {{-- Menampilkan deskripsi agenda, jika kosong tampil "-" --}}
                                <div class="mt-3 p-3 bg-light rounded">
                                    <strong>Deskripsi:</strong>
                                    <p class="mb-0">{{ $agenda->deskripsi ?: '-' }}</p>
                                </div>

                                <!-- ===================== MEDIA ===================== -->
                                {{-- Menampilkan media jika agenda memiliki relasi media --}}
                                @if($agenda->media->count())
                                    <div class="mt-4">
                                        <strong>Media:</strong>

                                        {{-- Grid gambar --}}
                                        <div class="row g-3 mt-2">
                                            @foreach($agenda->media as $media)
                                                <div class="col-md-4">
                                                    {{-- Gambar agenda --}}
                                                    <img src="{{ asset('storage/'.$media->file_name) }}?v={{ time() }}"
                                                         class="img-fluid rounded"
                                                         style="height:150px; object-fit:cover">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>

                <!-- ===================== SIDEBAR AKSI ===================== -->
                <div class="col-lg-4">
                    <div class="card-modern mb-4">

                        {{-- Header sidebar --}}
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-cogs"></i>
                                <h5>Aksi</h5>
                            </div>
                        </div>

                        {{-- Tombol-tombol aksi --}}
                        <div class="card-body">
                            <div class="d-grid gap-2">

                                {{-- Edit agenda --}}
                                <a href="{{ route('agenda.edit', $agenda->agenda_id) }}"
                                   class="btn-modern btn-warning-modern">
                                    <i class="fas fa-edit me-2"></i>Edit Agenda
                                </a>

                                {{-- Hapus agenda --}}
                                <form action="{{ route('agenda.destroy', $agenda->agenda_id) }}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn-modern btn-danger-modern"
                                            onclick="return confirm('Hapus agenda ini?')">
                                        <i class="fas fa-trash me-2"></i>Hapus Agenda
                                    </button>
                                </form>

                                {{-- Tambah agenda baru --}}
                                <a href="{{ route('agenda.create') }}"
                                   class="btn-modern btn-success-modern">
                                    <i class="fas fa-plus me-2"></i>Tambah Agenda
                                </a>

                                {{-- Kembali ke daftar agenda --}}
                                <a href="{{ route('agenda.index') }}"
                                   class="btn-modern btn-secondary-modern">
                                    <i class="fas fa-list me-2"></i>Daftar Agenda
                                </a>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
