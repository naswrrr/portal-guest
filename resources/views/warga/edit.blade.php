<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Portal Bina Desa - Edit Data Warga</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    {{-- start css --}}
    @include('layouts.warga.css')
    {{-- end css --}}
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <div class="container-fluid fixed-top px-0">
        <div class="container px-0">
            <div class="topbar">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8">
                        <div class="topbar-info d-flex flex-wrap">
                            <a href="#" class="text-light me-4">
                                <i class="fas fa-envelope text-white me-2"></i>BinaDesa@gmail.com
                            </a>
                            <a href="#" class="text-light">
                                <i class="fas fa-phone-alt text-white me-2"></i>+01234567890
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="topbar-icon d-flex align-items-center justify-content-end">
                            <a href="#" class="btn-square text-white me-2"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="btn-square text-white me-2"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="btn-square text-white me-2"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-light bg-light navbar-expand-xl">
                <a href="{{ url('/') }}" class="navbar-brand ms-3">
                    <h1 class="text-primary display-5">Portal Bina Desa</h1>
                </a>
                <button class="navbar-toggler py-2 px-3 me-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-light" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
                        <a href="{{ route('users.index') }}" class="nav-item nav-link">User</a>
                        <a href="{{ route('warga.index') }}" class="nav-item nav-link active">Data Warga</a>
                        <a href="{{ url('/kategori_berita') }}" class="nav-item nav-link">Kategori Berita</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Content Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <!-- Page Header Start -->
            <div class="container-fluid page-header py-5 mb-5">
                <div class="container py-5">
                    <div class="text-center mx-auto pb-5" style="max-width: 800px;">
                        <h5 class="text-uppercase text-primary">Manajemen Data</h5>
                        <h1 class="mb-4">Edit Data Warga</h1>
                        <p class="mb-0">Perbarui informasi data warga desa</p>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->

            <!-- Card Utama -->
            <div class="card border-0 shadow">
                <div class="card-header bg-primary text-white py-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0"><i class="fas fa-user-edit me-2"></i>Form Edit Warga</h4>
                        <a href="{{ route('warga.index') }}" class="btn-hover-bg btn btn-light text-primary py-2 px-4">
                            <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar
                        </a>
                    </div>
                </div>
                <div class="card-body p-4">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <strong>Terjadi kesalahan!</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('warga.update', $warga->warga_id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <!-- NAMA LENGKAP -->
                            <div class="col-12 mb-4">
                                <label for="nama" class="form-label fw-bold">Nama Lengkap <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-primary text-white">
                                        <i class="fas fa-user"></i>
                                    </span>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        id="nama" name="nama" value="{{ old('nama', $warga->nama) }}"
                                        placeholder="Masukkan nama lengkap" required>
                                </div>
                                @error('nama')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- NIK -->
                            <div class="col-md-6 mb-4">
                                <label for="nik" class="form-label fw-bold">NIK <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-primary text-white">
                                        <i class="fas fa-id-card"></i>
                                    </span>
                                    <input type="text" class="form-control @error('nik') is-invalid @enderror"
                                        id="nik" name="nik" value="{{ old('nik', $warga->nik) }}"
                                        placeholder="Masukkan 16 digit NIK" maxlength="16" required>
                                </div>
                                @error('nik')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">* Harus 16 digit dan unik</small>
                            </div>

                            <!-- NO KK -->
                            <div class="col-md-6 mb-4">
                                <label for="no_kk" class="form-label fw-bold">No. KK <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-primary text-white">
                                        <i class="fas fa-house-user"></i>
                                    </span>
                                    <input type="text" class="form-control @error('no_kk') is-invalid @enderror"
                                        id="no_kk" name="no_kk" value="{{ old('no_kk', $warga->no_kk) }}"
                                        placeholder="Masukkan 16 digit No. KK" maxlength="16" required>
                                </div>
                                @error('no_kk')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">* Harus 16 digit</small>
                            </div>

                            <!-- JENIS KELAMIN -->
                            <div class="col-md-6 mb-4">
                                <label for="jenis_kelamin" class="form-label fw-bold">Jenis Kelamin <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-primary text-white">
                                        <i class="fas fa-venus-mars"></i>
                                    </span>
                                    <select class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                        id="jenis_kelamin" name="jenis_kelamin" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki"
                                            {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                                            Laki-laki</option>
                                        <option value="Perempuan"
                                            {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                            Perempuan</option>
                                    </select>
                                </div>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- TEMPAT LAHIR -->
                            <div class="col-md-6 mb-4">
                                <label for="tempat_lahir" class="form-label fw-bold">Tempat Lahir</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-primary text-white">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </span>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                        value="{{ old('tempat_lahir', $warga->tempat_lahir ?? '') }}"
                                        placeholder="Masukkan tempat lahir">
                                </div>
                            </div>

                            <!-- ALAMAT -->
                            <div class="col-12 mb-4">
                                <label for="alamat" class="form-label fw-bold">Alamat Lengkap <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-primary text-white">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </span>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="4"
                                        placeholder="Masukkan alamat lengkap" required>{{ old('alamat', $warga->alamat) }}</textarea>
                                </div>
                                @error('alamat')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- TOMBOL SUBMIT -->
                            <div class="col-12 mt-4">
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn-hover-bg btn btn-primary text-white py-2 px-4">
                                        <i class="fas fa-save me-2"></i>Update Data Warga
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Content End -->

    {{-- start footer --}}
    @include('layouts.warga.footer')
    {{-- end footer --}}

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top">
        <i class="fa fa-arrow-up"></i>
    </a>

    {{-- start js --}}
    @include('layouts.warga.js')
    {{-- end js --}}

    <script>
        $(document).ready(function() {
            // Remove spinner
            $('#spinner').remove();

            // Auto focus pada field pertama
            document.getElementById('nama').focus();

            // Validasi input NIK dan No KK hanya angka
            document.getElementById('nik').addEventListener('input', function(e) {
                this.value = this.value.replace(/[^0-9]/g, '');
            });

            document.getElementById('no_kk').addEventListener('input', function(e) {
                this.value = this.value.replace(/[^0-9]/g, '');
            });
        });
    </script>

</body>

</html>
