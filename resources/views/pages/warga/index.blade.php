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

            <!-- Form Edit -->
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
                                            <label class="form-label-modern">Nama Lengkap</label>
                                            <div class="input-group-modern">
                                                <span class="input-icon"><i class="fas fa-user"></i></span>
                                                <input type="text" name="nama" class="form-control-modern"
                                                    value="{{ old('nama', $editData->nama) }}" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label-modern">NIK</label>
                                            <div class="input-group-modern">
                                                <span class="input-icon"><i class="fas fa-id-card"></i></span>
                                                <input type="text" name="nik" maxlength="16" class="form-control-modern"
                                                    value="{{ old('nik', $editData->nik) }}" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label-modern">No. KK</label>
                                            <div class="input-group-modern">
                                                <span class="input-icon"><i class="fas fa-house-user"></i></span>
                                                <input type="text" name="no_kk" maxlength="16" class="form-control-modern"
                                                    value="{{ old('no_kk', $editData->no_kk) }}" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label-modern">Jenis Kelamin</label>
                                            <div class="input-group-modern">
                                                <span class="input-icon"><i class="fas fa-venus-mars"></i></span>
                                                <select name="jenis_kelamin" class="form-control-modern" required>
                                                    <option value="">Pilih</option>
                                                    <option value="Laki-laki" {{ old('jenis_kelamin', $editData->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                                    <option value="Perempuan" {{ old('jenis_kelamin', $editData->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label-modern">Alamat Lengkap</label>
                                            <textarea name="alamat" rows="4" class="form-control-modern" required>{{ old('alamat', $editData->alamat) }}</textarea>
                                        </div>

                                        <div class="col-12 d-flex gap-3">
                                            <button class="btn-modern btn-primary-modern"><i class="fas fa-save me-2"></i>Update</button>
                                            <a href="{{ route('warga.index') }}" class="btn-modern btn-secondary-modern">
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

            <!-- Action Bar -->
            <div class="action-bar mb-4">
                <div class="action-left">
                    <h4 class="fw-bold text-dark">
                        <i class="fas fa-users me-2 text-primary"></i>Daftar Warga Desa
                    </h4>
                    <p class="text-muted">Total {{ $dataWarga->total() }} warga terdaftar</p>
                </div>
                <div class="action-right">
                    <a href="{{ route('warga.create') }}" class="btn-modern btn-primary-modern">
                        <i class="fas fa-plus me-2"></i>Tambah Warga Baru
                    </a>
                </div>
            </div>

            <!-- 🔍 Search + Filter + Sort -->
           <form action="{{ route('warga.index') }}" method="GET" class="mb-4">
    <div class="row g-3">

        <div class="col-md-4">
            <label class="form-label-modern">Cari Nama / NIK</label>
            <input type="text" name="search" class="form-control-modern"
                value="{{ request('search') }}" placeholder="Cari warga...">
        </div>

        <div class="col-md-3">
            <label class="form-label-modern">Filter Jenis Kelamin</label>
            <select name="gender" class="form-control-modern">
                <option value="">Semua</option>
                <option value="Laki-laki" {{ request('gender') == 'Laki-laki' ? 'selected' : '' }}>
                    Laki-laki
                </option>
                <option value="Perempuan" {{ request('gender') == 'Perempuan' ? 'selected' : '' }}>
                    Perempuan
                </option>
            </select>
        </div>

        <div class="col-md-3">
            <label class="form-label-modern">Urutkan</label>
            <select name="sort" class="form-control-modern">
                <option value="">Default</option>
                <option value="nama_asc" {{ request('sort') == 'nama_asc' ? 'selected' : '' }}>Nama A-Z</option>
                <option value="nama_desc" {{ request('sort') == 'nama_desc' ? 'selected' : '' }}>Nama Z-A</option>
                <option value="nik_asc" {{ request('sort') == 'nik_asc' ? 'selected' : '' }}>NIK Kecil-Besar</option>
                <option value="nik_desc" {{ request('sort') == 'nik_desc' ? 'selected' : '' }}>NIK Besar-Kecil</option>
            </select>
        </div>

        <div class="col-md-2 d-flex align-items-end">
            <button class="btn-modern btn-primary-modern w-100">
                <i class="fas fa-search me-2"></i> Cari
            </button>
        </div>

    </div>
</form>

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
                                            <i class="fas {{ $item->jenis_kelamin == 'Laki-laki' ? 'fa-mars' : 'fa-venus' }}"></i>
                                            {{ $item->jenis_kelamin }}
                                        </span>
                                    </div>
                                </div>

                                <div class="card-warga-body">

                                    <div class="info-item">
                                        <div class="info-icon bg-primary"><i class="fas fa-fingerprint"></i></div>
                                        <div class="info-content">
                                            <span class="info-label">NIK</span>
                                            <span class="info-value">{{ $item->nik }}</span>
                                        </div>
                                    </div>

                                    <div class="info-item">
                                        <div class="info-icon bg-success"><i class="fas fa-home"></i></div>
                                        <div class="info-content">
                                            <span class="info-label">No. KK</span>
                                            <span class="info-value">{{ $item->no_kk }}</span>
                                        </div>
                                    </div>

                                    <div class="info-item">
                                        <div class="info-icon bg-warning"><i class="fas fa-map-marker-alt"></i></div>
                                        <div class="info-content">
                                            <span class="info-label">Alamat</span>
                                            <span class="info-value">{{ Str::limit($item->alamat, 80) }}</span>
                                        </div>
                                    </div>

                                </div>

                                <div class="card-warga-footer">
                                    <a href="{{ route('warga.edit', $item->warga_id) }}" class="btn-action btn-action-edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    <form action="{{ route('warga.destroy', $item->warga_id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-action btn-action-delete"
                                            onclick="return confirm('Hapus data ini?')">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- PAGINATION -->
                <div class="mt-4">
                    {{ $dataWarga->links('pagination::bootstrap-5') }}
                </div>

            @else
                <div class="empty-state-modern">
                    <div class="empty-icon"><i class="fas fa-user-friends"></i></div>
                    <h4>Belum Ada Data Warga</h4>
                    <p>Tambahkan data warga pertama Anda</p>
                    <a href="{{ route('warga.create') }}" class="btn-modern btn-primary-modern">
                        <i class="fas fa-plus me-2"></i>Tambah Warga Pertama
                    </a>
                </div>
            @endif

        </div>
    </div>
@endsection
