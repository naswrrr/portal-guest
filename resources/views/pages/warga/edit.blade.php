{{-- Menggunakan layout utama guest --}}
@extends('layouts.guest.app')

{{-- Memulai section content --}}
@section('content')

    {{-- Memanggil navbar guest --}}
    @include('layouts.guest.navbar')

    {{-- Container utama halaman --}}
    <div class="container-fluid content-section">
        <div class="container py-5">

            <!-- ================= HEADER HALAMAN ================= -->
            <!-- Menampilkan judul dan deskripsi halaman edit warga -->
            <div class="page-header-modern text-center mb-5">
                <div class="header-icon">
                    {{-- Icon header --}}
                    <i class="fas fa-user-edit"></i>
                </div>
                <h5 class="text-primary fw-bold text-uppercase mb-2">Edit Data Warga</h5>
                <h1 class="display-4 fw-bold mb-3">Perbarui Informasi Warga</h1>
                <p class="text-muted fs-5 mb-0">
                    Update data warga desa dengan informasi terbaru
                </p>
            </div>

            <!-- ================= ACTION BAR ================= -->
            <!-- Berisi judul halaman kecil dan tombol kembali -->
            <div class="action-bar mb-4">
                <div class="action-left">
                    <h4 class="mb-0 fw-bold text-dark">
                        <i class="fas fa-user-edit me-2 text-primary"></i>
                        Edit Data Warga
                    </h4>
                    {{-- Menampilkan nama warga yang sedang diedit --}}
                    <p class="text-muted mb-0 mt-1">
                        Perbarui informasi data warga {{ $warga->nama }}
                    </p>
                </div>

                {{-- Tombol kembali ke halaman daftar warga --}}
                <div class="action-right">
                    <a href="{{ route('warga.index') }}" class="btn-modern btn-secondary-modern">
                        <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar
                    </a>
                </div>
            </div>

            <!-- ================= VALIDASI ERROR ================= -->
            {{-- Menampilkan error validasi jika ada --}}
            @if ($errors->any())
                <div class="alert alert-modern alert-danger alert-dismissible fade show mb-4" role="alert">
                    <div class="alert-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="alert-content">
                        <strong>Terjadi Kesalahan!</strong>
                        {{-- Menampilkan daftar error --}}
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

            <!-- ================= FORM EDIT DATA ================= -->
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card-modern card-edit">

                        <!-- Header card -->
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-user-edit"></i>
                                <h5>Form Edit Data Warga</h5>
                            </div>
                        </div>

                        <!-- Body card -->
                        <div class="card-body p-4">

                            {{-- Form update data warga --}}
                            <form action="{{ route('warga.update', $warga->warga_id) }}"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                {{-- Method PUT untuk update --}}
                                @method('PUT')

                                <div class="row g-4">

                                    <!-- ===== NAMA ===== -->
                                    <div class="col-12">
                                        <label class="form-label-modern">Nama Lengkap *</label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-user"></i>
                                            </span>
                                            {{-- Input nama warga --}}
                                            <input type="text"
                                                   name="nama"
                                                   class="form-control-modern"
                                                   value="{{ old('nama', $warga->nama) }}"
                                                   required>
                                        </div>
                                    </div>

                                    <!-- ===== NO KTP ===== -->
                                    <div class="col-md-6">
                                        <label class="form-label-modern">No. KTP *</label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-id-card"></i>
                                            </span>
                                            {{-- Input nomor KTP --}}
                                            <input type="text"
                                                   name="no_ktp"
                                                   class="form-control-modern"
                                                   value="{{ old('no_ktp', $warga->no_ktp) }}"
                                                   maxlength="16"
                                                   required>
                                        </div>
                                    </div>

                                    <!-- ===== JENIS KELAMIN ===== -->
                                    <div class="col-md-6">
                                        <label class="form-label-modern">Jenis Kelamin *</label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-venus-mars"></i>
                                            </span>
                                            {{-- Dropdown jenis kelamin --}}
                                            <select name="jenis_kelamin"
                                                    class="form-control-modern"
                                                    required>
                                                <option value="">Pilih</option>
                                                <option value="Laki-laki"
                                                    {{ $warga->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                                    Laki-laki
                                                </option>
                                                <option value="Perempuan"
                                                    {{ $warga->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                                    Perempuan
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- ===== AGAMA ===== -->
                                    <div class="col-md-6">
                                        <label class="form-label-modern">Agama *</label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-pray"></i>
                                            </span>
                                            {{-- Input agama --}}
                                            <input type="text"
                                                   name="agama"
                                                   class="form-control-modern"
                                                   value="{{ old('agama', $warga->agama) }}"
                                                   required>
                                        </div>
                                    </div>

                                    <!-- ===== PEKERJAAN ===== -->
                                    <div class="col-md-6">
                                        <label class="form-label-modern">Pekerjaan *</label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-briefcase"></i>
                                            </span>
                                            {{-- Input pekerjaan --}}
                                            <input type="text"
                                                   name="pekerjaan"
                                                   class="form-control-modern"
                                                   value="{{ old('pekerjaan', $warga->pekerjaan) }}"
                                                   required>
                                        </div>
                                    </div>

                                    <!-- ===== TELEPON ===== -->
                                    <div class="col-md-6">
                                        <label class="form-label-modern">Telepon</label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-phone"></i>
                                            </span>
                                            {{-- Input nomor telepon --}}
                                            <input type="text"
                                                   name="telp"
                                                   class="form-control-modern"
                                                   value="{{ old('telp', $warga->telp) }}">
                                        </div>
                                    </div>

                                    <!-- ===== EMAIL ===== -->
                                    <div class="col-md-6">
                                        <label class="form-label-modern">Email</label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-envelope"></i>
                                            </span>
                                            {{-- Input email --}}
                                            <input type="email"
                                                   name="email"
                                                   class="form-control-modern"
                                                   value="{{ old('email', $warga->email) }}">
                                        </div>
                                    </div>

                                    <!-- ===== BUTTON ===== -->
                                    <div class="col-12 mt-4 d-flex justify-content-end gap-3">
                                        {{-- Tombol submit update --}}
                                        <button type="submit" class="btn-modern btn-primary-modern">
                                            <i class="fas fa-save me-2"></i>Update Data
                                        </button>

                                        {{-- Tombol batal --}}
                                        <a href="{{ route('warga.index') }}"
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

        </div>
    </div>

{{-- Menutup section content --}}
@endsection
