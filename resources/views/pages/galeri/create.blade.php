@extends('layouts.guest.app')

@section('content')
    @include('layouts.guest.navbar')

    <div class="container-fluid content-section">
        <div class="container py-5">

            <!-- PAGE HEADER -->
            <div class="page-header-modern text-center mb-5">
                <div class="header-icon">
                    <i class="fas fa-images"></i>
                </div>
                <h5 class="text-primary fw-bold text-uppercase mb-2">Galeri</h5>
                <h1 class="display-4 fw-bold mb-3">Tambah Galeri</h1>
                <p class="text-muted fs-5 mb-0">
                    Tambahkan dokumentasi kegiatan desa
                </p>
            </div>

            <!-- ALERT ERROR -->
            @if ($errors->any())
                <div class="alert alert-modern alert-danger mb-4">
                    <strong>Terjadi Kesalahan</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- CARD -->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card-modern">

                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-plus"></i>
                                <h5>Form Tambah Galeri</h5>
                            </div>
                        </div>

                        <div class="card-body p-4">

                            {{-- 🔴 WAJIB enctype --}}
                            <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data"
                                novalidate>
                                @csrf

                                <!-- JUDUL -->
                                <div class="mb-3">
                                    <label class="form-label-modern">
                                        Judul Galeri <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="judul" class="form-control-modern"
                                        value="{{ old('judul') }}" required>
                                </div>

                                <!-- DESKRIPSI -->
                                <div class="mb-4">
                                    <label class="form-label-modern">Deskripsi</label>
                                    <textarea name="deskripsi" rows="4" class="form-control-modern">{{ old('deskripsi') }}</textarea>
                                </div>

                                <!-- UPLOAD MULTIPLE FOTO (OPSIONAL) -->
                                <div class="mb-4">
                                    <label class="form-label-modern">
                                        Upload Foto
                                    </label>
                                    <input type="file" name="media[]" class="form-control-modern" multiple
                                        accept="image/*">

                                    <small class="text-muted">
                                        Bisa upload lebih dari satu foto (jpg, png, max 2MB).
                                        Bisa dikosongkan, akan pakai placeholder.
                                    </small>
                                </div>

                                <!-- BUTTON -->
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('galeri.index') }}" class="btn-modern btn-secondary-modern">
                                        Batal
                                    </a>
                                    <button type="submit" class="btn-modern btn-primary-modern">
                                        <i class="fas fa-save me-2"></i>Simpan Galeri
                                    </button>
                                </div>
                            </form>


                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
