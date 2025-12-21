@extends('layouts.guest.app')

@section('content')
    @include('layouts.guest.navbar')

    <div class="container-fluid content-section">
        <div class="container py-5">

            {{-- Header --}}
            <div class="page-header-modern text-center mb-5">
                <div class="header-icon"><i class="fas fa-tags"></i></div>
                <h5 class="text-primary fw-bold text-uppercase mb-2">Kategori Berita</h5>
                <h1 class="display-4 fw-bold mb-3">Kelola Kategori Berita Desa</h1>
                <p class="text-muted fs-5">Kelola kategori berita dengan mudah dan efisien</p>
            </div>

            {{-- Notifikasi --}}
            @if (session('success'))
                <div class="alert alert-modern alert-success alert-dismissible fade show">
                    <div class="alert-icon"><i class="fas fa-check-circle"></i></div>
                    <div class="alert-content">
                        <strong>Berhasil!</strong>
                        <p class="mb-0">{{ session('success') }}</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif


            {{-- Action Bar --}}
            <div class="action-bar mb-4 d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="fw-bold text-dark">
                        <i class="fas fa-tags text-primary me-2"></i>Daftar Kategori Berita
                    </h4>
                    <p class="text-muted mb-0 mt-1">
                        Total {{ $dataKategori->total() }} kategori
                    </p>
                </div>

                <a href="{{ route('kategori_berita.create') }}" class="btn-modern btn-primary-modern">
                    <i class="fas fa-plus me-2"></i>Tambah Kategori
                </a>
            </div>

            {{-- Search & Filter --}}
            <form method="GET" class="mb-4">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label-modern">Cari Kategori</label>
                        <input type="text" name="search" class="form-control-modern" value="{{ request('search') }}"
                            placeholder="Cari kategori...">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label-modern">Urutkan</label>
                        <select name="filter" class="form-control-modern">
                            <option value="">Default</option>
                            <option value="latest" {{ request('filter') == 'latest' ? 'selected' : '' }}>Terbaru</option>
                            <option value="oldest" {{ request('filter') == 'oldest' ? 'selected' : '' }}>Terlama</option>
                        </select>
                    </div>

                    <div class="col-md-2 d-flex align-items-end">
                        <button class="btn-modern btn-primary-modern w-100">
                            <i class="fas fa-search me-2"></i>Apply
                        </button>
                    </div>

                    @if (request('search') || request('filter'))
                        <div class="col-md-2 d-flex align-items-end">
                            <a href="{{ route('kategori_berita.index') }}" class="btn-modern btn-secondary-modern w-100">
                                <i class="fas fa-times me-2"></i>Clear
                            </a>
                        </div>
                    @endif
                </div>
            </form>

            {{-- Data List --}}
            @if ($dataKategori->count())
                <div class="row g-4">
                    @foreach ($dataKategori as $item)
                        <div class="col-lg-6 col-xl-4">
                            <div class="card-warga">
                                <div class="card-warga-header">
                                    <div class="user-avatar-modern"><i class="fas fa-tag"></i></div>
                                    <div class="user-info">
                                        <h6 class="user-name">{{ $item->nama }}</h6>
                                        <span class="badge-gender badge-male">
                                            <i class="fas fa-link me-1"></i>{{ $item->slug }}
                                        </span>
                                    </div>
                                </div>

                                <div class="card-warga-body">
                                    <div class="info-item">
                                        <div class="info-icon bg-primary"><i class="fas fa-align-left"></i></div>
                                        <div class="info-content">
                                            <span class="info-label">Deskripsi</span>
                                            <span class="info-value">{{ $item->deskripsi ?: 'Tidak ada deskripsi' }}</span>
                                        </div>
                                    </div>

                                    <div class="info-item">
                                        <div class="info-icon bg-warning"><i class="fas fa-calendar-alt"></i></div>
                                        <div class="info-content">
                                            <span class="info-label">Dibuat</span>
                                            <span class="info-value">{{ $item->created_at->format('d M Y') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-warga-footer">

                                    {{-- Detail --}}
                                    <a href="{{ route('kategori_berita.show', $item->kategori_id) }}"
                                        class="btn-action btn-action-secondary">
                                        <i class="fas fa-eye"></i><span>Detail</span>
                                    </a>

                                    {{-- Edit --}}
                                    <a href="{{ route('kategori_berita.edit', $item->kategori_id) }}"
                                        class="btn-action btn-action-edit">
                                        <i class="fas fa-edit"></i><span>Edit</span>
                                    </a>

                                    {{-- Hapus --}}
                                    <form action="{{ route('kategori_berita.destroy', $item->kategori_id) }}"
                                        method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-action btn-action-delete"
                                            onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                                            <i class="fas fa-trash"></i><span>Hapus</span>
                                        </button>
                                    </form>

                                </div>


                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-4">
                    {{ $dataKategori->links('pagination::bootstrap-5') }}
                </div>
            @else
                <div class="empty-state-modern">
                    <div class="empty-icon"><i class="fas fa-tags"></i></div>
                    <h4 class="empty-title">Belum Ada Kategori</h4>
                    <p class="empty-text">Tambahkan kategori pertama Anda.</p>
                    <a href="{{ route('kategori_berita.create') }}" class="btn-modern btn-primary-modern">
                        <i class="fas fa-plus me-2"></i>Tambah Kategori
                    </a>
                </div>
            @endif

        </div>
    </div>
@endsection
