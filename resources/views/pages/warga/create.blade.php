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
                    <i class="fas fa-user-plus"></i>
                </div>
                <h5 class="text-primary fw-bold text-uppercase mb-2">Tambah Data Warga</h5>
                <h1 class="display-4 fw-bold mb-3">Tambah Warga Baru</h1>
                <p class="text-muted fs-5 mb-0">Tambahkan data warga baru ke dalam sistem</p>
            </div>
            <!-- Page Header End -->

            <!-- Action Bar -->
            <div class="action-bar mb-4">
                <div class="action-left">
                    <h4 class="mb-0 fw-bold text-dark">
                        <i class="fas fa-user-plus me-2 text-primary"></i>
                        Form Tambah Warga
                    </h4>
                    <p class="text-muted mb-0 mt-1">Isi form berikut untuk menambahkan data warga baru</p>
                </div>
                <div class="action-right">
                    <a href="{{ route('warga.index') }}" class="btn-modern btn-secondary-modern">
                        <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar
                    </a>
                </div>
            </div>

            <!-- Notifikasi Error -->
            @if ($errors->any())
                <div class="alert alert-modern alert-danger alert-dismissible fade show mb-4" role="alert">
                    <div class="alert-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="alert-content">
                        <strong>Terjadi Kesalahan!</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Card Create -->
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card-modern card-create">
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-user-plus"></i>
                                <h5>Form Tambah Data Warga</h5>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <form action="{{ route('warga.store') }}" method="POST">
                                @csrf
                                <div class="row g-4">
                                    <!-- NAMA LENGKAP -->
                                    <div class="col-12">
                                        <label for="nama" class="form-label-modern">Nama Lengkap <span class="text-danger">*</span></label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-user"></i>
                                            </span>
                                            <input type="text" class="form-control-modern @error('nama') is-invalid @enderror"
                                                id="nama" name="nama" value="{{ old('nama') }}"
                                                placeholder="Masukkan nama lengkap" required>
                                        </div>
                                        @error('nama')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- NIK -->
                                    <div class="col-md-6">
                                        <label for="nik" class="form-label-modern">NIK <span class="text-danger">*</span></label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-id-card"></i>
                                            </span>
                                            <input type="text" class="form-control-modern @error('nik') is-invalid @enderror"
                                                id="nik" name="nik" value="{{ old('nik') }}"
                                                placeholder="16 digit NIK" maxlength="16" required>
                                        </div>
                                        @error('nik')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                        <small class="text-muted">* Harus 16 digit dan unik</small>
                                    </div>

                                    <!-- NO KK -->
                                    <div class="col-md-6">
                                        <label for="no_kk" class="form-label-modern">No. Kartu Keluarga <span class="text-danger">*</span></label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-house-user"></i>
                                            </span>
                                            <input type="text" class="form-control-modern @error('no_kk') is-invalid @enderror"
                                                id="no_kk" name="no_kk" value="{{ old('no_kk') }}"
                                                placeholder="16 digit No. KK" maxlength="16" required>
                                        </div>
                                        @error('no_kk')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                        <small class="text-muted">* Harus 16 digit</small>
                                    </div>

                                    <!-- JENIS KELAMIN -->
                                    <div class="col-md-6">
                                        <label for="jenis_kelamin" class="form-label-modern">Jenis Kelamin <span class="text-danger">*</span></label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-venus-mars"></i>
                                            </span>
                                            <select class="form-control-modern @error('jenis_kelamin') is-invalid @enderror"
                                                id="jenis_kelamin" name="jenis_kelamin" required>
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                                                    Laki-laki</option>
                                                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                                    Perempuan</option>
                                            </select>
                                        </div>
                                        @error('jenis_kelamin')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- TEMPAT LAHIR -->
                                    <div class="col-md-6">
                                        <label for="tempat_lahir" class="form-label-modern">Tempat Lahir</label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </span>
                                            <input type="text" class="form-control-modern" id="tempat_lahir" name="tempat_lahir"
                                                value="{{ old('tempat_lahir') }}"
                                                placeholder="Masukkan tempat lahir">
                                        </div>
                                    </div>

                                    <!-- ALAMAT -->
                                    <div class="col-12">
                                        <label for="alamat" class="form-label-modern">Alamat Lengkap <span class="text-danger">*</span></label>
                                        <div class="input-group-modern">
                                            <span class="input-icon textarea-icon">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </span>
                                            <textarea class="form-control-modern @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="4"
                                                placeholder="Masukkan alamat lengkap" required>{{ old('alamat') }}</textarea>
                                        </div>
                                        @error('alamat')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- TOMBOL ACTION -->
                                    <div class="col-12 mt-4">
                                        <div class="d-flex gap-3 justify-content-end">
                                            <button type="submit" class="btn-modern btn-primary-modern">
                                                <i class="fas fa-save me-2"></i>Simpan Data
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
        </div>
    </div>
    <!-- Content End -->
    {{-- end main content --}}
@endsection
