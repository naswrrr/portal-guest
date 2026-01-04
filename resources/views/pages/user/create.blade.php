{{-- Menggunakan layout utama halaman guest --}}
@extends('layouts.guest.app')

{{-- Section konten utama --}}
@section('content')

    {{-- ===================== NAVBAR ===================== --}}
    {{-- Memanggil navbar halaman guest --}}
    @include('layouts.guest.navbar')
    {{-- =================== END NAVBAR =================== --}}

    {{-- ===================== CONTENT ===================== --}}
    <div class="container-fluid content-section">
        <div class="container py-5">

            {{-- ===================== PAGE HEADER ===================== --}}
            {{-- Header halaman tambah user --}}
            <div class="page-header-modern text-center mb-5">
                <div class="header-icon">
                    {{-- Icon header --}}
                    <i class="fas fa-user-plus"></i>
                </div>
                {{-- Sub judul --}}
                <h5 class="text-primary fw-bold text-uppercase mb-2">Tambah User</h5>
                {{-- Judul utama --}}
                <h1 class="display-4 fw-bold mb-3">Tambah User Baru</h1>
                {{-- Deskripsi halaman --}}
                <p class="text-muted fs-5 mb-0">
                    Tambahkan user baru untuk mengakses sistem portal desa
                </p>
            </div>
            {{-- =================== END PAGE HEADER =================== --}}

            {{-- ===================== ACTION BAR ===================== --}}
            {{-- Bar judul form dan tombol kembali --}}
            <div class="action-bar mb-4">
                <div class="action-left">
                    <h4 class="mb-0 fw-bold text-dark">
                        <i class="fas fa-user-plus me-2 text-primary"></i>
                        Form Tambah User
                    </h4>
                    <p class="text-muted mb-0 mt-1">
                        Isi form berikut untuk menambahkan user baru
                    </p>
                </div>
                <div class="action-right">
                    {{-- Tombol kembali ke halaman daftar user --}}
                    <a href="{{ route('users.index') }}"
                       class="btn-modern btn-secondary-modern">
                        <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar
                    </a>
                </div>
            </div>
            {{-- =================== END ACTION BAR =================== --}}

            {{-- ===================== ERROR VALIDATION ===================== --}}
            {{-- Menampilkan pesan error validasi jika ada --}}
            @if ($errors->any())
                <div class="alert alert-modern alert-danger alert-dismissible fade show mb-4" role="alert">
                    <div class="alert-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="alert-content">
                        <strong>Terjadi Kesalahan!</strong>
                        {{-- Daftar pesan error --}}
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    {{-- Tombol menutup alert --}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            {{-- =================== END ERROR =================== --}}

            {{-- ===================== CARD FORM CREATE ===================== --}}
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card-modern card-create">

                        {{-- Header card --}}
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-plus"></i>
                                <h5>Form Tambah Data User</h5>
                            </div>
                        </div>

                        {{-- Body card --}}
                        <div class="card-body p-4">
                            {{-- Form untuk menyimpan data user --}}
                            <form action="{{ route('users.store') }}"
                                  method="POST"
                                  enctype="multipart/form-data">

                                {{-- Token keamanan --}}
                                @csrf

                                <div class="row g-4">

                                    {{-- ================= NAMA USER ================= --}}
                                    <div class="col-12">
                                        <label class="form-label-modern">
                                            Nama User <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-user"></i>
                                            </span>
                                            {{-- Input nama user --}}
                                            <input type="text"
                                                   name="name"
                                                   class="form-control-modern @error('name') is-invalid @enderror"
                                                   value="{{ old('name') }}"
                                                   placeholder="Masukkan nama user"
                                                   required>
                                        </div>
                                        {{-- Pesan error nama --}}
                                        @error('name')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- ================= EMAIL ================= --}}
                                    <div class="col-md-6">
                                        <label class="form-label-modern">
                                            Email <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-envelope"></i>
                                            </span>
                                            {{-- Input email --}}
                                            <input type="email"
                                                   name="email"
                                                   class="form-control-modern @error('email') is-invalid @enderror"
                                                   value="{{ old('email') }}"
                                                   placeholder="Masukkan email"
                                                   required>
                                        </div>
                                        {{-- Pesan error email --}}
                                        @error('email')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- ================= PASSWORD ================= --}}
                                    <div class="col-md-6">
                                        <label class="form-label-modern">
                                            Password <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-lock"></i>
                                            </span>
                                            {{-- Input password --}}
                                            <input type="password"
                                                   name="password"
                                                   class="form-control-modern @error('password') is-invalid @enderror"
                                                   placeholder="Masukkan password"
                                                   required>
                                        </div>
                                        {{-- Pesan error password --}}
                                        @error('password')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- ================= KONFIRMASI PASSWORD ================= --}}
                                    <div class="col-12">
                                        <label class="form-label-modern">
                                            Konfirmasi Password <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-lock"></i>
                                            </span>
                                            {{-- Input konfirmasi password --}}
                                            <input type="password"
                                                   name="password_confirmation"
                                                   class="form-control-modern"
                                                   placeholder="Masukkan konfirmasi password"
                                                   required>
                                        </div>
                                    </div>

                                    {{-- ================= FOTO USER ================= --}}
                                    <div class="col-12">
                                        <label class="form-label-modern">Foto Profil</label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-image"></i>
                                            </span>
                                            {{-- Input upload foto --}}
                                            <input type="file"
                                                   name="foto"
                                                   class="form-control-modern @error('foto') is-invalid @enderror">
                                        </div>
                                        {{-- Pesan error foto --}}
                                        @error('foto')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- ================= TOMBOL AKSI ================= --}}
                                    <div class="col-12 mt-4">
                                        <div class="d-flex gap-3 justify-content-end">
                                            {{-- Tombol simpan --}}
                                            <button type="submit"
                                                    class="btn-modern btn-primary-modern">
                                                <i class="fas fa-save me-2"></i>Simpan User
                                            </button>
                                            {{-- Tombol batal --}}
                                            <a href="{{ route('users.index') }}"
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
            {{-- =================== END CARD =================== --}}

        </div>
    </div>
    {{-- =================== END CONTENT =================== --}}

@endsection
