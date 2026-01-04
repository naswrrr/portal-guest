{{-- Menggunakan layout utama guest --}}
@extends('layouts.guest.app')

{{-- Memulai section content --}}
@section('content')

    {{-- ================= NAVBAR ================= --}}
    {{-- Memanggil navbar untuk halaman guest --}}
    @include('layouts.guest.navbar')

    {{-- ================= CONTENT WRAPPER ================= --}}
    {{-- Container utama halaman --}}
    <div class="container-fluid content-section">
        <div class="container py-5">

            {{-- ================= PAGE HEADER ================= --}}
            {{-- Header halaman edit kategori berita --}}
            <div class="page-header-modern text-center mb-5">
                <div class="header-icon">
                    <i class="fas fa-edit"></i>
                </div>
                <h5 class="text-primary fw-bold text-uppercase mb-2">
                    Edit Kategori Berita
                </h5>
                <h1 class="display-4 fw-bold mb-3">
                    Perbarui Kategori Berita
                </h1>
                <p class="text-muted fs-5 mb-0">
                    Update informasi kategori berita dengan data terbaru
                </p>
            </div>

            {{-- ================= ACTION BAR ================= --}}
            {{-- Informasi halaman dan tombol kembali --}}
            <div class="action-bar mb-4">
                <div class="action-left">
                    <h4 class="mb-0 fw-bold text-dark">
                        <i class="fas fa-edit me-2 text-primary"></i>
                        Edit Kategori Berita
                    </h4>
                    <p class="text-muted mb-0 mt-1">
                        Perbarui informasi kategori {{ $kategori->nama }}
                    </p>
                </div>

                {{-- Tombol kembali ke daftar kategori --}}
                <div class="action-right">
                    <a href="{{ route('kategori_berita.index') }}"
                       class="btn-modern btn-secondary-modern">
                        <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar
                    </a>
                </div>
            </div>

            {{-- ================= NOTIFIKASI ERROR ================= --}}
            {{-- Menampilkan error validasi jika ada --}}
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
                    {{-- Tombol tutup alert --}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- ================= FORM EDIT ================= --}}
            {{-- Card form edit kategori --}}
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card-modern card-edit">

                        {{-- Header card --}}
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-edit"></i>
                                <h5>Form Edit Kategori Berita</h5>
                            </div>
                        </div>

                        {{-- Body card --}}
                        <div class="card-body p-4">

                            {{-- Form update kategori --}}
                            <form action="{{ route('kategori_berita.update', $kategori->kategori_id) }}"
                                  method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row g-4">

                                    {{-- ================= NAMA KATEGORI ================= --}}
                                    <div class="col-12">
                                        <label for="nama" class="form-label-modern">
                                            Nama Kategori <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-tag"></i>
                                            </span>
                                            <input type="text"
                                                   id="nama"
                                                   name="nama"
                                                   class="form-control-modern @error('nama') is-invalid @enderror"
                                                   value="{{ old('nama', $kategori->nama) }}"
                                                   placeholder="Masukkan nama kategori"
                                                   required>
                                        </div>

                                        {{-- Pesan error nama kategori --}}
                                        @error('nama')
                                            <div class="text-danger small mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- ================= SLUG ================= --}}
                                    {{-- Slug bersifat readonly karena dibuat otomatis --}}
                                    <div class="col-md-6">
                                        <label for="slug" class="form-label-modern">
                                            Slug
                                        </label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-link"></i>
                                            </span>
                                            <input type="text"
                                                   id="slug"
                                                   class="form-control-modern"
                                                   value="{{ $kategori->slug }}"
                                                   readonly>
                                        </div>
                                        <small class="text-muted">
                                            * Slug otomatis dari nama kategori
                                        </small>
                                    </div>

                                    {{-- ================= DESKRIPSI ================= --}}
                                    <div class="col-12">
                                        <label for="deskripsi" class="form-label-modern">
                                            Deskripsi
                                        </label>
                                        <div class="input-group-modern">
                                            <span class="input-icon textarea-icon">
                                                <i class="fas fa-align-left"></i>
                                            </span>
                                            <textarea id="deskripsi"
                                                      name="deskripsi"
                                                      rows="4"
                                                      class="form-control-modern @error('deskripsi') is-invalid @enderror"
                                                      placeholder="Masukkan deskripsi kategori">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
                                        </div>

                                        {{-- Pesan error deskripsi --}}
                                        @error('deskripsi')
                                            <div class="text-danger small mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- ================= TOMBOL AKSI ================= --}}
                                    <div class="col-12 mt-4">
                                        <div class="d-flex gap-3 justify-content-end">

                                            {{-- Tombol submit update --}}
                                            <button type="submit"
                                                    class="btn-modern btn-primary-modern">
                                                <i class="fas fa-save me-2"></i>
                                                Update Kategori
                                            </button>

                                            {{-- Tombol batal --}}
                                            <a href="{{ route('kategori_berita.index') }}"
                                               class="btn-modern btn-secondary-modern">
                                                <i class="fas fa-times me-2"></i>
                                                Batal
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

{{-- Menutup section content --}}
@endsection
