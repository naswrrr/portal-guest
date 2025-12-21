@extends('layouts.guest.app')

@section('content')
    @include('layouts.guest.navbar')

    <div class="container-fluid content-section">
        <div class="container py-5">

            <!-- PAGE HEADER -->
            <div class="page-header-modern text-center mb-5">
                <div class="header-icon">
                    <i class="fas fa-images"></i>
                </div>
                <h5 class="text-primary fw-bold text-uppercase mb-2">Manajemen Galeri Desa</h5>
                <h1 class="display-4 fw-bold mb-3">Kelola Galeri Desa</h1>
                <p class="text-muted fs-5 mb-0">
                    Kelola dokumentasi kegiatan desa dengan rapi dan terstruktur
                </p>
            </div>

            <!-- NOTIFIKASI -->
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

            <!-- ACTION BAR -->
            <div class="action-bar mb-4">
                <div class="action-left">
                    <h4 class="mb-0 fw-bold text-dark">
                        <i class="fas fa-images me-2 text-primary"></i>
                        Daftar Galeri
                    </h4>
                    <p class="text-muted mb-0 mt-1">
                        Total {{ $galeri->total() }} galeri terdaftar
                    </p>
                </div>
                <div class="action-right">
                    <a href="{{ route('galeri.create') }}" class="btn-modern btn-primary-modern">
                        <i class="fas fa-plus me-2"></i>Tambah Galeri
                    </a>
                </div>
            </div>

            <!-- SEARCH -->
            <form method="GET" action="{{ route('galeri.index') }}" class="mb-4">
                <div class="row g-3">

                    <!-- Input Search -->
                    <div class="col-md-4">
                        <label class="form-label-modern">Cari Galeri</label>
                        <div class="input-group-modern">
                            <span class="input-icon"><i class="fas fa-search"></i></span>
                            <input type="text" name="search" class="form-control-modern"
                                placeholder="Cari judul atau deskripsi galeri..." value="{{ request('search') }}">
                        </div>
                    </div>

                    <!-- Tombol Cari -->
                    <div class="col-md-2 d-flex align-items-end">
                        <button class="btn-modern btn-primary-modern w-100">
                            <i class="fas fa-search me-2"></i>Cari
                        </button>
                    </div>

                    <!-- Tombol Clear -->
                    @if (request('search'))
                        <div class="col-md-2 d-flex align-items-end">
                            <a href="{{ route('galeri.index') }}" class="btn-modern btn-secondary-modern w-100">
                                <i class="fas fa-times me-2"></i>Clear
                            </a>
                        </div>
                    @endif

                </div>
            </form>

            <!-- CARD GRID -->
            @if ($galeri->count())
                <div class="row g-4">
                    @foreach ($galeri as $item)
                        <div class="col-lg-6 col-xl-4">
                            <div class="card-warga">

                                <!-- HEADER -->
                                <div class="card-warga-header">
                                    @php
                                        $cover = $item->media->sortBy('sort_order')->first();
                                        $logo = $cover
                                            ? asset('storage/' . $cover->file_name)
                                            : asset('assets-guest/img/background1.jpg'); // <-- placeholder
                                    @endphp

                                    <img src="{{ $logo }}"
                                        style="width:70px;height:70px;object-fit:cover;border-radius:50%;"
                                        alt="{{ $item->judul }}">

                                    <div class="user-info">
                                        <h6 class="user-name">{{ $item->judul }}</h6>
                                        <span class="badge-gender badge-male">
                                            <i class="fas fa-images me-1"></i>
                                            {{ $item->media->count() }} Foto
                                        </span>
                                    </div>
                                </div>

                                <!-- BODY -->
                                <div class="card-warga-body">
                                    <div class="info-item">
                                        <div class="info-icon bg-primary">
                                            <i class="fas fa-align-left"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Deskripsi</span>
                                            <span class="info-value">
                                                {{ \Illuminate\Support\Str::limit($item->deskripsi ?: '-', 80) }}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="info-item">
                                        <div class="info-icon bg-success">
                                            <i class="fas fa-calendar-alt"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Tanggal Dibuat</span>
                                            <span class="info-value">
                                                {{ optional($item->created_at)->format('d M Y') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- FOOTER -->
                                <div class="card-warga-footer">
                                    <a href="{{ route('galeri.show', $item->galeri_id) }}"
                                        class="btn-action btn-action-view">
                                        <i class="fas fa-eye"></i>
                                        <span>Detail</span>
                                    </a>
                                    <a href="{{ route('galeri.edit', $item->galeri_id) }}"
                                        class="btn-action btn-action-edit">
                                        <i class="fas fa-edit"></i>
                                        <span>Edit</span>
                                    </a>
                                    <form action="{{ route('galeri.destroy', $item->galeri_id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Hapus galeri ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-action-delete">
                                            <i class="fas fa-trash"></i>
                                            <span>Hapus</span>
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- PAGINATION -->
                <div class="mt-4">
                    {{ $galeri->links('pagination::bootstrap-5') }}
                </div>
            @else
                <!-- EMPTY STATE -->
                <div class="empty-state-modern">
                    <div class="empty-icon"><i class="fas fa-images"></i></div>
                    <h4 class="empty-title">Belum Ada Galeri</h4>
                    <p class="empty-text">Mulai tambahkan galeri untuk mendokumentasikan kegiatan desa</p>
                    <a href="{{ route('galeri.create') }}" class="btn-modern btn-primary-modern">
                        <i class="fas fa-plus me-2"></i>Tambah Galeri Pertama
                    </a>
                </div>
            @endif

        </div>
    </div>
@endsection
