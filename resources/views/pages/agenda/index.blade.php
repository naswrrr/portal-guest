@extends('layouts.guest.app')
{{-- Menggunakan layout utama guest (header, footer, css, js global) --}}

@section('content')
    {{-- Container utama halaman --}}
    <div class="container-fluid content-section">
        <div class="container py-5">

            <!-- ===================== PAGE HEADER ===================== -->
            {{-- Header halaman dengan judul dan deskripsi --}}
            <div class="page-header-modern text-center mb-5">
                <div class="header-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>

                <h5 class="text-primary fw-bold text-uppercase mb-2">
                    Manajemen Agenda
                </h5>

                <h1 class="display-4 fw-bold mb-3">
                    Kelola Agenda Desa
                </h1>

                <p class="text-muted fs-5 mb-0">
                    Kelola seluruh agenda dan kegiatan desa dengan mudah dan terstruktur
                </p>
            </div>

            <!-- ===================== NOTIFIKASI SUCCESS ===================== -->
            {{-- Menampilkan notifikasi sukses setelah tambah/edit/hapus --}}
            @if (session('success'))
                <div class="alert alert-modern alert-success alert-dismissible fade show" role="alert">
                    <div class="alert-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="alert-content">
                        <strong>Berhasil!</strong>
                        <p class="mb-0">{{ session('success') }}</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- ===================== ACTION BAR ===================== -->
            {{-- Bar aksi berisi judul daftar agenda dan tombol tambah --}}
            <div class="action-bar mb-4">
                <div class="action-left">
                    <h4 class="mb-0 fw-bold text-dark">
                        <i class="fas fa-calendar me-2 text-primary"></i>
                        Daftar Agenda
                    </h4>

                    {{-- Menampilkan total agenda dari pagination --}}
                    <p class="text-muted mb-0 mt-1">
                        Total {{ $agendas->total() }} agenda terdaftar
                    </p>
                </div>

                {{-- Tombol tambah agenda --}}
                <div class="action-right">
                    <a href="{{ route('agenda.create') }}" class="btn-modern btn-primary-modern">
                        <i class="fas fa-plus me-2"></i>Tambah Agenda
                    </a>
                </div>
            </div>

            <!-- ===================== SEARCH & FILTER ===================== -->
            {{-- Form pencarian dan filter agenda --}}
            <form method="GET" action="{{ route('agenda.index') }}" class="mb-4">
                <div class="row g-3">

                    {{-- Input pencarian judul / lokasi --}}
                    <div class="col-md-4">
                        <label class="form-label-modern">Cari Agenda</label>
                        <div class="input-group-modern">
                            <span class="input-icon">
                                <i class="fas fa-search"></i>
                            </span>
                            <input type="text"
                                   name="search"
                                   class="form-control-modern"
                                   placeholder="Cari judul atau lokasi agenda..."
                                   value="{{ request('search') }}">
                        </div>
                    </div>

                    {{-- Filter tanggal --}}
                    <div class="col-md-3">
                        <label class="form-label-modern">Tanggal</label>
                        <input type="date"
                               name="tanggal"
                               class="form-control-modern"
                               value="{{ request('tanggal') }}">
                    </div>

                    {{-- Tombol cari --}}
                    <div class="col-md-2 d-flex align-items-end">
                        <button class="btn-modern btn-primary-modern w-100">
                            <i class="fas fa-search me-2"></i>Cari
                        </button>
                    </div>

                    {{-- Tombol reset filter --}}
                    @if (request('search') || request('tanggal'))
                        <div class="col-md-2 d-flex align-items-end mt-3 mt-md-0">
                            <a href="{{ route('agenda.index') }}"
                               class="btn-modern btn-secondary-modern w-100">
                                <i class="fas fa-times me-2"></i>Clear
                            </a>
                        </div>
                    @endif

                </div>
            </form>

            <!-- ===================== CARD GRID AGENDA ===================== -->
            {{-- Mengecek apakah data agenda tersedia --}}
            @if ($agendas->count())
                <div class="row g-4">

                    {{-- Looping data agenda --}}
                    @foreach ($agendas as $agenda)
                        <div class="col-lg-6 col-xl-4">
                            <div class="card-warga">

                                <!-- ===================== CARD HEADER ===================== -->
                                <div class="card-warga-header">
                                    @php
                                        // Ambil media pertama agenda
                                        $media = $agenda->media->first();

                                        // Tentukan gambar: media agenda atau placeholder
                                        $logo = $media && file_exists(public_path('storage/' . $media->file_name))
                                            ? asset('storage/' . $media->file_name)
                                            : asset('assets-guest/img/background1.jpg');
                                    @endphp

                                    {{-- Foto agenda --}}
                                    <img src="{{ $logo }}"
                                         style="width:70px;height:70px;object-fit:cover;border-radius:50%;"
                                         alt="{{ $agenda->judul }}">

                                    {{-- Informasi singkat agenda --}}
                                    <div class="user-info">
                                        <h6 class="user-name">{{ $agenda->judul }}</h6>
                                        <span class="badge-gender badge-male">
                                            <i class="fas fa-map-marker-alt me-1"></i>
                                            {{ $agenda->lokasi }}
                                        </span>
                                    </div>
                                </div>

                                <!-- ===================== CARD BODY ===================== -->
                                <div class="card-warga-body">

                                    {{-- Tanggal mulai --}}
                                    <div class="info-item">
                                        <div class="info-icon bg-success">
                                            <i class="fas fa-play"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Mulai</span>
                                            <span class="info-value">
                                                {{ \Carbon\Carbon::parse($agenda->tanggal_mulai)->translatedFormat('d M Y') }}
                                            </span>
                                        </div>
                                    </div>

                                    {{-- Tanggal selesai --}}
                                    <div class="info-item">
                                        <div class="info-icon bg-danger">
                                            <i class="fas fa-stop"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Selesai</span>
                                            <span class="info-value">
                                                {{ \Carbon\Carbon::parse($agenda->tanggal_selesai)->translatedFormat('d M Y') }}
                                            </span>
                                        </div>
                                    </div>

                                    {{-- Penyelenggara --}}
                                    <div class="info-item">
                                        <div class="info-icon bg-info">
                                            <i class="fas fa-building"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Penyelenggara</span>
                                            <span class="info-value">{{ $agenda->penyelenggara }}</span>
                                        </div>
                                    </div>

                                </div>

                                <!-- ===================== CARD FOOTER ===================== -->
                                <div class="card-warga-footer">

                                    {{-- Tombol detail --}}
                                    <a href="{{ route('agenda.show', $agenda->agenda_id) }}"
                                       class="btn-action btn-action-view">
                                        <i class="fas fa-eye"></i>
                                        <span>Detail</span>
                                    </a>

                                    {{-- Tombol edit --}}
                                    <a href="{{ route('agenda.edit', $agenda->agenda_id) }}"
                                       class="btn-action btn-action-edit">
                                        <i class="fas fa-edit"></i>
                                        <span>Edit</span>
                                    </a>

                                    {{-- Tombol hapus --}}
                                    <form action="{{ route('agenda.destroy', $agenda->agenda_id) }}"
                                          method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn-action btn-action-delete"
                                                onclick="return confirm('Hapus agenda ini?')">
                                            <i class="fas fa-trash"></i>
                                            <span>Hapus</span>
                                        </button>
                                    </form>

                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- ===================== PAGINATION ===================== -->
                {{-- Pagination Bootstrap 5 --}}
                <div class="mt-4">
                    {{ $agendas->links('pagination::bootstrap-5') }}
                </div>

            @else
                <!-- ===================== EMPTY STATE ===================== -->
                {{-- Tampilan jika belum ada data agenda --}}
                <div class="empty-state-modern">
                    <div class="empty-icon">
                        <i class="fas fa-calendar"></i>
                    </div>
                    <h4 class="empty-title">Belum Ada Agenda</h4>
                    <p class="empty-text">
                        Silakan tambahkan agenda desa pertama Anda
                    </p>
                    <a href="{{ route('agenda.create') }}"
                       class="btn-modern btn-primary-modern">
                        <i class="fas fa-plus me-2"></i>Tambah Agenda
                    </a>
                </div>
            @endif

        </div>
    </div>
@endsection
