<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Tentang Kami - Portal Bina Desa</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    {{-- Start CSS --}}
    @include('layouts.guest.css')
    {{-- End CSS --}}

    <style>
        body {
            background: #f8f9fa;
        }

        .page-header-modern {
            padding: 3rem 0;
            background: #f8f9fa;
            border-radius: 10px;
            margin-bottom: 3rem;
            /* Border dihilangkan */
            border: none;
        }

        .header-icon {
            font-size: 3rem;
            color: #3498db;
            margin-bottom: 1rem;
        }

        .content-section {
            background: #f8f9fa;
        }

        .card-modern {
            border: none; /* Border dihilangkan */
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
            background: white;
        }

        .card-header-modern {
            background: #3498db;
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 10px 10px 0 0 !important;
            border: none; /* Border dihilangkan */
        }

        .header-content {
            display: flex;
            align-items: center;
        }

        .header-content i {
            font-size: 1.2rem;
            margin-right: 10px;
        }

        .card-warga {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
            margin-bottom: 1.5rem;
            border: none; /* Border dihilangkan */
        }

        .card-warga-header {
            padding: 1.5rem;
            background: #f8f9fa;
            display: flex;
            align-items: center;
            border-bottom: none; /* Border dihilangkan */
        }

        .user-avatar-modern {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #3498db;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: white;
            font-size: 1.2rem;
        }

        .user-info h6 {
            margin: 0;
            font-weight: 600;
            color: #2c3e50;
        }

        .badge-gender {
            padding: 0.3rem 0.7rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .badge-male {
            background-color: rgba(52, 152, 219, 0.15);
            color: #3498db;
        }

        .badge-female {
            background-color: rgba(231, 76, 60, 0.15);
            color: #e74c3c;
        }

        .card-warga-body {
            padding: 1.5rem;
            background: white;
        }

        .info-item {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .info-item:last-child {
            margin-bottom: 0;
        }

        .info-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            color: white;
            font-size: 1rem;
        }

        .info-label {
            display: block;
            font-size: 0.8rem;
            color: #6c757d;
            margin-bottom: 2px;
        }

        .info-value {
            display: block;
            font-weight: 500;
            color: #2c3e50;
        }

        .card-warga-footer {
            padding: 1rem 1.5rem;
            background: #f8f9fa;
            border-top: none; /* Border dihilangkan */
            display: flex;
            gap: 10px;
        }

        .btn-action {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            font-size: 0.8rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 5px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-action-edit {
            background: #3498db;
            color: white;
        }

        .btn-action-edit:hover {
            background: #2980b9;
            color: white;
        }

        .btn-action-delete {
            background: #e74c3c;
            color: white;
        }

        .btn-action-delete:hover {
            background: #c0392b;
            color: white;
        }

        .action-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            background: #f8f9fa;
            padding: 1rem 1.5rem;
            border-radius: 10px;
            border: none; /* Border dihilangkan */
        }

        .action-left h4 {
            color: #2c3e50;
        }

        .btn-modern {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 5px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-primary-modern {
            background: #3498db;
            color: white;
        }

        .btn-primary-modern:hover {
            background: #2980b9;
            color: white;
        }

        .btn-secondary-modern {
            background: #95a5a6;
            color: white;
        }

        .btn-secondary-modern:hover {
            background: #7f8c8d;
            color: white;
        }

        .empty-state-modern {
            text-align: center;
            padding: 3rem 2rem;
            background: #f8f9fa;
            border-radius: 10px;
            border: none; /* Border dihilangkan */
        }

        .empty-icon {
            font-size: 4rem;
            color: #bdc3c7;
            margin-bottom: 1rem;
        }

        .empty-title {
            color: #2c3e50;
            margin-bottom: 1rem;
        }

        .empty-text {
            color: #7f8c8d;
            margin-bottom: 2rem;
        }

        .form-control-modern {
            border: 1px solid #dee2e6; /* Tetap ada untuk form */
            border-radius: 5px;
            padding: 0.75rem;
            width: 100%;
            background: white;
        }

        .form-control-modern:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
        }

        .input-group-modern {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #7f8c8d;
            z-index: 3;
        }

        .input-group-modern .form-control-modern {
            padding-left: 40px;
        }

        .textarea-icon {
            top: 20px;
            transform: none;
        }

        .form-label-modern {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }

        .alert-modern {
            border: none; /* Border dihilangkan */
            border-radius: 10px;
            padding: 1rem 1.5rem;
        }

        .alert-success {
            background: rgba(46, 204, 113, 0.15);
            color: #27ae60;
        }

        .alert-icon {
            margin-right: 10px;
        }

        .benefit-icon {
            width: 70px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Menghilangkan border dari semua elemen yang mungkin masih ada */
        .card {
            border: none;
        }

        .card-header {
            border: none;
        }

        .card-body {
            border: none;
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

    {{-- start header --}}
    @include('layouts.guest.navbar', ['activePage' => 'about'])

    <!-- Content Start -->
    <div class="container-fluid content-section">
        <div class="container py-5">

            <!-- Page Header Start -->
            <div class="page-header-modern text-center mb-5">
                <div class="header-icon">
                    <i class="fas fa-info-circle"></i>
                </div>
                <h5 class="text-primary fw-bold text-uppercase mb-2">Tentang Sistem</h5>
                <h1 class="display-4 fw-bold mb-3">Portal Bina Desa</h1>
                <p class="text-muted fs-5 mb-0">Sistem terintegrasi untuk pengelolaan desa yang modern dan efisien</p>
            </div>
            <!-- Page Header End -->

            <!-- Overview Section -->
            <div class="row justify-content-center mb-5">
                <div class="col-lg-10">
                    <div class="card-modern">
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-desktop"></i>
                                <h5>Overview Sistem</h5>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-4 align-items-center">
                                <div class="col-lg-6">
                                    <img src="{{ asset('assets-guest/img/carousel-1.jpg') }}"
                                        class="img-fluid rounded-3 shadow" alt="Portal Bina Desa">
                                </div>
                                <div class="col-lg-6">
                                    <h4 class="fw-bold mb-3">Sistem Terintegrasi untuk Desa Modern</h4>
                                    <p class="mb-4">Portal Bina Desa adalah platform digital terpadu yang dirancang
                                        untuk mengoptimalkan pengelolaan administrasi desa, meningkatkan transparansi,
                                        dan mempermudah akses informasi bagi seluruh warga.</p>

                                    <div class="row g-3">
                                        <div class="col-sm-6">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="feature-icon bg-primary rounded-circle p-2 me-3">
                                                    <i class="fas fa-check text-white"></i>
                                                </div>
                                                <span>Manajemen Data Warga</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="feature-icon bg-primary rounded-circle p-2 me-3">
                                                    <i class="fas fa-check text-white"></i>
                                                </div>
                                                <span>Sistem Berita Terkini</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="feature-icon bg-primary rounded-circle p-2 me-3">
                                                    <i class="fas fa-check text-white"></i>
                                                </div>
                                                <span>Manajemen Pengguna</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="feature-icon bg-primary rounded-circle p-2 me-3">
                                                    <i class="fas fa-check text-white"></i>
                                                </div>
                                                <span>Kategori Berita Terorganisir</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Bar -->
            <div class="action-bar mb-4">
                <div class="action-left">
                    <h4 class="mb-0 fw-bold text-dark">
                        <i class="fas fa-cogs me-2 text-primary"></i>
                        Fitur Utama Sistem
                    </h4>
                    <p class="text-muted mb-0 mt-1">Modul-modul yang mendukung operasional desa</p>
                </div>
            </div>

            <!-- Card Grid -->
            <div class="row g-4">
                <!-- Feature 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card-warga">
                        <div class="card-warga-header">
                            <div class="user-avatar-modern">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="user-info">
                                <h6 class="user-name">Manajemen User</h6>
                                <span class="badge-gender badge-male">
                                    <i class="fas fa-user-shield me-1"></i>
                                    Admin System
                                </span>
                            </div>
                        </div>
                        <div class="card-warga-body">
                            <div class="info-item">
                                <div class="info-icon bg-primary">
                                    <i class="fas fa-tasks"></i>
                                </div>
                                <div class="info-content">
                                    <span class="info-label">Fungsi</span>
                                    <span class="info-value">Mengelola akses dan hak pengguna sistem</span>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon bg-success">
                                    <i class="fas fa-list-check"></i>
                                </div>
                                <div class="info-content">
                                    <span class="info-label">Fitur</span>
                                    <span class="info-value">Registrasi, Role Management, Monitoring</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card-warga">
                        <div class="card-warga-header">
                            <div class="user-avatar-modern">
                                <i class="fas fa-address-book"></i>
                            </div>
                            <div class="user-info">
                                <h6 class="user-name">Data Warga</h6>
                                <span class="badge-gender badge-male">
                                    <i class="fas fa-database me-1"></i>
                                    Data Management
                                </span>
                            </div>
                        </div>
                        <div class="card-warga-body">
                            <div class="info-item">
                                <div class="info-icon bg-primary">
                                    <i class="fas fa-people-roof"></i>
                                </div>
                                <div class="info-content">
                                    <span class="info-label">Fungsi</span>
                                    <span class="info-value">Mengelola data kependudukan warga desa</span>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon bg-success">
                                    <i class="fas fa-sliders"></i>
                                </div>
                                <div class="info-content">
                                    <span class="info-label">Fitur</span>
                                    <span class="info-value">CRUD Data, Pencarian, Ekspor Data</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card-warga">
                        <div class="card-warga-header">
                            <div class="user-avatar-modern">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <div class="user-info">
                                <h6 class="user-name">Kategori Berita</h6>
                                <span class="badge-gender badge-male">
                                    <i class="fas fa-tags me-1"></i>
                                    Content Management
                                </span>
                            </div>
                        </div>
                        <div class="card-warga-body">
                            <div class="info-item">
                                <div class="info-icon bg-primary">
                                    <i class="fas fa-bullhorn"></i>
                                </div>
                                <div class="info-content">
                                    <span class="info-label">Fungsi</span>
                                    <span class="info-value">Mengorganisir informasi desa secara terstruktur</span>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon bg-success">
                                    <i class="fas fa-layer-group"></i>
                                </div>
                                <div class="info-content">
                                    <span class="info-label">Fitur</span>
                                    <span class="info-value">Kategori, Publikasi, Klasifikasi Konten</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Benefits Section -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card-modern">
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-star"></i>
                                <h5>Manfaat Menggunakan Sistem</h5>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-4">
                                <div class="col-md-6 col-lg-3">
                                    <div class="text-center p-3">
                                        <div class="benefit-icon bg-primary rounded-circle p-3 mx-auto mb-3">
                                            <i class="fas fa-bolt fa-2x text-white"></i>
                                        </div>
                                        <h6 class="fw-bold mb-2">Efisiensi Waktu</h6>
                                        <p class="small text-muted mb-0">Proses administrasi menjadi lebih cepat dan
                                            terorganisir</p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="text-center p-3">
                                        <div class="benefit-icon bg-success rounded-circle p-3 mx-auto mb-3">
                                            <i class="fas fa-chart-line fa-2x text-white"></i>
                                        </div>
                                        <h6 class="fw-bold mb-2">Transparansi</h6>
                                        <p class="small text-muted mb-0">Data dan informasi dapat diakses dengan mudah
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="text-center p-3">
                                        <div class="benefit-icon bg-warning rounded-circle p-3 mx-auto mb-3">
                                            <i class="fas fa-database fa-2x text-white"></i>
                                        </div>
                                        <h6 class="fw-bold mb-2">Data Terpusat</h6>
                                        <p class="small text-muted mb-0">Seluruh data tersimpan secara terintegrasi</p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="text-center p-3">
                                        <div class="benefit-icon bg-info rounded-circle p-3 mx-auto mb-3">
                                            <i class="fas fa-mobile-alt fa-2x text-white"></i>
                                        </div>
                                        <h6 class="fw-bold mb-2">Akses Mudah</h6>
                                        <p class="small text-muted mb-0">Dapat diakses kapan saja dan dari mana saja
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Content End -->

    <!-- Copyright Start -->
    @include('layouts.guest.footer')
    <!-- Copyright End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top">
        <i class="fa fa-arrow-up"></i>
    </a>

    <!-- JavaScript Libraries -->
    @include('layouts.guest.js')

    <script>
        $(document).ready(function() {
            // Remove spinner if exists
            $('#spinner').remove();
        });
    </script>

</body>

</html>
