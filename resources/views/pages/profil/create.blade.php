@extends('layouts.guest.app')

@section('content')
    @include('layouts.guest.navbar')

    <div class="container-fluid content-section">
        <div class="container py-5">

            <div class="page-header-modern text-center mb-5">
                <div class="header-icon">
                    <i class="fas fa-plus-circle"></i>
                </div>
                <h5 class="text-primary fw-bold text-uppercase mb-2">Tambah Profil Desa</h5>
                <h1 class="display-4 fw-bold mb-3">Buat Profil Baru</h1>
                <p class="text-muted fs-5 mb-0">Isi data profil desa dengan lengkap</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-modern alert-danger alert-dismissible fade show mb-4">
                    <div class="alert-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="alert-content">
                        <strong>Kesalahan Input!</strong>
                        <ul class="mt-2 mb-0">
                            @foreach ($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <div class="card-modern card-edit">
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-plus-circle"></i>
                                <h5>Buat Profil Desa</h5>
                            </div>
                        </div>

                        <div class="card-body p-4">

                            <form action="{{ route('profil.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row g-4">

                                    <!-- Nama Desa -->
                                    <div class="col-md-6">
                                        <label class="form-label-modern">Nama Desa *</label>
                                        <div class="input-group-modern">
                                            <span class="input-icon"><i class="fas fa-home"></i></span>
                                            <input type="text" name="nama_desa" class="form-control-modern"
                                                value="{{ old('nama_desa') }}" placeholder="Masukkan nama desa" required>
                                        </div>
                                    </div>

                                    <!-- Kecamatan -->
                                    <div class="col-md-6">
                                        <label class="form-label-modern">Kecamatan *</label>
                                        <div class="input-group-modern">
                                            <span class="input-icon"><i class="fas fa-map"></i></span>
                                            <input type="text" name="kecamatan" class="form-control-modern"
                                                value="{{ old('kecamatan') }}" placeholder="Masukkan kecamatan" required>
                                        </div>
                                    </div>

                                    <!-- Kabupaten -->
                                    <div class="col-md-6">
                                        <label class="form-label-modern">Kabupaten *</label>
                                        <div class="input-group-modern">
                                            <span class="input-icon"><i class="fas fa-map-pin"></i></span>
                                            <input type="text" name="kabupaten" class="form-control-modern"
                                                value="{{ old('kabupaten') }}" placeholder="Masukkan kabupaten" required>
                                        </div>
                                    </div>

                                    <!-- Provinsi -->
                                    <div class="col-md-6">
                                        <label class="form-label-modern">Provinsi *</label>
                                        <div class="input-group-modern">
                                            <span class="input-icon"><i class="fas fa-map-marked-alt"></i></span>
                                            <input type="text" name="provinsi" class="form-control-modern"
                                                value="{{ old('provinsi') }}" placeholder="Masukkan provinsi" required>
                                        </div>
                                    </div>


                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <label class="form-label-modern">Email</label>
                                        <div class="input-group-modern">
                                            <span class="input-icon"><i class="fas fa-envelope"></i></span>
                                            <input type="email" name="email" class="form-control-modern"
                                                value="{{ old('email') }}" placeholder="Masukkan email desa">
                                        </div>
                                    </div>

                                    <!-- Telepon -->
                                    <div class="col-md-6">
                                        <label class="form-label-modern">Telepon</label>
                                        <div class="input-group-modern">
                                            <span class="input-icon"><i class="fas fa-phone"></i></span>
                                            <input type="text" name="telepon" class="form-control-modern"
                                                value="{{ old('telepon') }}" placeholder="Masukkan nomor telepon">
                                        </div>
                                    </div>

                                    <!-- Alamat Kantor (full row) -->
                                    <div class="col-12">
                                        <label class="form-label-modern">Alamat Kantor *</label>
                                        <textarea name="alamat_kantor" class="form-control-modern" rows="3" placeholder="Masukkan alamat kantor" required>{{ old('alamat_kantor') }}</textarea>
                                    </div>

                                    <!-- Visi (full row) -->
                                    <div class="col-12">
                                        <label class="form-label-modern">Visi</label>
                                        <textarea name="visi" class="form-control-modern" rows="3" placeholder="Masukkan visi desa">{{ old('visi') }}</textarea>
                                    </div>

                                    <!-- Misi (full row) -->
                                    <div class="col-12">
                                        <label class="form-label-modern">Misi</label>
                                        <textarea name="misi" class="form-control-modern" rows="3" placeholder="Masukkan misi desa">{{ old('misi') }}</textarea>
                                    </div>

                                    <!-- Logo Desa -->
                                    <div class="col-12">
                                        <label class="form-label-modern">Logo Desa</label>
                                        <input type="file" name="logo" class="form-control-modern">
                                        <small class="text-muted">Format JPG, PNG, WEBP – max 2MB</small>
                                    </div>

                                    <!-- Buttons -->
                                    <div class="col-12 mt-3 d-flex justify-content-end gap-3">
                                        <button type="submit" class="btn-modern btn-primary-modern">
                                            <i class="fas fa-save me-2"></i>Simpan
                                        </button>
                                        <a href="{{ route('profil.index') }}" class="btn-modern btn-secondary-modern">
                                            <i class="fas fa-times me-2"></i>Batal
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
