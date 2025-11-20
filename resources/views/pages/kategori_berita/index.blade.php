@extends('layouts.guest.app')

@section('content')
    {{-- start main content --}}
    <!-- Navbar start -->
    @include('layouts.guest.navbar')
    <!-- Navbar End -->

    <!-- Content Start -->
    <div class="container-fluid content-section">
        <div class="container py-5">

            <!-- Page Header Start -->
            <div class="page-header-modern text-center mb-5">
                <div class="header-icon">
                    <i class="fas fa-tags"></i>
                </div>
                <h5 class="text-primary fw-bold text-uppercase mb-2">Kategori Berita</h5>
                <h1 class="display-4 fw-bold mb-3">Kelola Kategori Berita Desa</h1>
                <p class="text-muted fs-5 mb-0">Kelola kategori berita untuk portal desa dengan mudah dan efisien</p>
            </div>
            <!-- Page Header End -->

            <!-- Notifikasi -->
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

            <!-- Form Edit (Muncul saat edit) -->
            @if (isset($editData))
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="card-modern card-edit">
                            <div class="card-header-modern">
                                <div class="header-content">
                                    <i class="fas fa-edit"></i>
                                    <h5>Edit Kategori Berita</h5>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <form action="{{ route('kategori_berita.update', $editData->kategori_id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row g-4">
                                        <div class="col-12">
                                            <label for="nama" class="form-label-modern">Nama Kategori</label>
                                            <div class="input-group-modern">
                                                <span class="input-icon">
                                                    <i class="fas fa-tag"></i>
                                                </span>
                                                <input type="text" class="form-control-modern" id="nama"
                                                    name="nama" value="{{ old('nama', $editData->nama) }}"
                                                    placeholder="Masukkan nama kategori" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="slug" class="form-label-modern">Slug</label>
                                            <div class="input-group-modern">
                                                <span class="input-icon">
                                                    <i class="fas fa-link"></i>
                                                </span>
                                                <input type="text" class="form-control-modern" id="slug"
                                                    value="{{ $editData->slug }}" readonly>
                                            </div>
                                            <small class="text-muted">* Slug otomatis dari nama kategori</small>
                                        </div>
                                        <div class="col-12">
                                            <label for="deskripsi" class="form-label-modern">Deskripsi</label>
                                            <div class="input-group-modern">
                                                <span class="input-icon textarea-icon">
                                                    <i class="fas fa-align-left"></i>
                                                </span>
                                                <textarea class="form-control-modern" id="deskripsi" name="deskripsi" rows="4"
                                                    placeholder="Masukkan deskripsi kategori">{{ old('deskripsi', $editData->deskripsi) }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-flex gap-3">
                                                <button type="submit" class="btn-modern btn-primary-modern">
                                                    <i class="fas fa-save me-2"></i>Update Kategori
                                                </button>
                                                <a href="{{ route('kategori_berita.index') }}"
                                                    class="btn-modern btn-secondary-modern">
                                                    <i class="fas fa-times me-2"></i>Batal
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Action Bar -->
            <div class="action-bar mb-4">
                <div class="action-left">
                    <h4 class="mb-0 fw-bold text-dark">
                        <i class="fas fa-tags me-2 text-primary"></i>
                        Daftar Kategori Berita
                    </h4>
                    <p class="text-muted mb-0 mt-1">Total {{ $dataKategori->total() }} kategori terdaftar</p>
                </div>
                <div class="action-right">
                    <a href="{{ route('kategori_berita.create') }}" class="btn-modern btn-primary-modern">
                        <i class="fas fa-plus me-2"></i>Tambah Kategori Baru
                    </a>
                </div>
            </div>

            <!-- 🔍 Search + Filter + Sort -->
            <form action="{{ route('kategori_berita.index') }}" method="GET" class="mb-4">
                <div class="row g-3">

                    <!-- SEARCH -->
                    <div class="col-md-4">
                        <label class="form-label-modern">Cari Kategori</label>
                        <input type="text" name="search" class="form-control-modern" value="{{ request('search') }}"
                            placeholder="Cari kategori...">
                    </div>

                    <!-- SORT -->
                    <div class="col-md-3">
                        <label class="form-label-modern">Urutkan</label>
                        <select name="filter" class="form-control-modern">
                            <option value="">Default</option>
                            <option value="latest" {{ request('filter') == 'latest' ? 'selected' : '' }}>
                                Terbaru
                            </option>
                            <option value="oldest" {{ request('filter') == 'oldest' ? 'selected' : '' }}>
                                Terlama
                            </option>
                        </select>
                    </div>

                    <!-- BUTTON -->
                    <div class="col-md-2 d-flex align-items-end">
                        <button class="btn-modern btn-primary-modern w-100">
                            <i class="fas fa-search me-2"></i> Apply
                        </button>
                    </div>

                    <!-- CLEAR BUTTON (opsional muncul kalau ada search/filter) -->
                    @if (request('search') || request('filter'))
                        <div class="col-md-2 d-flex align-items-end">
                            <a href="{{ route('kategori_berita.index') }}" class="btn-modern btn-secondary-modern w-100">
                                <i class="fas fa-times me-2"></i> Clear
                            </a>
                        </div>
                    @endif

                </div>
            </form>


            <!-- Card Grid -->
            @if ($dataKategori->count() > 0)
                <div class="row g-4">
                    @foreach ($dataKategori as $item)
                        <div class="col-lg-6 col-xl-4">
                            <div class="card-warga">
                                <div class="card-warga-header">
                                    <div class="user-avatar-modern">
                                        <i class="fas fa-tag"></i>
                                    </div>
                                    <div class="user-info">
                                        <h6 class="user-name">{{ $item->nama }}</h6>
                                        <span class="badge-gender badge-male">
                                            <i class="fas fa-link me-1"></i>
                                            {{ $item->slug }}
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
                                            <span
                                                class="info-value">{{ $item->deskripsi ?: 'Tidak ada deskripsi' }}</span>
                                        </div>
                                    </div>

                                    <div class="info-item">
                                        <div class="info-icon bg-success">
                                            <i class="fas fa-hashtag"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Slug</span>
                                            <span class="info-value">{{ $item->slug }}</span>
                                        </div>
                                    </div>

                                    <div class="info-item">
                                        <div class="info-icon bg-warning">
                                            <i class="fas fa-calendar-alt"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Dibuat</span>
                                            <span class="info-value">{{ $item->created_at->format('d M Y') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-warga-footer">
                                    <a href="{{ route('kategori_berita.edit', $item->kategori_id) }}"
                                        class="btn-action btn-action-edit">
                                        <i class="fas fa-edit"></i>
                                        <span>Edit</span>
                                    </a>
                                    <form action="{{ route('kategori_berita.destroy', $item->kategori_id) }}"
                                        method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-action-delete"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus kategori berita ini?')">
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
                    {{ $dataKategori->links('pagination::bootstrap-5') }}
                </div>
            @else
                <div class="empty-state-modern">
                    <div class="empty-icon">
                        <i class="fas fa-tags"></i>
                    </div>
                    <h4 class="empty-title">Belum Ada Kategori</h4>
                    <p class="empty-text">Tambahkan kategori pertama Anda.</p>
                    <a href="{{ route('kategori_berita.create') }}" class="btn-modern btn-primary-modern">
                        <i class="fas fa-plus me-2"></i>Tambah Kategori Pertama
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
