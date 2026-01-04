{{-- Menggunakan layout utama guest --}}
@extends('layouts.guest.app')

{{-- Section konten utama --}}
@section('content')
    {{-- start main content --}}

    {{-- Include navbar guest --}}
    @include('layouts.guest.navbar')

    {{-- Container utama halaman --}}
    <div class="container-fluid content-section">
        <div class="container py-5">

            <!-- ================= PAGE HEADER ================= -->
            <!-- Menampilkan judul dan deskripsi halaman edit -->
            <div class="page-header-modern text-center mb-5">
                <div class="header-icon">
                    <!-- Ikon edit -->
                    <i class="fas fa-edit"></i>
                </div>
                <h5 class="text-primary fw-bold text-uppercase mb-2">Edit Profil Desa</h5>
                <h1 class="display-4 fw-bold mb-3">Perbarui Profil Desa</h1>
                <p class="text-muted fs-5 mb-0">
                    Update informasi profil desa dengan data terbaru
                </p>
            </div>
            <!-- ================= END PAGE HEADER ================= -->

            <!-- ================= ACTION BAR ================= -->
            <!-- Menampilkan judul halaman dan tombol kembali -->
            <div class="action-bar mb-4">
                <div class="action-left">
                    <h4 class="mb-0 fw-bold text-dark">
                        <i class="fas fa-edit me-2 text-primary"></i>
                        Edit Profil Desa
                    </h4>
                    {{-- Menampilkan nama desa yang sedang diedit --}}
                    <p class="text-muted mb-0 mt-1">
                        Perbarui informasi profil desa "{{ $profil->nama_desa }}"
                    </p>
                </div>

                {{-- Tombol kembali ke halaman index --}}
                <div class="action-right">
                    <a href="{{ route('profil.index') }}" class="btn-modern btn-secondary-modern">
                        <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar
                    </a>
                </div>
            </div>
            <!-- ================= END ACTION BAR ================= -->

            <!-- ================= NOTIFIKASI ERROR ================= -->
            {{-- Menampilkan pesan error validasi --}}
            @if ($errors->any())
                <div class="alert alert-modern alert-danger alert-dismissible fade show mb-4" role="alert">
                    <div class="alert-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="alert-content">
                        <strong>Terjadi Kesalahan!</strong>
                        <ul class="mb-0 mt-2">
                            {{-- Loop seluruh pesan error --}}
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            <!-- ================= END NOTIFIKASI ERROR ================= -->

            <!-- ================= CARD FORM EDIT ================= -->
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card-modern card-edit">

                        <!-- Header card -->
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-edit"></i>
                                <h5>Form Edit Profil Desa</h5>
                            </div>
                        </div>

                        <!-- Body card -->
                        <div class="card-body p-4">

                            {{-- Form update profil desa --}}
                            <form action="{{ route('profil.update', $profil->profil_id) }}"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row g-4">

                                    <!-- ================= NAMA DESA ================= -->
                                    <div class="col-md-6">
                                        <label for="nama_desa" class="form-label-modern">
                                            Nama Desa <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-home"></i>
                                            </span>
                                            <input type="text"
                                                class="form-control-modern @error('nama_desa') is-invalid @enderror"
                                                id="nama_desa"
                                                name="nama_desa"
                                                value="{{ old('nama_desa', $profil->nama_desa) }}"
                                                placeholder="Masukkan nama desa"
                                                required>
                                        </div>
                                        @error('nama_desa')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- ================= KECAMATAN ================= -->
                                    <div class="col-md-6">
                                        <label for="kecamatan" class="form-label-modern">
                                            Kecamatan <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </span>
                                            <input type="text"
                                                class="form-control-modern @error('kecamatan') is-invalid @enderror"
                                                id="kecamatan"
                                                name="kecamatan"
                                                value="{{ old('kecamatan', $profil->kecamatan) }}"
                                                placeholder="Masukkan nama kecamatan"
                                                required>
                                        </div>
                                        @error('kecamatan')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- ================= KABUPATEN ================= -->
                                    <div class="col-md-6">
                                        <label for="kabupaten" class="form-label-modern">
                                            Kabupaten <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-map"></i>
                                            </span>
                                            <input type="text"
                                                class="form-control-modern @error('kabupaten') is-invalid @enderror"
                                                id="kabupaten"
                                                name="kabupaten"
                                                value="{{ old('kabupaten', $profil->kabupaten) }}"
                                                placeholder="Masukkan nama kabupaten"
                                                required>
                                        </div>
                                        @error('kabupaten')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- ================= PROVINSI ================= -->
                                    <div class="col-md-6">
                                        <label for="provinsi" class="form-label-modern">
                                            Provinsi <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-globe-asia"></i>
                                            </span>
                                            <input type="text"
                                                class="form-control-modern @error('provinsi') is-invalid @enderror"
                                                id="provinsi"
                                                name="provinsi"
                                                value="{{ old('provinsi', $profil->provinsi) }}"
                                                placeholder="Masukkan nama provinsi"
                                                required>
                                        </div>
                                        @error('provinsi')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- ================= ALAMAT KANTOR ================= -->
                                    <div class="col-12">
                                        <label for="alamat_kantor" class="form-label-modern">
                                            Alamat Kantor <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group-modern">
                                            <span class="input-icon textarea-icon">
                                                <i class="fas fa-building"></i>
                                            </span>
                                            <textarea
                                                class="form-control-modern @error('alamat_kantor') is-invalid @enderror"
                                                id="alamat_kantor"
                                                name="alamat_kantor"
                                                rows="3"
                                                placeholder="Masukkan alamat kantor desa"
                                                required>{{ old('alamat_kantor', $profil->alamat_kantor) }}</textarea>
                                        </div>
                                        @error('alamat_kantor')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- ================= EMAIL ================= -->
                                    <div class="col-md-6">
                                        <label for="email" class="form-label-modern">Email</label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-envelope"></i>
                                            </span>
                                            <input type="email"
                                                class="form-control-modern @error('email') is-invalid @enderror"
                                                id="email"
                                                name="email"
                                                value="{{ old('email', $profil->email) }}"
                                                placeholder="Masukkan email desa">
                                        </div>
                                        @error('email')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- ================= TELEPON ================= -->
                                    <div class="col-md-6">
                                        <label for="telepon" class="form-label-modern">Telepon</label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-phone"></i>
                                            </span>
                                            <input type="text"
                                                class="form-control-modern @error('telepon') is-invalid @enderror"
                                                id="telepon"
                                                name="telepon"
                                                value="{{ old('telepon', $profil->telepon) }}"
                                                placeholder="Masukkan nomor telepon">
                                        </div>
                                        @error('telepon')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- ================= VISI ================= -->
                                    <div class="col-md-6">
                                        <label for="visi" class="form-label-modern">Visi</label>
                                        <div class="input-group-modern">
                                            <span class="input-icon textarea-icon">
                                                <i class="fas fa-lightbulb"></i>
                                            </span>
                                            <textarea
                                                class="form-control-modern @error('visi') is-invalid @enderror"
                                                id="visi"
                                                name="visi"
                                                rows="4"
                                                placeholder="Masukkan visi desa">{{ old('visi', $profil->visi) }}</textarea>
                                        </div>
                                        @error('visi')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- ================= MISI ================= -->
                                    <div class="col-md-6">
                                        <label for="misi" class="form-label-modern">Misi</label>
                                        <div class="input-group-modern">
                                            <span class="input-icon textarea-icon">
                                                <i class="fas fa-bullseye"></i>
                                            </span>
                                            <textarea
                                                class="form-control-modern @error('misi') is-invalid @enderror"
                                                id="misi"
                                                name="misi"
                                                rows="4"
                                                placeholder="Masukkan misi desa">{{ old('misi', $profil->misi) }}</textarea>
                                        </div>
                                        @error('misi')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- ================= LOGO DESA ================= -->
                                    <div class="col-12">
                                        <label class="form-label-modern">Logo Desa</label>

                                        {{-- Mengambil data logo dari tabel media --}}
                                        @php
                                            $logo = \App\Models\Media::where('ref_table', 'profil')
                                                ->where('ref_id', $profil->profil_id)
                                                ->first();
                                        @endphp

                                        {{-- Menampilkan logo jika tersedia --}}
                                        @if($logo)
                                            <div class="mb-3">
                                                <p class="mb-2">Logo Saat Ini:</p>
                                                <img src="{{ asset('storage/' . $logo->file_name) }}"
                                                     class="img-thumbnail rounded"
                                                     style="max-height: 150px;">
                                                <div class="mt-2">
                                                    <small class="text-muted">
                                                        File: {{ $logo->file_name }}
                                                    </small>
                                                </div>
                                            </div>
                                        @endif

                                        {{-- Input upload logo baru --}}
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-image"></i>
                                            </span>
                                            <input type="file"
                                                   name="logo"
                                                   class="form-control-modern"
                                                   accept="image/*">
                                        </div>
                                        <small class="text-muted">
                                            Format: JPG, PNG, SVG, WEBP. Max: 2MB
                                        </small>
                                    </div>

                                    <!-- ================= TOMBOL ACTION ================= -->
                                    <div class="col-12 mt-4">
                                        <div class="d-flex gap-3 justify-content-end">
                                            <button type="submit" class="btn-modern btn-primary-modern">
                                                <i class="fas fa-save me-2"></i>Update Profil
                                            </button>
                                            <a href="{{ route('profil.index') }}" class="btn-modern btn-secondary-modern">
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
            <!-- ================= END CARD FORM ================= -->

        </div>
    </div>
@endsection
