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
                    <i class="fas fa-tag"></i>
                </div>
                <h5 class="text-primary fw-bold text-uppercase mb-2">Tambah Kategori Berita</h5>
                <h1 class="display-4 fw-bold mb-3">Tambah Kategori Baru</h1>
                <p class="text-muted fs-5 mb-0">Tambahkan kategori berita baru ke dalam sistem</p>
            </div>
            <!-- Page Header End -->

            <!-- Action Bar -->
            <div class="action-bar mb-4">
                <div class="action-left">
                    <h4 class="mb-0 fw-bold text-dark">
                        <i class="fas fa-tag me-2 text-primary"></i>
                        Form Tambah Kategori
                    </h4>
                    <p class="text-muted mb-0 mt-1">Isi form berikut untuk menambahkan kategori berita baru</p>
                </div>
                <div class="action-right">
                    <a href="{{ route('kategori_berita.index') }}" class="btn-modern btn-secondary-modern">
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
                                <i class="fas fa-plus"></i>
                                <h5>Form Tambah Kategori Berita</h5>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <form action="{{ route('kategori_berita.store') }}" method="POST">
                                @csrf
                                <div class="row g-4">
                                    <!-- NAMA KATEGORI -->
                                    <div class="col-12">
                                        <label for="nama" class="form-label-modern">Nama Kategori <span class="text-danger">*</span></label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-tag"></i>
                                            </span>
                                            <input type="text" class="form-control-modern @error('nama') is-invalid @enderror"
                                                id="nama" name="nama" value="{{ old('nama') }}"
                                                placeholder="Masukkan nama kategori" required>
                                        </div>
                                        @error('nama')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- DESKRIPSI -->
                                    <div class="col-12">
                                        <label for="deskripsi" class="form-label-modern">Deskripsi</label>
                                        <div class="input-group-modern">
                                            <span class="input-icon textarea-icon">
                                                <i class="fas fa-align-left"></i>
                                            </span>
                                            <textarea class="form-control-modern @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4"
                                                placeholder="Masukkan deskripsi kategori">{{ old('deskripsi') }}</textarea>
                                        </div>
                                        @error('deskripsi')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- TOMBOL ACTION -->
                                    <div class="col-12 mt-4">
                                        <div class="d-flex gap-3 justify-content-end">
                                            <button type="submit" class="btn-modern btn-primary-modern">
                                                <i class="fas fa-save me-2"></i>Simpan Kategori
                                            </button>
                                            <a href="{{ route('kategori_berita.index') }}" class="btn-modern btn-secondary-modern">
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
