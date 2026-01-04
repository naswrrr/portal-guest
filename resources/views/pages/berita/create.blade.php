{{-- Menggunakan layout utama halaman guest --}}
@extends('layouts.guest.app')

{{-- Mendefinisikan section content yang akan dimasukkan ke layout --}}
@section('content')

    {{-- ================= NAVBAR ================= --}}
    {{-- Memanggil partial navbar --}}
    @include('layouts.guest.navbar')

    {{-- ================= CONTENT ================= --}}
    <div class="container-fluid content-section">
        <div class="container py-5">

            {{-- ================= PAGE HEADER ================= --}}
            {{-- Header halaman tambah berita --}}
            <div class="page-header-modern text-center mb-5">
                <div class="header-icon">
                    {{-- Icon halaman --}}
                    <i class="fas fa-plus-circle"></i>
                </div>
                <h5 class="text-primary fw-bold text-uppercase mb-2">Tambah Berita</h5>
                <h1 class="display-4 fw-bold mb-3">Tambah Berita Baru</h1>
                <p class="text-muted fs-5 mb-0">
                    Tambahkan berita baru ke dalam portal desa
                </p>
            </div>

            {{-- ================= ACTION BAR ================= --}}
            {{-- Judul form dan tombol kembali --}}
            <div class="action-bar mb-4">
                <div class="action-left">
                    <h4 class="mb-0 fw-bold text-dark">
                        <i class="fas fa-plus me-2 text-primary"></i>
                        Form Tambah Berita
                    </h4>
                    <p class="text-muted mb-0 mt-1">
                        Isi form berikut untuk menambahkan berita baru
                    </p>
                </div>
                <div class="action-right">
                    {{-- Tombol kembali ke halaman daftar berita --}}
                    <a href="{{ route('berita.index') }}" class="btn-modern btn-secondary-modern">
                        <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar
                    </a>
                </div>
            </div>

            {{-- ================= NOTIFIKASI ERROR ================= --}}
            {{-- Menampilkan error validasi jika ada --}}
            @if ($errors->any())
                <div class="alert alert-modern alert-danger alert-dismissible fade show mb-4">
                    <div class="alert-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="alert-content">
                        <strong>Terjadi Kesalahan!</strong>
                        <ul class="mb-0 mt-2">
                            {{-- Loop semua pesan error --}}
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- ================= CARD FORM CREATE ================= --}}
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card-modern card-create">

                        {{-- Header Card --}}
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-plus"></i>
                                <h5>Form Tambah Berita</h5>
                            </div>
                        </div>

                        <div class="card-body p-4">

                            {{-- ================= FORM TAMBAH BERITA ================= --}}
                            <form action="{{ route('berita.store') }}"
                                  method="POST"
                                  enctype="multipart/form-data">

                                {{-- Token keamanan CSRF --}}
                                @csrf

                                <div class="row g-4">

                                    {{-- ================= JUDUL BERITA ================= --}}
                                    <div class="col-12">
                                        <label class="form-label-modern">
                                            Judul Berita <span class="text-danger">*</span>
                                        </label>

                                        {{-- Input judul berita --}}
                                        <input type="text"
                                            name="judul"
                                            class="form-control-modern @error('judul') is-invalid @enderror"
                                            value="{{ old('judul') }}"
                                            placeholder="Masukkan judul berita"
                                            required>

                                        {{-- Pesan error judul --}}
                                        @error('judul')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- ================= KATEGORI ================= --}}
                                    <div class="col-md-6">
                                        <label class="form-label-modern">
                                            Kategori <span class="text-danger">*</span>
                                        </label>

                                        {{-- Dropdown kategori --}}
                                        <select name="kategori_id"
                                            class="form-control-modern @error('kategori_id') is-invalid @enderror"
                                            required>
                                            <option value="">Pilih Kategori</option>

                                            {{-- Loop data kategori dari controller --}}
                                            @foreach ($kategories as $kategori)
                                                <option value="{{ $kategori->kategori_id }}"
                                                    {{ old('kategori_id') == $kategori->kategori_id ? 'selected' : '' }}>
                                                    {{ $kategori->nama }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @error('kategori_id')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- ================= PENULIS ================= --}}
                                    <div class="col-md-6">
                                        <label class="form-label-modern">
                                            Penulis <span class="text-danger">*</span>
                                        </label>

                                        {{-- Input nama penulis --}}
                                        <input type="text"
                                            name="penulis"
                                            class="form-control-modern @error('penulis') is-invalid @enderror"
                                            value="{{ old('penulis') }}"
                                            placeholder="Masukkan nama penulis"
                                            required>

                                        @error('penulis')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- ================= ISI BERITA ================= --}}
                                    <div class="col-12">
                                        <label class="form-label-modern">
                                            Isi Berita <span class="text-danger">*</span>
                                        </label>

                                        {{-- Textarea isi berita --}}
                                        <textarea name="isi_html"
                                            rows="8"
                                            class="form-control-modern @error('isi_html') is-invalid @enderror"
                                            placeholder="Masukkan isi berita"
                                            required>{{ old('isi_html') }}</textarea>

                                        @error('isi_html')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- ================= STATUS ================= --}}
                                    <div class="col-md-6">
                                        <label class="form-label-modern">
                                            Status <span class="text-danger">*</span>
                                        </label>

                                        {{-- Dropdown status berita --}}
                                        <select name="status"
                                            class="form-control-modern @error('status') is-invalid @enderror"
                                            required>
                                            <option value="draft"
                                                {{ old('status') == 'draft' ? 'selected' : '' }}>
                                                Draft
                                            </option>
                                            <option value="terbit"
                                                {{ old('status') == 'terbit' ? 'selected' : '' }}>
                                                Terbit
                                            </option>
                                        </select>

                                        @error('status')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- ================= UPLOAD GAMBAR ================= --}}
                                    <div class="col-12">
                                        <label class="form-label-modern">Upload Foto Berita</label>

                                        {{-- Input upload multiple gambar --}}
                                        <input type="file"
                                            name="media[]"
                                            class="form-control-modern"
                                            multiple
                                            accept="image/*">

                                        <small class="text-muted">
                                            * Bisa pilih lebih dari 1 foto (jpg, jpeg, png, webp)
                                        </small>
                                    </div>

                                    {{-- ================= TOMBOL AKSI ================= --}}
                                    <div class="col-12 mt-4">
                                        <div class="d-flex gap-3 justify-content-end">

                                            {{-- Tombol simpan berita --}}
                                            <button type="submit" class="btn-modern btn-primary-modern">
                                                <i class="fas fa-save me-2"></i>Simpan Berita
                                            </button>

                                            {{-- Tombol batal --}}
                                            <a href="{{ route('berita.index') }}"
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

        </div>
    </div>

@endsection
