{{-- Menggunakan layout utama guest --}}
@extends('layouts.guest.app')

{{-- Mendefinisikan section content --}}
@section('content')
    {{-- start main content --}}

    {{-- Container utama halaman --}}
    <div class="container-fluid content-section">
        <div class="container py-5">

            <!-- ================= PAGE HEADER ================= -->
            <!-- Menampilkan judul halaman tambah profil desa -->
            <div class="page-header-modern text-center mb-5">
                <div class="header-icon">
                    <!-- Icon halaman -->
                    <i class="fas fa-home"></i>
                </div>
                <h5 class="text-primary fw-bold text-uppercase mb-2">
                    Manajemen Profil Desa
                </h5>
                <h1 class="display-4 fw-bold mb-3">
                    Tambah Profil Desa
                </h1>
                <p class="text-muted fs-5 mb-0">
                    Lengkapi form berikut untuk menambahkan profil desa baru
                </p>
            </div>
            <!-- ================= END PAGE HEADER ================= -->

            <!-- ================= ACTION BAR ================= -->
            <!-- Bagian judul form dan tombol kembali -->
            <div class="action-bar mb-4">
                <div class="action-left">
                    <h4 class="mb-0 fw-bold text-dark">
                        <i class="fas fa-plus me-2 text-primary"></i>
                        Form Tambah Profil Desa
                    </h4>
                    <p class="text-muted mb-0 mt-1">
                        Pastikan data yang dimasukkan sudah benar
                    </p>
                </div>

                {{-- Tombol kembali ke halaman daftar profil --}}
                <div class="action-right">
                    <a href="{{ route('profil.index') }}" class="btn-modern btn-secondary-modern">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </div>
            <!-- ================= END ACTION BAR ================= -->

            <!-- ================= NOTIFIKASI ERROR ================= -->
            {{-- Menampilkan pesan error validasi jika ada --}}
            @if ($errors->any())
                <div class="alert alert-modern alert-danger alert-dismissible fade show mb-4" role="alert">
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
            <!-- ================= END NOTIFIKASI ERROR ================= -->

            <!-- ================= CARD FORM CREATE ================= -->
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card-modern card-create">

                        <!-- Header card -->
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-home"></i>
                                <h5>Data Profil Desa</h5>
                            </div>
                        </div>

                        <!-- Body card -->
                        <div class="card-body p-4">

                            {{-- Form untuk menyimpan data profil desa --}}
                            <form action="{{ route('profil.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row g-4">

                                    <!-- ================= NAMA DESA ================= -->
                                    <div class="col-md-6">
                                        <label class="form-label-modern">
                                            Nama Desa <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-home"></i>
                                            </span>
                                            <input type="text" name="nama_desa"
                                                class="form-control-modern @error('nama_desa') is-invalid @enderror"
                                                value="{{ old('nama_desa') }}" placeholder="Nama desa" required>
                                        </div>
                                        @error('nama_desa')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- ================= KECAMATAN ================= -->
                                    <div class="col-md-6">
                                        <label class="form-label-modern">
                                            Kecamatan <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </span>
                                            <input type="text" name="kecamatan"
                                                class="form-control-modern @error('kecamatan') is-invalid @enderror"
                                                value="{{ old('kecamatan') }}" placeholder="Kecamatan" required>
                                        </div>
                                        @error('kecamatan')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- ================= KABUPATEN ================= -->
                                    <div class="col-md-6">
                                        <label class="form-label-modern">
                                            Kabupaten <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-city"></i>
                                            </span>
                                            <input type="text" name="kabupaten"
                                                class="form-control-modern @error('kabupaten') is-invalid @enderror"
                                                value="{{ old('kabupaten') }}" placeholder="Kabupaten" required>
                                        </div>
                                        @error('kabupaten')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- ================= PROVINSI ================= -->
                                    <div class="col-md-6">
                                        <label class="form-label-modern">
                                            Provinsi <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-globe-asia"></i>
                                            </span>
                                            <input type="text" name="provinsi"
                                                class="form-control-modern @error('provinsi') is-invalid @enderror"
                                                value="{{ old('provinsi') }}" placeholder="Provinsi" required>
                                        </div>
                                        @error('provinsi')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- ================= ALAMAT KANTOR ================= -->
                                    <div class="col-12">
                                        <label class="form-label-modern">
                                            Alamat Kantor <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group-modern">
                                            <span class="input-icon textarea-icon">
                                                <i class="fas fa-building"></i>
                                            </span>
                                            <textarea name="alamat_kantor" class="form-control-modern @error('alamat_kantor') is-invalid @enderror" rows="3"
                                                placeholder="Masukkan alamat kantor desa" required>{{ old('alamat_kantor') }}</textarea>
                                        </div>
                                        @error('alamat_kantor')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <!-- ================= TELEPON ================= -->
                                    <div class="col-md-6">
                                        <label class="form-label-modern">Telepon</label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-phone"></i>
                                            </span>
                                            <input type="text" name="telepon"
                                                class="form-control-modern @error('telepon') is-invalid @enderror"
                                                value="{{ old('telepon') }}" placeholder="Nomor telepon">
                                        </div>
                                        @error('telepon')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- ================= EMAIL ================= -->
                                    <div class="col-md-6">
                                        <label class="form-label-modern">Email</label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-envelope"></i>
                                            </span>
                                            <input type="email" name="email"
                                                class="form-control-modern @error('email') is-invalid @enderror"
                                                value="{{ old('email') }}" placeholder="Email desa">
                                        </div>
                                        @error('email')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- ================= VISI ================= -->
                                    <div class="col-12">
                                        <label class="form-label-modern">
                                            Visi Desa <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group-modern">
                                            <span class="input-icon textarea-icon">
                                                <i class="fas fa-bullseye"></i>
                                            </span>
                                            <textarea name="visi" class="form-control-modern @error('visi') is-invalid @enderror" rows="3"
                                                placeholder="Masukkan visi desa" required>{{ old('visi') }}</textarea>
                                        </div>
                                        @error('visi')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- ================= MISI ================= -->
                                    <div class="col-12">
                                        <label class="form-label-modern">
                                            Misi Desa <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group-modern">
                                            <span class="input-icon textarea-icon">
                                                <i class="fas fa-list-ul"></i>
                                            </span>
                                            <textarea name="misi" class="form-control-modern @error('misi') is-invalid @enderror" rows="4"
                                                placeholder="Masukkan misi desa (boleh dipisah dengan baris baru)" required>{{ old('misi') }}</textarea>
                                        </div>
                                        @error('misi')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <!-- ================= LOGO DESA ================= -->
                                    <div class="col-12">
                                        <label class="form-label-modern">Logo Desa</label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-image"></i>
                                            </span>
                                            <input type="file" name="logo"
                                                class="form-control-modern @error('logo') is-invalid @enderror">
                                        </div>
                                        @error('logo')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- ================= TOMBOL ACTION ================= -->
                                    <div class="col-12 mt-4">
                                        <div class="d-flex justify-content-end gap-3">
                                            <button type="submit" class="btn-modern btn-primary-modern">
                                                <i class="fas fa-save me-2"></i>Simpan Profil
                                            </button>
                                            <a href="{{ route('profil.index') }}"
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
    {{-- end main content --}}
@endsection
