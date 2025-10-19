<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Portal Bina Desa - Data Warga</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets-guest/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets-guest/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets-guest/css/style.css') }}" rel="stylesheet">

    <!-- Fix CSS -->
    <style>
        /* FIX UNTUK NAVBAR DAN SPACING SESUAI TEMPLATE */
        body {
            padding-top: 0 !important;
        }

        .fixed-top {
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1030;
        }

        /* Beri margin top untuk konten utama */
        .page-header {
            margin-top: 120px;
        }

        /* Hilangkan space berlebihan */
        .container-fluid.page-header {
            padding-top: 2rem !important;
            padding-bottom: 2rem !important;
        }

        .container-fluid.py-5 {
            padding-top: 1rem !important;
            padding-bottom: 1rem !important;
        }
    </style>
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar start -->
    <div class="container-fluid fixed-top px-0">
        <div class="container px-0">
            <div class="topbar">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8">
                        <div class="topbar-info d-flex flex-wrap">
                            <a href="#" class="text-light me-4"><i
                                    class="fas fa-envelope text-white me-2"></i>BinaDesa@gmail.com</a>
                            <a href="#" class="text-light"><i
                                    class="fas fa-phone-alt text-white me-2"></i>+01234567890</a>
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
                        <a href="{{ url('/profil') }}" class="nav-item nav-link">Profil</a>
                        <a href="{{ route('warga.index') }}" class="nav-item nav-link active">Data Warga</a>
                        <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-0">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5" style="max-width: 800px;">
                <h5 class="text-uppercase text-primary">Data Warga</h5>
                <h1 class="mb-4">Kelola Data Warga Desa</h1>
                <p class="mb-0">Kelola informasi data warga desa dengan mudah dan efisien</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Data Warga Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

                                <form action="{{ route('warga.update', $editData->warga_id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="nama_depan" class="form-label fw-bold">Nama Depan <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-primary text-white">
                                                    <i class="fas fa-user"></i>
                                                </span>
                                                <input type="text"
                                                    class="form-control @error('nama_depan') is-invalid @enderror"
                                                    id="nama_depan" name="nama_depan"
                                                    value="{{ old('nama_depan', $editData->nama_depan) }}"
                                                    placeholder="Masukkan nama depan" required>
                                            </div>
                                            @error('nama_depan')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="nama_belakang" class="form-label fw-bold">Nama Belakang <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-primary text-white">
                                                    <i class="fas fa-user"></i>
                                                </span>
                                                <input type="text"
                                                    class="form-control @error('nama_belakang') is-invalid @enderror"
                                                    id="nama_belakang" name="nama_belakang"
                                                    value="{{ old('nama_belakang', $editData->nama_belakang) }}"
                                                    placeholder="Masukkan nama belakang" required>
                                            </div>
                                            @error('nama_belakang')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="tanggal_lahir" class="form-label fw-bold">Tanggal Lahir <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-primary text-white">
                                                    <i class="fas fa-calendar"></i>
                                                </span>
                                                <input type="date"
                                                    class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                    id="tanggal_lahir" name="tanggal_lahir"
                                                    value="{{ old('tanggal_lahir', $editData->tanggal_lahir) }}"
                                                    required>
                                            </div>
                                            @error('tanggal_lahir')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="jenis_kelamin" class="form-label fw-bold">Jenis Kelamin <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-primary text-white">
                                                    <i class="fas fa-venus-mars"></i>
                                                </span>
                                                <select
                                                    class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                                    id="jenis_kelamin" name="jenis_kelamin" required>
                                                    <option value="">Pilih Jenis Kelamin</option>
                                                    <option value="Laki-laki"
                                                        {{ old('jenis_kelamin', $editData->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                                                        Laki-laki</option>
                                                    <option value="Perempuan"
                                                        {{ old('jenis_kelamin', $editData->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                                        Perempuan</option>
                                                </select>
                                            </div>
                                            @error('jenis_kelamin')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="email" class="form-label fw-bold">Email</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-primary text-white">
                                                    <i class="fas fa-envelope"></i>
                                                </span>
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    id="email" name="email"
                                                    value="{{ old('email', $editData->email) }}"
                                                    placeholder="Masukkan email">
                                            </div>
                                            @error('email')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="no_telepon" class="form-label fw-bold">No. Telepon</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-primary text-white">
                                                    <i class="fas fa-phone"></i>
                                                </span>
                                                <input type="text"
                                                    class="form-control @error('no_telepon') is-invalid @enderror"
                                                    id="no_telepon" name="no_telepon"
                                                    value="{{ old('no_telepon', $editData->no_telepon) }}"
                                                    placeholder="Masukkan nomor telepon">
                                            </div>
                                            @error('no_telepon')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12 mt-4">
                                            <div class="d-flex justify-content-between">
                                                <a href="{{ route('warga.index') }}"
                                                    class="btn-hover-bg btn btn-secondary text-white py-2 px-4">
                                                    <i class="fas fa-times me-2"></i>Batal Edit
                                                </a>
                                                <button type="submit"
                                                    class="btn-hover-bg btn btn-primary text-white py-2 px-4">
                                                    <i class="fas fa-save me-2"></i>Update Data
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- TOMBOL TAMBAH & TABEL -->
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Daftar Warga</h3>
                        <a href="{{ route('warga.create') }}"
                            class="btn-hover-bg btn btn-primary text-white py-2 px-4">
                            <i class="fas fa-plus me-2"></i>Tambah Warga
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>No KK</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataWarga as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                                    style="width: 40px; height: 40px;">
                                                    <i class="fas fa-user text-white"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">{{ $item->nama }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $item->nik }}</td>
                                        <td>{{ $item->no_kk }}</td>
                                        <td>
                                            <span
                                                class="badge @if ($item->jenis_kelamin == 'Laki-laki') bg-primary @else bg-success @endif">
                                                {{ $item->jenis_kelamin }}
                                            </span>
                                        </td>
                                        <td>{{ Str::limit($item->alamat, 50) }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="{{ route('warga.edit', $item->warga_id) }}"
                                                    class="btn-hover-bg btn btn-warning btn-sm text-white">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('warga.destroy', $item->warga_id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-hover-bg btn btn-danger btn-sm"
                                                        onclick="return confirm('Yakin ingin menghapus data warga ini?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if ($dataWarga->isEmpty())
                        <div class="text-center py-5">
                            <i class="fas fa-users fa-4x text-muted mb-3"></i>
                            <h4 class="text-muted">Belum ada data warga</h4>
                            <p class="text-muted">Silakan tambah data warga terlebih dahulu</p>
                            <a href="{{ route('warga.create') }}" class="btn-hover-bg btn btn-primary text-white">
                                <i class="fas fa-plus me-2"></i>Tambah Warga Pertama
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Copyright Start -->
            <div class="container-fluid copyright py-4">
                <div class="container">
                    <div class="row g-4 align-items-center">
                        <div class="col-md-4 text-center text-md-start mb-md-0">
                            <span class="text-body"><a href="#"><i
                                        class="fas fa-copyright text-light me-2"></i>Portal
                                    Bina Desa</a>, All right
                                reserved.</span>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="d-flex align-items-center justify-content-center">
                                <a href="#" class="btn-hover-color btn-square text-white me-2"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a href="#" class="btn-hover-color btn-square text-white me-2"><i
                                        class="fab fa-twitter"></i></a>
                                <a href="#" class="btn-hover-color btn-square text-white me-2"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Copyright End -->

            <!-- Back to Top -->
            <a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top"><i
                    class="fa fa-arrow-up"></i></a>

            <!-- JavaScript Libraries -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
            <script src="{{ asset('assets-guest/lib/easing/easing.min.js') }}"></script>
            <script src="{{ asset('assets-guest/lib/waypoints/waypoints.min.js') }}"></script>
            <script src="{{ asset('assets-guest/lib/counterup/counterup.min.js') }}"></script>
            <script src="{{ asset('assets-guest/lib/owlcarousel/owl.carousel.min.js') }}"></script>
            <script src="{{ asset('assets-guest/lib/lightbox/js/lightbox.min.js') }}"></script>

            <!-- Template Javascript -->
            <script src="{{ asset('assets-guest/js/main.js') }}"></script>

            <script>
                // Temporary JS to hide spinner
                $(document).ready(function() {
                    // Remove spinner if exists
                    $('#spinner').remove();

                    // Fix untuk navbar toggle
                    $('.navbar-toggler').on('click', function() {
                        $('#navbarCollapse').toggleClass('show');
                    });
                });
            </script>

</body>

</html>
