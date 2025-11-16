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
                    <i class="fas fa-edit"></i>
                </div>
                <h5 class="text-primary fw-bold text-uppercase mb-2">Edit Berita</h5>
                <h1 class="display-4 fw-bold mb-3">Perbarui Berita</h1>
                <p class="text-muted fs-5 mb-0">Update informasi berita dengan data terbaru</p>
            </div>
            <!-- Page Header End -->

            <!-- Action Bar -->
            <div class="action-bar mb-4">
                <div class="action-left">
                    <h4 class="mb-0 fw-bold text-dark">
                        <i class="fas fa-edit me-2 text-primary"></i>
                        Edit Berita
                    </h4>
                    <p class="text-muted mb-0 mt-1">Perbarui informasi berita "{{ $berita->judul }}"</p>
                </div>
                <div class="action-right">
                    <a href="{{ route('berita.index') }}" class="btn-modern btn-secondary-modern">
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

            <!-- Card Edit -->
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card-modern card-edit">
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-edit"></i>
                                <h5>Form Edit Berita</h5>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <form action="{{ route('berita.update', $berita->berita_id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row g-4">
                                    <!-- JUDUL BERITA -->
                                    <div class="col-12">
                                        <label for="judul" class="form-label-modern">Judul Berita <span class="text-danger">*</span></label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-heading"></i>
                                            </span>
                                            <input type="text" class="form-control-modern @error('judul') is-invalid @enderror"
                                                id="judul" name="judul" value="{{ old('judul', $berita->judul) }}"
                                                placeholder="Masukkan judul berita" required>
                                        </div>
                                        @error('judul')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- KATEGORI -->
                                    <div class="col-md-6">
                                        <label for="kategori_id" class="form-label-modern">Kategori <span class="text-danger">*</span></label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-tags"></i>
                                            </span>
                                            <select class="form-control-modern @error('kategori_id') is-invalid @enderror"
                                                id="kategori_id" name="kategori_id" required>
                                                <option value="">Pilih Kategori</option>
                                                @foreach($kategories as $kategori)
                                                    <option value="{{ $kategori->kategori_id }}"
                                                        {{ old('kategori_id', $berita->kategori_id) == $kategori->kategori_id ? 'selected' : '' }}>
                                                        {{ $kategori->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('kategori_id')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- PENULIS -->
                                    <div class="col-md-6">
                                        <label for="penulis" class="form-label-modern">Penulis <span class="text-danger">*</span></label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-user-edit"></i>
                                            </span>
                                            <input type="text" class="form-control-modern @error('penulis') is-invalid @enderror"
                                                id="penulis" name="penulis" value="{{ old('penulis', $berita->penulis) }}"
                                                placeholder="Masukkan nama penulis" required>
                                        </div>
                                        @error('penulis')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- ISI BERITA -->
                                    <div class="col-12">
                                        <label for="isi_html" class="form-label-modern">Isi Berita <span class="text-danger">*</span></label>
                                        <div class="input-group-modern">
                                            <span class="input-icon textarea-icon">
                                                <i class="fas fa-file-alt"></i>
                                            </span>
                                            <textarea class="form-control-modern @error('isi_html') is-invalid @enderror"
                                                id="isi_html" name="isi_html" rows="8"
                                                placeholder="Masukkan isi berita" required>{{ old('isi_html', $berita->isi_html) }}</textarea>
                                        </div>
                                        @error('isi_html')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- STATUS -->
                                    <div class="col-md-6">
                                        <label for="status" class="form-label-modern">Status <span class="text-danger">*</span></label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-toggle-on"></i>
                                            </span>
                                            <select class="form-control-modern @error('status') is-invalid @enderror"
                                                id="status" name="status" required>
                                                <option value="draft" {{ old('status', $berita->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                                                <option value="terbit" {{ old('status', $berita->status) == 'terbit' ? 'selected' : '' }}>Terbit</option>
                                            </select>
                                        </div>
                                        @error('status')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- SLUG (READONLY) -->
                                    <div class="col-md-6">
                                        <label for="slug" class="form-label-modern">Slug</label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-link"></i>
                                            </span>
                                            <input type="text" class="form-control-modern" id="slug"
                                                value="{{ $berita->slug }}" readonly>
                                        </div>
                                        <small class="text-muted">* Slug otomatis dari judul berita</small>
                                    </div>

                                    <!-- TOMBOL ACTION -->
                                    <div class="col-12 mt-4">
                                        <div class="d-flex gap-3 justify-content-end">
                                            <button type="submit" class="btn-modern btn-primary-modern">
                                                <i class="fas fa-save me-2"></i>Update Berita
                                            </button>
                                            <a href="{{ route('berita.index') }}" class="btn-modern btn-secondary-modern">
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
