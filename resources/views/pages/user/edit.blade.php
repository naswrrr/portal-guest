{{-- Menggunakan layout utama halaman guest --}}
@extends('layouts.guest.app')

{{-- Section konten utama --}}
@section('content')

    {{-- Memanggil navbar guest --}}
    @include('layouts.guest.navbar')

    {{-- Container utama halaman --}}
    <div class="container-fluid content-section">
        <div class="container py-5">

            {{-- ===================== PAGE HEADER ===================== --}}
            {{-- Header halaman edit user --}}
            <div class="page-header-modern text-center mb-5">
                <div class="header-icon">
                    {{-- Icon header --}}
                    <i class="fas fa-user-edit"></i>
                </div>
                {{-- Sub judul --}}
                <h5 class="text-primary fw-bold text-uppercase mb-2">Edit User</h5>
                {{-- Judul utama --}}
                <h1 class="display-4 fw-bold mb-3">Perbarui Data User</h1>
                {{-- Deskripsi halaman --}}
                <p class="text-muted fs-5 mb-0">
                    Update informasi user dengan data terbaru
                </p>
            </div>
            {{-- =================== END PAGE HEADER =================== --}}

            {{-- ===================== ACTION BAR ===================== --}}
            {{-- Bar judul dan tombol kembali --}}
            <div class="action-bar mb-4">
                <div class="action-left">
                    <h4 class="mb-0 fw-bold text-dark">
                        <i class="fas fa-user-edit me-2 text-primary"></i>
                        Edit Data User
                    </h4>
                    {{-- Menampilkan nama user yang sedang diedit --}}
                    <p class="text-muted mb-0 mt-1">
                        Perbarui informasi user {{ $editData->name }}
                    </p>
                </div>
                <div class="action-right">
                    {{-- Tombol kembali ke halaman index --}}
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
                <div class="alert alert-modern alert-danger alert-dismissible fade show mb-4">
                    <div class="alert-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="alert-content">
                        <strong>Terjadi Kesalahan!</strong>
                        {{-- Daftar error --}}
                        <ul class="mt-2 mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    {{-- Tombol tutup alert --}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            {{-- =================== END ERROR =================== --}}

            {{-- ===================== CARD FORM EDIT ===================== --}}
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card-modern card-edit">

                        {{-- Header card --}}
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-edit"></i>
                                <h5>Form Edit Data User</h5>
                            </div>
                        </div>

                        {{-- Body card --}}
                        <div class="card-body p-4">
                            {{-- Form update user --}}
                            <form action="{{ route('users.update', $editData->id) }}"
                                  method="POST"
                                  enctype="multipart/form-data">

                                {{-- Token keamanan --}}
                                @csrf
                                {{-- Method PUT untuk update --}}
                                @method('PUT')

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
                                                   value="{{ old('name', $editData->name) }}"
                                                   class="form-control-modern"
                                                   required>
                                        </div>
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
                                                   value="{{ old('email', $editData->email) }}"
                                                   class="form-control-modern"
                                                   required>
                                        </div>
                                    </div>

                                    {{-- ================= PASSWORD BARU ================= --}}
                                    <div class="col-md-6">
                                        <label class="form-label-modern">Password Baru</label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-lock"></i>
                                            </span>
                                            {{-- Input password baru (opsional) --}}
                                            <input type="password"
                                                   name="password"
                                                   class="form-control-modern">
                                        </div>
                                        <small class="text-muted">
                                            Kosongkan jika tidak ingin mengubah password
                                        </small>
                                    </div>

                                    {{-- ================= FOTO USER ================= --}}
                                    <div class="col-12">
                                        <label class="form-label-modern">Foto User</label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-image"></i>
                                            </span>
                                            {{-- Input upload foto --}}
                                            <input type="file"
                                                   name="foto"
                                                   class="form-control-modern"
                                                   accept="image/*">
                                        </div>

                                        {{-- Menampilkan foto lama jika ada --}}
                                        @if ($editData->media && $editData->media->first())
                                            <div class="mt-2">
                                                <img src="{{ asset('storage/' . $editData->media->first()->file_name) }}"
                                                     alt="Foto Lama"
                                                     style="width:70px;height:70px;object-fit:cover;border-radius:50%;">
                                                <p class="text-muted small">Foto saat ini</p>
                                            </div>
                                        @endif
                                    </div>

                                    {{-- ================= TOMBOL AKSI ================= --}}
                                    <div class="col-12 mt-4 d-flex gap-3 justify-content-end">
                                        {{-- Tombol submit --}}
                                        <button type="submit"
                                                class="btn-modern btn-primary-modern">
                                            <i class="fas fa-save me-2"></i>Update User
                                        </button>

                                        {{-- Tombol batal --}}
                                        <a href="{{ route('users.index') }}"
                                           class="btn-modern btn-secondary-modern">
                                            <i class="fas fa-times me-2"></i>Batal
                                        </a>
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            {{-- =================== END CARD FORM =================== --}}

        </div>
    </div>

@endsection
