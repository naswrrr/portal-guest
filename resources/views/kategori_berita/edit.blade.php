<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Portal Bina Desa - Edit Kategori Berita</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Styles (sama seperti create) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="{{ asset('assets-guest/css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        body { padding-top: 0 !important; }
        .fixed-top { position: fixed; top: 0; right: 0; left: 0; z-index: 1030; }
        .page-header { margin-top: 120px; }
    </style>
</head>
<body>

    <!-- Navbar (sama seperti index) -->
    <div class="container-fluid fixed-top px-0">
        <div class="container px-0">
            <div class="topbar">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8">
                        <div class="topbar-info d-flex flex-wrap">
                            <a href="#" class="text-light me-4"><i class="fas fa-envelope text-white me-2"></i>BinaDesa@gmail.com</a>
                            <a href="#" class="text-light"><i class="fas fa-phone-alt text-white me-2"></i>+01234567890</a>
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
                        <a href="{{ route('warga.index') }}" class="nav-item nav-link">Data Warga</a>
                        <a href="{{ url('/kategori_berita') }}" class="nav-item nav-link">Kategori Berita</a>
                        <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Page Header -->
    <div class="container-fluid page-header py-5 mb-0">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5" style="max-width: 800px;">
                <h5 class="text-uppercase text-primary">Manajemen Konten</h5>
                <h1 class="mb-4">Edit Kategori Berita</h1>
                <p class="mb-0">Edit kategori berita untuk portal desa</p>
            </div>
        </div>
    </div>

    <!-- Form Edit -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 shadow">
                        <div class="card-header bg-primary text-white py-4">
                            <h4 class="mb-0 text-center"><i class="fas fa-edit me-2"></i>Form Edit Kategori</h4>
                        </div>
                        <div class="card-body p-5">
                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    <strong>Terjadi kesalahan!</strong>
                                    <ul class="mb-0 mt-2">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            <form action="{{ route('.update', $editData->kategori_id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="nama" class="form-label fw-bold">Nama Kategori</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-primary text-white">
                                                <i class="fas fa-tag"></i>
                                            </span>
                                            <input type="text" class="form-control" id="nama" name="nama"
                                                   value="{{ old('nama', $editData->nama) }}" placeholder="Masukkan nama kategori" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label for="slug" class="form-label fw-bold">Slug</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-primary text-white">
                                                <i class="fas fa-link"></i>
                                            </span>
                                            <input type="text" class="form-control" id="slug"
                                                   value="{{ $editData->slug }}" readonly>
                                        </div>
                                        <small class="text-muted">Slug otomatis di-generate dari nama</small>
                                    </div>

                                    <div class="col-12 mb-4">
                                        <label for="deskripsi" class="form-label fw-bold">Deskripsi</label>
                                        <textarea class="form-control" id="deskripsi" name="deskripsi"
                                                  rows="4" placeholder="Masukkan deskripsi kategori">{{ old('deskripsi', $editData->deskripsi) }}</textarea>
                                    </div>

                                    <div class="col-12 mt-5">
                                        <div class="d-flex justify-content-between">
                                            <a href="{{ route('kategori_berita.index') }}" class="btn btn-secondary py-2 px-4">
                                                <i class="fas fa-arrow-left me-2"></i>Kembali
                                            </a>
                                            <button type="submit" class="btn btn-primary py-2 px-4">
                                                <i class="fas fa-save me-2"></i>Update Kategori
                                            </button>
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

    <!-- Copyright -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-md-4 text-center text-md-start mb-md-0">
                    <span class="text-body"><a href="#"><i class="fas fa-copyright text-light me-2"></i>Portal Bina Desa</a>, All right reserved.</span>
                </div>
                <div class="col-md-4 text-center">
                    <div class="d-flex align-items-center justify-content-center">
                        <a href="#" class="btn-hover-color btn-square text-white me-2"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="btn-hover-color btn-square text-white me-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="btn-hover-color btn-square text-white me-2"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            // Auto generate slug dari nama
            $('#nama').on('input', function() {
                const slug = $(this).val().toLowerCase()
                    .replace(/[^a-z0-9 -]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/-+/g, '-');
                $('#slug').val(slug);
            });
        });
    </script>
</body>
</html>
