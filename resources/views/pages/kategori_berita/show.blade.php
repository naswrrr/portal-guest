@extends('layouts.guest.app')

@section('content')
@include('layouts.guest.navbar')

<div class="container-fluid content-section">
    <div class="container py-5">

        {{-- Action Bar --}}
        <div class="action-bar mb-4">
            <div class="action-left">
                <h4 class="mb-0 fw-bold text-dark">
                    <i class="fas fa-eye me-2 text-primary"></i>
                    Detail Kategori Berita
                </h4>
                <p class="text-muted mb-0 mt-1">
                    <i class="fas fa-tag me-1"></i>
                    "{{ Str::limit($kategori->nama, 50) }}"
                </p>
            </div>
            <div class="action-right">
                <a href="{{ route('kategori_berita.index') }}"
                   class="btn-modern btn-secondary-modern">
                    <i class="fas fa-arrow-left me-2"></i>Kembali
                </a>
            </div>
        </div>

        <div class="row">
            {{-- KONTEN UTAMA --}}
            <div class="col-lg-8">

                <div class="card-modern mb-4">
                    <div class="card-header-modern">
                        <div class="header-content">
                            <i class="fas fa-info-circle"></i>
                            <h5>Informasi Kategori</h5>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <div class="card-warga">

                            <div class="card-warga-header">
                                <div class="user-avatar-modern">
                                    <i class="fas fa-tag"></i>
                                </div>
                                <div class="user-info">
                                    <h6 class="user-name">{{ $kategori->nama }}</h6>
                                    <span class="badge-gender badge-male">
                                        <i class="fas fa-link me-1"></i>{{ $kategori->slug }}
                                    </span>
                                </div>
                            </div>

                            <div class="card-warga-body">
                                <div class="info-item">
                                    <div class="info-icon bg-primary">
                                        <i class="fas fa-align-left"></i>
                                    </div>
                                    <div class="info-content">
                                        <span class="info-label">Deskripsi</span>
                                        <span class="info-value">
                                            {{ $kategori->deskripsi ?: 'Tidak ada deskripsi' }}
                                        </span>
                                    </div>
                                </div>

                                <div class="info-item">
                                    <div class="info-icon bg-warning">
                                        <i class="fas fa-calendar-plus"></i>
                                    </div>
                                    <div class="info-content">
                                        <span class="info-label">Dibuat</span>
                                        <span class="info-value">
                                            {{ $kategori->created_at->format('d M Y') }}
                                        </span>
                                    </div>
                                </div>

                                <div class="info-item">
                                    <div class="info-icon bg-info">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div class="info-content">
                                        <span class="info-label">Update Terakhir</span>
                                        <span class="info-value">
                                            {{ $kategori->updated_at->format('d M Y H:i') }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            {{-- SIDEBAR --}}
            <div class="col-lg-4">

                {{-- Aksi --}}
                <div class="card-modern mb-4">
                    <div class="card-header-modern">
                        <div class="header-content">
                            <i class="fas fa-cogs"></i>
                            <h5>Aksi</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="{{ route('kategori_berita.edit', $kategori->kategori_id) }}"
                               class="btn-modern btn-warning-modern">
                                <i class="fas fa-edit me-2"></i>Edit Kategori
                            </a>

                            <form action="{{ route('kategori_berita.destroy', $kategori->kategori_id) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="btn-modern btn-danger-modern"
                                    onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                                    <i class="fas fa-trash me-2"></i>Hapus Kategori
                                </button>
                            </form>

                            <a href="{{ route('kategori_berita.create') }}"
                               class="btn-modern btn-success-modern">
                                <i class="fas fa-plus me-2"></i>Tambah Kategori
                            </a>

                            <a href="{{ route('kategori_berita.index') }}"
                               class="btn-modern btn-secondary-modern">
                                <i class="fas fa-list me-2"></i>Daftar Kategori
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Statistik --}}
                <div class="card-modern">
                    <div class="card-header-modern">
                        <div class="header-content">
                            <i class="fas fa-info-circle"></i>
                            <h5>Informasi Tambahan</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-column gap-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="icon-circle bg-primary">
                                    <i class="fas fa-hashtag"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">ID Kategori</small>
                                    <strong>{{ $kategori->kategori_id }}</strong>
                                </div>
                            </div>

                            <div class="d-flex align-items-center gap-3">
                                <div class="icon-circle bg-success">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Usia Data</small>
                                    <strong>{{ $kategori->created_at->diffForHumans() }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
