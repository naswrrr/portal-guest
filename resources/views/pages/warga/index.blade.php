@extends('layouts.guest.app')

@section('content')
    {{-- start main content --}}
    <!-- Navbar start -->
    @include('layouts.guest.navbar', ['activePage' => 'warga'])
    <!-- Navbar End -->

    <!-- Content Start -->
    <div class="container-fluid content-section">
        <div class="container py-5">

            <!-- Page Header Start -->
            <div class="page-header-modern text-center mb-5">
                <div class="header-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h5 class="text-primary fw-bold text-uppercase mb-2">Data Warga</h5>
                <h1 class="display-4 fw-bold mb-3">Kelola Data Warga Desa</h1>
                <p class="text-muted fs-5 mb-0">Kelola informasi data warga desa dengan mudah dan efisien</p>
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
                                    <h5>Edit Data Warga</h5>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <form action="{{ route('warga.update', $editData->warga_id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row g-4">
                                        <div class="col-12">
                                            <label for="nama" class="form-label-modern">Nama Lengkap</label>
                                            <div class="input-group-modern">
                                                <span class="input-icon">
                                                    <i class="fas fa-user"></i>
                                                </span>
                                                <input type="text" class="form-control-modern" id="nama" name="nama"
                                                    value="{{ old('nama', $editData->nama) }}" placeholder="Masukkan nama lengkap" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="nik" class="form-label-modern">NIK</label>
                                            <div class="input-group-modern">
                                                <span class="input-icon">
                                                    <i class="fas fa-id-card"></i>
                                                </span>
                                                <input type="text" class="form-control-modern" id="nik" name="nik"
                                                    value="{{ old('nik', $editData->nik) }}" placeholder="16 digit NIK" maxlength="16" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="no_kk" class="form-label-modern">No. Kartu Keluarga</label>
                                            <div class="input-group-modern">
                                                <span class="input-icon">
                                                    <i class="fas fa-house-user"></i>
                                                </span>
                                                <input type="text" class="form-control-modern" id="no_kk" name="no_kk"
                                                    value="{{ old('no_kk', $editData->no_kk) }}" placeholder="16 digit No. KK" maxlength="16" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="jenis_kelamin" class="form-label-modern">Jenis Kelamin</label>
                                            <div class="input-group-modern">
                                                <span class="input-icon">
                                                    <i class="fas fa-venus-mars"></i>
                                                </span>
                                                <select class="form-control-modern" id="jenis_kelamin" name="jenis_kelamin" required>
                                                    <option value="">Pilih Jenis Kelamin</option>
                                                    <option value="Laki-laki" {{ old('jenis_kelamin', $editData->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                                                        Laki-laki</option>
                                                    <option value="Perempuan" {{ old('jenis_kelamin', $editData->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                                        Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="alamat" class="form-label-modern">Alamat Lengkap</label>
                                            <div class="input-group-modern">
                                                <span class="input-icon textarea-icon">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </span>
                                                <textarea class="form-control-modern" id="alamat" name="alamat" rows="4" placeholder="Masukkan alamat lengkap" required>{{ old('alamat', $editData->alamat) }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-flex gap-3">
                                                <button type="submit" class="btn-modern btn-primary-modern">
                                                    <i class="fas fa-save me-2"></i>Update Data
                                                </button>
                                                <a href="{{ route('warga.index') }}" class="btn-modern btn-secondary-modern">
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
                        <i class="fas fa-users me-2 text-primary"></i>
                        Daftar Warga Desa
                    </h4>
                    <p class="text-muted mb-0 mt-1">Total {{ $dataWarga->count() }} warga terdaftar</p>
                </div>
                <div class="action-right">
                    <a href="{{ route('warga.create') }}" class="btn-modern btn-primary-modern">
                        <i class="fas fa-plus me-2"></i>Tambah Warga Baru
                    </a>
                </div>
            </div>

            <!-- Card Grid -->
            @if ($dataWarga->count() > 0)
                <div class="row g-4">
                    @foreach ($dataWarga as $item)
                        <div class="col-lg-6 col-xl-4">
                            <div class="card-warga">
                                <div class="card-warga-header">
                                    <div class="user-avatar-modern">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="user-info">
                                        <h6 class="user-name">{{ $item->nama }}</h6>
                                        <span class="badge-gender {{ $item->jenis_kelamin == 'Laki-laki' ? 'badge-male' : 'badge-female' }}">
                                            <i class="fas {{ $item->jenis_kelamin == 'Laki-laki' ? 'fa-mars' : 'fa-venus' }} me-1"></i>
                                            {{ $item->jenis_kelamin }}
                                        </span>
                                    </div>
                                </div>

                                <div class="card-warga-body">
                                    <div class="info-item">
                                        <div class="info-icon bg-primary">
                                            <i class="fas fa-fingerprint"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">NIK</span>
                                            <span class="info-value">{{ $item->nik }}</span>
                                        </div>
                                    </div>

                                    <div class="info-item">
                                        <div class="info-icon bg-success">
                                            <i class="fas fa-home"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">No. Kartu Keluarga</span>
                                            <span class="info-value">{{ $item->no_kk }}</span>
                                        </div>
                                    </div>

                                    <div class="info-item">
                                        <div class="info-icon bg-warning">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Alamat</span>
                                            <span class="info-value">{{ Str::limit($item->alamat, 80) }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-warga-footer">
                                    <a href="{{ route('warga.edit', $item->warga_id) }}" class="btn-action btn-action-edit">
                                        <i class="fas fa-edit"></i>
                                        <span>Edit</span>
                                    </a>
                                    <form action="{{ route('warga.destroy', $item->warga_id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-action-delete"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data warga ini?')">
                                            <i class="fas fa-trash"></i>
                                            <span>Hapus</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state-modern">
                    <div class="empty-icon">
                        <i class="fas fa-user-friends"></i>
                    </div>
                    <h4 class="empty-title">Belum Ada Data Warga</h4>
                    <p class="empty-text">Mulai tambahkan data warga pertama Anda untuk mengelola informasi warga desa</p>
                    <a href="{{ route('warga.create') }}" class="btn-modern btn-primary-modern">
                        <i class="fas fa-plus me-2"></i>Tambah Warga Pertama
                    </a>
                </div>
            @endif
        </div>
    </div>
    <!-- Content End -->
    {{-- end main content --}}
@endsection

