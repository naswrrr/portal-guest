{{-- Menggunakan layout utama halaman guest --}}
@extends('layouts.guest.app')

{{-- Mendefinisikan section content yang akan di-render di layout --}}
@section('content')

    {{-- ================= NAVBAR ================= --}}
    {{-- Memanggil komponen navbar --}}
    @include('layouts.guest.navbar')

    {{-- ================= CONTENT ================= --}}
    <div class="container-fluid content-section">
        <div class="container py-5">

            {{-- ================= PAGE HEADER ================= --}}
            {{-- Header halaman edit berita --}}
            <div class="page-header-modern text-center mb-5">
                <div class="header-icon">
                    <i class="fas fa-edit"></i>
                </div>
                <h5 class="text-primary fw-bold text-uppercase mb-2">Edit Berita</h5>
                <h1 class="display-4 fw-bold mb-3">Perbarui Berita</h1>
                <p class="text-muted fs-5 mb-0">
                    Update informasi berita dengan data terbaru
                </p>
            </div>

            {{-- ================= ACTION BAR ================= --}}
            {{-- Judul kecil + tombol kembali --}}
            <div class="action-bar mb-4">
                <div class="action-left">
                    <h4 class="mb-0 fw-bold text-dark">
                        <i class="fas fa-edit me-2 text-primary"></i>
                        Edit Berita
                    </h4>
                    {{-- Menampilkan judul berita yang sedang diedit --}}
                    <p class="text-muted mb-0 mt-1">
                        Perbarui informasi berita "{{ $berita->judul }}"
                    </p>
                </div>
                <div class="action-right">
                    {{-- Tombol kembali ke halaman index --}}
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

            {{-- ================= FORM EDIT ================= --}}
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card-modern card-edit">

                        {{-- Header Card --}}
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-edit"></i>
                                <h5>Form Edit Berita</h5>
                            </div>
                        </div>

                        <div class="card-body p-4">

                            {{-- Form update berita --}}
                            <form action="{{ route('berita.update', $berita->berita_id) }}"
                                  method="POST"
                                  enctype="multipart/form-data">

                                {{-- Token keamanan CSRF --}}
                                @csrf

                                {{-- Method spoofing untuk PUT --}}
                                @method('PUT')

                                <div class="row g-4">

                                    {{-- ================= JUDUL BERITA ================= --}}
                                    <div class="col-12">
                                        <label class="form-label-modern">
                                            Judul Berita <span class="text-danger">*</span>
                                        </label>

                                        {{-- Input judul --}}
                                        <input type="text"
                                            name="judul"
                                            class="form-control-modern @error('judul') is-invalid @enderror"
                                            value="{{ old('judul', $berita->judul) }}"
                                            required>

                                        {{-- Pesan error judul --}}
                                        @error('judul')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- ================= KATEGORI ================= --}}
                                    <div class="col-md-6">
                                        <label class="form-label-modern">Kategori *</label>

                                        {{-- Dropdown kategori --}}
                                        <select name="kategori_id"
                                            class="form-control-modern @error('kategori_id') is-invalid @enderror"
                                            required>
                                            <option value="">Pilih Kategori</option>

                                            {{-- Loop kategori dari controller --}}
                                            @foreach ($kategories as $kategori)
                                                <option value="{{ $kategori->kategori_id }}"
                                                    {{ old('kategori_id', $berita->kategori_id) == $kategori->kategori_id ? 'selected' : '' }}>
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
                                        <label class="form-label-modern">Penulis *</label>

                                        <input type="text"
                                            name="penulis"
                                            class="form-control-modern @error('penulis') is-invalid @enderror"
                                            value="{{ old('penulis', $berita->penulis) }}"
                                            required>

                                        @error('penulis')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- ================= ISI BERITA ================= --}}
                                    <div class="col-12">
                                        <label class="form-label-modern">Isi Berita *</label>

                                        {{-- Textarea isi berita --}}
                                        <textarea name="isi_html"
                                            rows="8"
                                            class="form-control-modern @error('isi_html') is-invalid @enderror"
                                            required>{{ old('isi_html', $berita->isi_html) }}</textarea>

                                        @error('isi_html')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- ================= STATUS ================= --}}
                                    <div class="col-md-6">
                                        <label class="form-label-modern">Status *</label>

                                        <select name="status"
                                            class="form-control-modern @error('status') is-invalid @enderror"
                                            required>
                                            <option value="draft"
                                                {{ old('status', $berita->status) == 'draft' ? 'selected' : '' }}>
                                                Draft
                                            </option>
                                            <option value="terbit"
                                                {{ old('status', $berita->status) == 'terbit' ? 'selected' : '' }}>
                                                Terbit
                                            </option>
                                        </select>
                                    </div>

                                    {{-- ================= SLUG ================= --}}
                                    {{-- Ditampilkan saja, tidak bisa diedit --}}
                                    <div class="col-md-6">
                                        <label class="form-label-modern">Slug</label>
                                        <input type="text"
                                            class="form-control-modern"
                                            value="{{ $berita->slug }}"
                                            readonly>
                                    </div>

                                    {{-- ================= UPLOAD FOTO ================= --}}
                                    <div class="col-12">
                                        <label class="form-label-modern">Upload Foto Berita</label>

                                        {{-- Multiple upload gambar --}}
                                        <input type="file" name="media[]" class="form-control-modern" multiple>
                                    </div>

                                    {{-- ================= BUTTON ================= --}}
                                    <div class="col-12 mt-4 text-end">
                                        <button type="submit" class="btn-modern btn-primary-modern">
                                            Update Berita
                                        </button>
                                        <a href="{{ route('berita.index') }}"
                                           class="btn-modern btn-secondary-modern">
                                            Batal
                                        </a>
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
