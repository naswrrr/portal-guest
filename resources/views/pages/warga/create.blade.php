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
                            <form action="{{ route('warga.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row g-4">

                                    <!-- NAMA -->
                                    <div class="col-12">
                                        <label class="form-label-modern">Nama Lengkap <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group-modern">
                                            <span class="input-icon"><i class="fas fa-user"></i></span>
                                            <input type="text" name="nama" class="form-control-modern"
                                                value="{{ old('nama') }}" placeholder="Masukkan nama lengkap" required>
                                        </div>
                                    </div>

                                    <!-- NO KTP -->
                                    <div class="col-md-6">
                                        <label class="form-label-modern">No. KTP <span class="text-danger">*</span></label>
                                        <div class="input-group-modern">
                                            <span class="input-icon"><i class="fas fa-id-card"></i></span>
                                            <input type="text" name="no_ktp" class="form-control-modern"
                                                value="{{ old('no_ktp') }}" maxlength="16" required>
                                        </div>
                                    </div>

                                    <!-- JENIS KELAMIN -->
                                    <div class="col-md-6">
                                        <label class="form-label-modern">Jenis Kelamin <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group-modern">
                                            <span class="input-icon"><i class="fas fa-venus-mars"></i></span>
                                            <select name="jenis_kelamin" class="form-control-modern" required>
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- AGAMA -->
                                    <div class="col-md-6">
                                        <label class="form-label-modern">Agama <span class="text-danger">*</span></label>
                                        <div class="input-group-modern">
                                            <span class="input-icon"><i class="fas fa-pray"></i></span>
                                            <input type="text" name="agama" class="form-control-modern"
                                                value="{{ old('agama') }}" required>
                                        </div>
                                    </div>

                                    <!-- PEKERJAAN -->
                                    <div class="col-md-6">
                                        <label class="form-label-modern">Pekerjaan <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group-modern">
                                            <span class="input-icon"><i class="fas fa-briefcase"></i></span>
                                            <input type="text" name="pekerjaan" class="form-control-modern"
                                                value="{{ old('pekerjaan') }}" required>
                                        </div>
                                    </div>

                                    <!-- TELP -->
                                    <div class="col-md-6">
                                        <label class="form-label-modern">Telepon</label>
                                        <div class="input-group-modern">
                                            <span class="input-icon"><i class="fas fa-phone"></i></span>
                                            <input type="text" name="telp" class="form-control-modern"
                                                value="{{ old('telp') }}">
                                        </div>
                                    </div>

                                    <!-- EMAIL -->
                                    <div class="col-md-6">
                                        <label class="form-label-modern">Email</label>
                                        <div class="input-group-modern">
                                            <span class="input-icon"><i class="fas fa-envelope"></i></span>
                                            <input type="email" name="email" class="form-control-modern"
                                                value="{{ old('email') }}">
                                        </div>
                                    </div>

                                    <!-- FOTO MULTIPLE -->
                                    <div class="col-12">
                                        <label class="form-label-modern">Foto Warga (multiple)</label>
                                        <input type="file" name="foto" class="form-control-modern" multiple>
                                        <small class="text-muted">* Opsional, bisa lebih dari 1 foto</small>
                                    </div>

                                    <!-- BUTTON -->
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

@endsection
