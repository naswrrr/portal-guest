@extends('layouts.warga.app')

@section('content')
    {{-- start main content --}}
    <!-- Navbar start -->
    <div class="container-fluid fixed-top px-0">
        <div class="container px-0">
            <div class="topbar">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8">
                        <div class="topbar-info d-flex flex-wrap">
                            <a href="#" class="text-light me-4"><i
                                    class="fas fa-envelope text-white me-2"></i>BinaDesa@gmail.com</a>
                            <a href="#" class="text-light"><i
                                    class="fas fa-phone-alt text-white me-2"></i>+01234567890</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="topbar-icon d-flex align-items-center justify-content-end">
                            <a href="#" class="btn-square text-white me-2"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="btn-square text-white me-2"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="btn-square text-white me-2"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-light bg-light navbar-expand-xl">
                <a href="{{ url('/') }}" class="navbar-brand ms-3">
                    <h1 class="text-primary display-5">Portal Bina Desa</h1>
                </a>
                <button class="navbar-toggler py-2 px-3 me-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-light" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
                        <a href="{{ route('users.index') }}" class="nav-item nav-link">User</a>
                        <a href="{{ route('warga.index') }}" class="nav-item nav-link active">Data Warga</a>
                        <a href="{{ url('/kategori_berita') }}" class="nav-item nav-link">Kategori Berita</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="fas fa-user me-1"></i> {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu">
                                <div class="dropdown-divider"></div>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    {{-- navbar end --}}

    <!-- Content Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">

            <!-- Page Header Start -->
            <div class="container-fluid page-header py-5 mb-5">
                <div class="container py-5">
                    <div class="text-center mx-auto pb-5" style="max-width: 800px;">
                        <h5 class="text-uppercase text-primary">Data Warga</h5>
                        <h1 class="mb-4">Kelola Data Warga Desa</h1>
                        <p class="mb-0">Kelola informasi data warga desa dengan mudah dan efisien</p>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->

            <!-- Notifikasi -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Form Edit (Muncul saat edit) -->
            @if (isset($editData))
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="card border-warning shadow">
                            <div class="card-header bg-warning text-dark py-3">
                                <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Edit Data Warga</h5>
                            </div>
                            <div class="card-body p-4">
                                <form action="{{ route('warga.update', $editData->warga_id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <label for="nama" class="form-label fw-bold">Nama Lengkap</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-primary text-white">
                                                    <i class="fas fa-user"></i>
                                                </span>
                                                <input type="text" class="form-control" id="nama" name="nama"
                                                    value="{{ old('nama', $editData->nama) }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="nik" class="form-label fw-bold">NIK</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-primary text-white">
                                                    <i class="fas fa-id-card"></i>
                                                </span>
                                                <input type="text" class="form-control" id="nik"
                                                    name="nik" value="{{ old('nik', $editData->nik) }}"
                                                    maxlength="16" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="no_kk" class="form-label fw-bold">No. KK</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-primary text-white">
                                                    <i class="fas fa-house-user"></i>
                                                </span>
                                                <input type="text" class="form-control" id="no_kk"
                                                    name="no_kk" value="{{ old('no_kk', $editData->no_kk) }}"
                                                    maxlength="16" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="jenis_kelamin" class="form-label fw-bold">Jenis
                                                Kelamin</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-primary text-white">
                                                    <i class="fas fa-venus-mars"></i>
                                                </span>
                                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin"
                                                    required>
                                                    <option value="">Pilih Jenis Kelamin</option>
                                                    <option value="Laki-laki"
                                                        {{ old('jenis_kelamin', $editData->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                                                        Laki-laki</option>
                                                    <option value="Perempuan"
                                                        {{ old('jenis_kelamin', $editData->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                                        Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <label for="alamat" class="form-label fw-bold">Alamat</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-primary text-white align-items-start">
                                                    <i class="fas fa-map-marker-alt mt-2"></i>
                                                </span>
                                                <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ old('alamat', $editData->alamat) }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit"
                                                class="btn-hover-bg btn btn-primary text-white py-2 px-4">
                                                <i class="fas fa-save me-2"></i>Update Data
                                            </button>
                                            <a href="{{ route('warga.index') }}"
                                                class="btn-hover-bg btn btn-secondary text-white py-2 px-4">
                                                <i class="fas fa-times me-2"></i>Batal
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Card Utama -->
            <div class="card border-0 shadow">
                <div class="card-header bg-primary text-white py-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0"><i class="fas fa-users me-2"></i>Daftar Warga</h4>
                        <a href="{{ route('warga.create') }}"
                            class="btn-hover-bg btn btn-light text-primary py-2 px-4">
                            <i class="fas fa-plus me-2"></i>Tambah Warga
                        </a>
                    </div>
                </div>
                <div class="card-body p-4">
                    @if($dataWarga->count() > 0)
                        <div class="row">
                            @foreach($dataWarga as $item)
                            <div class="col-lg-6 col-xl-4 mb-4">
                                <div class="card border-light shadow-sm h-100 card-hover">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-4">
                                            <div class="user-avatar bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-1 fw-bold">{{ $item->nama }}</h6>
                                                <span class="badge {{ $item->jenis_kelamin == 'Laki-laki' ? 'bg-primary' : 'bg-pink' }} badge-custom">
                                                    {{ $item->jenis_kelamin }}
                                                </span>
                                            </div>
                                        </div>

                                        <div class="data-grid">
                                            <div class="data-item">
                                                <i class="fas fa-fingerprint text-primary me-2"></i>
                                                <div>
                                                    <small class="text-muted">NIK</small>
                                                    <div class="fw-semibold">{{ $item->nik }}</div>
                                                </div>
                                            </div>

                                            <div class="data-item">
                                                <i class="fas fa-home text-success me-2"></i>
                                                <div>
                                                    <small class="text-muted">No. KK</small>
                                                    <div class="fw-semibold">{{ $item->no_kk }}</div>
                                                </div>
                                            </div>

                                            <div class="data-item">
                                                <i class="fas fa-map-marker-alt text-warning me-2"></i>
                                                <div>
                                                    <small class="text-muted">Alamat</small>
                                                    <div class="fw-semibold small">{{ Str::limit($item->alamat, 60) }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent border-top">
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('warga.edit', $item->warga_id) }}"
                                               class="btn btn-soft-primary btn-sm flex-fw">
                                                <i class="fas fa-edit me-1"></i>Edit
                                            </a>
                                            <form action="{{ route('warga.destroy', $item->warga_id) }}" method="POST" class="flex-fw">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-soft-danger btn-sm w-100"
                                                    onclick="return confirm('Yakin hapus data warga?')">
                                                    <i class="fas fa-trash me-1"></i>Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-5">
                            <div class="empty-state mb-4">
                                <i class="fas fa-user-friends fa-4x text-light mb-3"></i>
                            </div>
                            <h5 class="text-muted mb-2">Data Warga Kosong</h5>
                            <p class="text-muted mb-4">Mulai tambahkan data warga pertama Anda</p>
                            <a href="{{ route('warga.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>Tambah Warga Pertama
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Content End -->
    {{-- end main content --}}

    <style>
    .card-hover {
        transition: all 0.3s ease;
        border-radius: 12px;
    }

    .card-hover:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 20px rgba(0,0,0,0.1) !important;
    }

    .user-avatar {
        width: 45px;
        height: 45px;
        font-size: 1.1rem;
    }

    .badge-custom {
        font-size: 0.7rem;
        padding: 0.35em 0.65em;
    }

    .bg-pink {
        background-color: #e83e8c !important;
    }

    .data-grid {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .data-item {
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
    }

    .data-item i {
        margin-top: 0.25rem;
        flex-shrink: 0;
    }

    .btn-soft-primary {
        background-color: rgba(0, 123, 255, 0.1);
        color: #007bff;
        border: 1px solid rgba(0, 123, 255, 0.2);
    }

    .btn-soft-primary:hover {
        background-color: #007bff;
        color: white;
    }

    .btn-soft-danger {
        background-color: rgba(220, 53, 69, 0.1);
        color: #dc3545;
        border: 1px solid rgba(220, 53, 69, 0.2);
    }

    .btn-soft-danger:hover {
        background-color: #dc3545;
        color: white;
    }

    .empty-state {
        opacity: 0.3;
    }

    .flex-fw {
        flex: 1;
        min-width: 0;
    }
    </style>
@endsection
