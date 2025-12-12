@extends('layouts.guest.app')

@section('content')
    {{-- start main content --}}
    <div class="container-fluid content-section">
        <div class="container py-5">

            <!-- Page Header Start -->
            <div class="page-header-modern text-center mb-5">
                <div class="header-icon">
                    <i class="fas fa-home"></i>
                </div>
                <h5 class="text-primary fw-bold text-uppercase mb-2">Manajemen Profil Desa</h5>
                <h1 class="display-4 fw-bold mb-3">Kelola Profil Desa</h1>
                <p class="text-muted fs-5 mb-0">Kelola semua profil desa dalam satu tempat dengan mudah dan efisien</p>
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

            <!-- Action Bar -->
            <div class="action-bar mb-4">
                <div class="action-left">
                    <h4 class="mb-0 fw-bold text-dark">
                        <i class="fas fa-home me-2 text-primary"></i>
                        Daftar Profil Desa
                    </h4>
                    <p class="text-muted mb-0 mt-1">Total {{ $profils->total() }} profil desa terdaftar</p>
                </div>
                <div class="action-right">
                    <a href="{{ route('profil.create') }}" class="btn-modern btn-primary-modern">
                        <i class="fas fa-plus me-2"></i>Tambah Profil Baru
                    </a>
                </div>
            </div>

            <!-- Search Modern -->
            <form method="GET" action="{{ route('profil.index') }}" class="mb-4">
                <div class="row g-3">

                    <!-- Input Search -->
                    <div class="col-md-4">
                        <label class="form-label-modern">Cari Profil</label>
                        <div class="input-group-modern">
                            <span class="input-icon"><i class="fas fa-search"></i></span>
                            <input type="text" name="search" class="form-control-modern"
                                placeholder="Cari nama desa, kecamatan, kabupaten..." value="{{ request('search') }}">
                        </div>
                    </div>

                    <!-- Filter Provinsi -->
                    <div class="col-md-3">
                        <label class="form-label-modern">Provinsi</label>
                        <select name="provinsi" class="form-control-modern">
                            <option value="">Semua Provinsi</option>
                            @foreach ($distinctProvinsi as $prov)
                                <option value="{{ $prov->provinsi }}"
                                    {{ request('provinsi') == $prov->provinsi ? 'selected' : '' }}>
                                    {{ $prov->provinsi }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Filter Kabupaten -->
                    <div class="col-md-3">
                        <label class="form-label-modern">Kabupaten</label>
                        <select name="kabupaten" class="form-control-modern">
                            <option value="">Semua Kabupaten</option>
                            @foreach ($distinctKabupaten as $kab)
                                <option value="{{ $kab->kabupaten }}"
                                    {{ request('kabupaten') == $kab->kabupaten ? 'selected' : '' }}>
                                    {{ $kab->kabupaten }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tombol Cari -->
                    <div class="col-md-2 d-flex align-items-end">
                        <button class="btn-modern btn-primary-modern w-100">
                            <i class="fas fa-search me-2"></i>Cari
                        </button>
                    </div>

                    <!-- Tombol Clear (muncul jika filter aktif) -->
                    @if (request('search') || request('provinsi') || request('kabupaten'))
                        <div class="col-md-2 d-flex align-items-end mt-3 mt-md-0">
                            <a href="{{ route('profil.index') }}" class="btn-modern btn-secondary-modern w-100">
                                <i class="fas fa-times me-2"></i>Clear
                            </a>
                        </div>
                    @endif

                </div>
            </form>

            <!-- Card Grid -->
            @if ($profils->count() > 0)
                <div class="row g-4">
                    @foreach ($profils as $profil)
                        <div class="col-lg-6 col-xl-4">
                            <div class="card-warga">

                                <!-- HEADER DENGAN FOTO -->
                                <div class="card-warga-header">
                                    <img src="{{ asset($profil->logo) }}"
                                        style="width: 70px; height: 70px; object-fit: cover; border-radius: 50%;"
                                        alt="{{ $profil->nama_desa }}">


                                    <div class="user-info">
                                        <h6 class="user-name">{{ $profil->nama_desa }}</h6>
                                        <!-- Badge kecamatan -->
                                        <span class="badge-gender badge-male">
                                            <i class="fas fa-map-marker-alt me-1"></i>
                                            {{ $profil->kecamatan }}
                                        </span>
                                    </div>
                                </div>


                                <!-- BODY - SAMA LAYOUT DENGAN USER.INDEX -->
                                <div class="card-warga-body">
                                    <!-- Kabupaten -->
                                    <div class="info-item">
                                        <div class="info-icon bg-primary">
                                            <i class="fas fa-city"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Kabupaten</span>
                                            <span class="info-value">{{ $profil->kabupaten }}</span>
                                        </div>
                                    </div>

                                    <!-- Provinsi -->
                                    <div class="info-item">
                                        <div class="info-icon bg-success">
                                            <i class="fas fa-globe-asia"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Provinsi</span>
                                            <span class="info-value">{{ $profil->provinsi }}</span>
                                        </div>
                                    </div>

                                    <!-- Telepon -->
                                    <div class="info-item">
                                        <div class="info-icon bg-warning">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Telepon</span>
                                            <span class="info-value">{{ $profil->telepon ?: '-' }}</span>
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="info-item">
                                        <div class="info-icon bg-info">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Email</span>
                                            <span class="info-value">{{ $profil->email ?: '-' }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- FOOTER - SAMA PERSIS DENGAN USER.INDEX -->
                                <div class="card-warga-footer">
                                    <a href="{{ route('profil.show', $profil->profil_id) }}"
                                        class="btn-action btn-action-view">
                                        <i class="fas fa-eye"></i>
                                        <span>Detail</span>
                                    </a>
                                    <a href="{{ route('profil.edit', $profil->profil_id) }}"
                                        class="btn-action btn-action-edit">
                                        <i class="fas fa-edit"></i>
                                        <span>Edit</span>
                                    </a>
                                    <form action="{{ route('profil.destroy', $profil->profil_id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-action-delete"
                                            onclick="return confirm('Hapus profil desa ini?')">
                                            <i class="fas fa-trash"></i>
                                            <span>Hapus</span>
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $profils->links('pagination::bootstrap-5') }}
                </div>
            @else
                <!-- Empty State - SAMA PERSIS DENGAN USER.INDEX -->
                <div class="empty-state-modern">
                    <div class="empty-icon"><i class="fas fa-home"></i></div>
                    <h4 class="empty-title">Belum Ada Data Profil Desa</h4>
                    <p class="empty-text">Mulai tambahkan profil desa pertama Anda untuk mengelola informasi desa</p>
                    <a href="{{ route('profil.create') }}" class="btn-modern btn-primary-modern">
                        <i class="fas fa-plus me-2"></i>Tambah Profil Pertama
                    </a>
                </div>
            @endif

        </div>
    </div>
@endsection
