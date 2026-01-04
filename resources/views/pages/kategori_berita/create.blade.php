{{-- Menggunakan layout utama guest/app --}}
@extends('layouts.guest.app')

{{-- Section utama konten halaman --}}
@section('content')

    {{-- ================= NAVBAR ================= --}}
    {{-- Memanggil komponen navbar guest --}}
    @include('layouts.guest.navbar')
    {{-- ========================================== --}}

    {{-- ================= CONTENT ================= --}}
    {{-- Container fluid agar background bisa full width --}}
    <div class="container-fluid content-section">

        {{-- Container utama untuk membatasi lebar konten --}}
        <div class="container py-5">

            {{-- ================= PAGE HEADER ================= --}}
            {{-- Header halaman (judul & deskripsi halaman) --}}
            <div class="page-header-modern text-center mb-5">

                {{-- Icon header --}}
                <div class="header-icon">
                    <i class="fas fa-tag"></i>
                </div>

                {{-- Subjudul --}}
                <h5 class="text-primary fw-bold text-uppercase mb-2">
                    Tambah Kategori Berita
                </h5>

                {{-- Judul utama --}}
                <h1 class="display-4 fw-bold mb-3">
                    Tambah Kategori Baru
                </h1>

                {{-- Deskripsi singkat --}}
                <p class="text-muted fs-5 mb-0">
                    Tambahkan kategori berita baru ke dalam sistem
                </p>
            </div>
            {{-- ================= END PAGE HEADER ================= --}}

            {{-- ================= ACTION BAR ================= --}}
            {{-- Bar judul + tombol kembali --}}
            <div class="action-bar mb-4">

                {{-- Bagian kiri action bar --}}
                <div class="action-left">
                    <h4 class="mb-0 fw-bold text-dark">
                        <i class="fas fa-tag me-2 text-primary"></i>
                        Form Tambah Kategori
                    </h4>
                    <p class="text-muted mb-0 mt-1">
                        Isi form berikut untuk menambahkan kategori berita baru
                    </p>
                </div>

                {{-- Bagian kanan action bar --}}
                <div class="action-right">
                    {{-- Tombol kembali ke halaman index kategori --}}
                    <a href="{{ route('kategori_berita.index') }}"
                       class="btn-modern btn-secondary-modern">
                        <i class="fas fa-arrow-left me-2"></i>
                        Kembali ke Daftar
                    </a>
                </div>

            </div>
            {{-- ================= END ACTION BAR ================= --}}

            {{-- ================= VALIDASI ERROR ================= --}}
            {{-- Menampilkan error validasi jika ada --}}
            @if ($errors->any())
                <div class="alert alert-modern alert-danger alert-dismissible fade show mb-4"
                     role="alert">

                    {{-- Icon alert --}}
                    <div class="alert-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>

                    {{-- Isi pesan error --}}
                    <div class="alert-content">
                        <strong>Terjadi Kesalahan!</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- Tombol close alert --}}
                    <button type="button" class="btn-close"
                            data-bs-dismiss="alert"></button>
                </div>
            @endif
            {{-- ================= END VALIDASI ERROR ================= --}}

            {{-- ================= CARD FORM ================= --}}
            <div class="row justify-content-center">
                <div class="col-lg-10">

                    {{-- Card utama form --}}
                    <div class="card-modern card-create">

                        {{-- Header card --}}
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-plus"></i>
                                <h5>Form Tambah Kategori Berita</h5>
                            </div>
                        </div>

                        {{-- Body card --}}
                        <div class="card-body p-4">

                            {{-- Form untuk menyimpan kategori --}}
                            <form action="{{ route('kategori_berita.store') }}"
                                  method="POST">

                                {{-- Token keamanan Laravel --}}
                                @csrf

                                <div class="row g-4">

                                    {{-- ===== INPUT NAMA KATEGORI ===== --}}
                                    <div class="col-12">
                                        <label for="nama"
                                               class="form-label-modern">
                                            Nama Kategori
                                            <span class="text-danger">*</span>
                                        </label>

                                        {{-- Input group custom --}}
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-tag"></i>
                                            </span>

                                            {{-- Input nama kategori --}}
                                            <input type="text"
                                                   class="form-control-modern @error('nama') is-invalid @enderror"
                                                   id="nama"
                                                   name="nama"
                                                   value="{{ old('nama') }}"
                                                   placeholder="Masukkan nama kategori"
                                                   required>
                                        </div>

                                        {{-- Pesan error khusus field nama --}}
                                        @error('nama')
                                            <div class="text-danger small mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- ===== END INPUT NAMA ===== --}}

                                    {{-- ===== INPUT DESKRIPSI ===== --}}
                                    <div class="col-12">
                                        <label for="deskripsi"
                                               class="form-label-modern">
                                            Deskripsi
                                        </label>

                                        <div class="input-group-modern">
                                            <span class="input-icon textarea-icon">
                                                <i class="fas fa-align-left"></i>
                                            </span>

                                            {{-- Textarea deskripsi --}}
                                            <textarea
                                                class="form-control-modern @error('deskripsi') is-invalid @enderror"
                                                id="deskripsi"
                                                name="deskripsi"
                                                rows="4"
                                                placeholder="Masukkan deskripsi kategori">{{ old('deskripsi') }}</textarea>
                                        </div>

                                        {{-- Pesan error khusus deskripsi --}}
                                        @error('deskripsi')
                                            <div class="text-danger small mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- ===== END INPUT DESKRIPSI ===== --}}

                                    {{-- ===== TOMBOL AKSI ===== --}}
                                    <div class="col-12 mt-4">
                                        <div class="d-flex gap-3 justify-content-end">

                                            {{-- Tombol simpan --}}
                                            <button type="submit"
                                                    class="btn-modern btn-primary-modern">
                                                <i class="fas fa-save me-2"></i>
                                                Simpan Kategori
                                            </button>

                                            {{-- Tombol batal --}}
                                            <a href="{{ route('kategori_berita.index') }}"
                                               class="btn-modern btn-secondary-modern">
                                                <i class="fas fa-times me-2"></i>
                                                Batal
                                            </a>
                                        </div>
                                    </div>
                                    {{-- ===== END TOMBOL AKSI ===== --}}

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- ================= END CARD FORM ================= --}}

        </div>
    </div>
    {{-- ================= END CONTENT ================= --}}

@endsection
