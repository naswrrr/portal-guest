<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>About - Portal Desa Bina Desa</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    {{-- Start CSS --}}
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
    {{-- End CSS --}}
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    {{-- start header --}}
    <!-- Navbar start -->
    <div class="container-fluid fixed-top px-0">
        <div class="container px-0">
            <div class="topbar">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8">
                        <div class="topbar-info d-flex flex-wrap">
                            <a href="mailto:BinaDesa@gmail.com" class="text-light me-4"><i
                                    class="fas fa-envelope text-white me-2"></i>BinaDesa@gmail.com</a>
                            <a href="tel:+01234567890" class="text-light"><i
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
                        <a href="{{ url('/') }}" class="nav-item nav-link">
                            <i class="fas fa-home me-1"></i> Home
                        </a>
                        <a href="{{ route('about') }}" class="nav-item nav-link active">
                            <i class="fas fa-info-circle me-1"></i> About
                        </a>
                        <a href="{{ route('users.index') }}" class="nav-item nav-link">
                            <i class="fas fa-users me-1"></i> User
                        </a>
                        <a href="{{ route('warga.index') }}" class="nav-item nav-link">
                            <i class="fas fa-address-book me-1"></i> Data Warga
                        </a>
                        <a href="{{ route('kategori_berita.index') }}" class="nav-item nav-link">
                            <i class="fas fa-newspaper me-1"></i> Kategori Berita
                        </a>
                        <a href="{{ route('contact') }}" class="nav-item nav-link">
                            <i class="fas fa-phone-alt me-1"></i> Contact
                        </a>

                        {{-- Auth Section --}}
                        @auth
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                    <i class="fas fa-user me-1"></i> {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-user-cog me-2"></i> Profile
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-cog me-2"></i> Settings
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                    <i class="fas fa-user-circle me-1"></i> Account
                                </a>
                                <div class="dropdown-menu">
                                    <a href="{{ route('login') }}" class="dropdown-item">
                                        <i class="fas fa-sign-in-alt me-2"></i> Login
                                    </a>
                                    <a href="{{ route('register') }}" class="dropdown-item">
                                        <i class="fas fa-user-plus me-2"></i> Register
                                    </a>
                                </div>
                            </div>
                        @endauth
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-12 text-center">
                    <h1 class="display-3 text-white animated slideInDown mb-4">Tentang Sistem</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Overview Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <div class="h-100">
                        <img src="{{ asset('assets-guest/img/carousel-1.jpg') }}" class="img-fluid" alt="Image">
                    </div>
                </div>
                <div class="col-lg-6">
                    <h5 class="text-uppercase text-primary">Overview Sistem</h5>
                    <h1 class="mb-4">Portal Bina Desa - Sistem Terintegrasi</h1>
                    <p class="mb-4">Portal Bina Desa adalah platform digital terpadu yang dirancang untuk mengoptimalkan pengelolaan administrasi desa, meningkatkan transparansi, dan mempermudah akses informasi bagi seluruh warga.</p>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check text-primary me-3"></i>
                                <span>Manajemen Data Warga</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check text-primary me-3"></i>
                                <span>Sistem Berita Terkini</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check text-primary me-3"></i>
                                <span>Manajemen Pengguna</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check text-primary me-3"></i>
                                <span>Kategori Berita Terorganisir</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Overview End -->

    <!-- Modules Start -->
    <div class="container-fluid py-5 bg-light">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5" style="max-width: 800px;">
                <h5 class="text-uppercase text-primary">Modul Sistem</h5>
                <h1 class="mb-4">Fitur dan Modul yang Tersedia</h1>
                <p class="mb-0">Berikut adalah modul-modul utama yang mendukung operasional Portal Bina Desa</p>
            </div>
            <div class="row g-4">
                <!-- Modul 1: Manajemen User -->
                <div class="col-lg-6">
                    <div class="service-item bg-white p-4 rounded">
                        <div class="d-flex align-items-center mb-4">
                            <div class="service-icon bg-primary rounded-circle p-3 me-4">
                                <i class="fas fa-users fa-2x text-white"></i>
                            </div>
                            <h4 class="mb-0">Manajemen User</h4>
                        </div>
                        <h6 class="text-primary mb-3">Tujuan:</h6>
                        <p class="mb-3">Mengelola akses dan hak pengguna sistem dengan tingkat otorisasi yang berbeda.</p>
                        <h6 class="text-primary mb-3">Alur Kerja:</h6>
                        <ul class="mb-3">
                            <li>Registrasi pengguna baru</li>
                            <li>Verifikasi dan aktivasi akun</li>
                            <li>Penetapan role dan permission</li>
                            <li>Monitoring aktivitas pengguna</li>
                        </ul>
                        <img src="{{ asset('assets-guest/img/user-management.jpg') }}" class="img-fluid rounded mb-3" alt="Manajemen User">
                    </div>
                </div>

                <!-- Modul 2: Data Warga -->
                <div class="col-lg-6">
                    <div class="service-item bg-white p-4 rounded">
                        <div class="d-flex align-items-center mb-4">
                            <div class="service-icon bg-success rounded-circle p-3 me-4">
                                <i class="fas fa-address-book fa-2x text-white"></i>
                            </div>
                            <h4 class="mb-0">Data Warga</h4>
                        </div>
                        <h6 class="text-primary mb-3">Tujuan:</h6>
                        <p class="mb-3">Mencatat dan mengelola data kependudukan warga desa secara digital dan terstruktur.</p>
                        <h6 class="text-primary mb-3">Alur Kerja:</h6>
                        <ul class="mb-3">
                            <li>Input data warga baru</li>
                            <li>Update data perubahan</li>
                            <li>Pencarian dan filtering data</li>
                            <li>Ekspor data untuk keperluan administrasi</li>
                        </ul>
                        <img src="{{ asset('assets-guest/img/data-warga.jpg') }}" class="img-fluid rounded mb-3" alt="Data Warga">
                    </div>
                </div>

                <!-- Modul 3: Kategori Berita -->
                <div class="col-lg-6">
                    <div class="service-item bg-white p-4 rounded">
                        <div class="d-flex align-items-center mb-4">
                            <div class="service-icon bg-warning rounded-circle p-3 me-4">
                                <i class="fas fa-newspaper fa-2x text-white"></i>
                            </div>
                            <h4 class="mb-0">Kategori Berita</h4>
                        </div>
                        <h6 class="text-primary mb-3">Tujuan:</h6>
                        <p class="mb-3">Mengorganisir dan mempublikasikan informasi desa secara terstruktur berdasarkan kategori.</p>
                        <h6 class="text-primary mb-3">Alur Kerja:</h6>
                        <ul class="mb-3">
                            <li>Membuat kategori berita</li>
                            <li>Publikasi informasi terkini</li>
                            <li>Klasifikasi konten berita</li>
                            <li>Distribusi informasi kepada warga</li>
                        </ul>
                        <img src="{{ asset('assets-guest/img/kategori-berita.jpg') }}" class="img-fluid rounded mb-3" alt="Kategori Berita">
                    </div>
                </div>

                <!-- Modul 4: Authentication -->
                <div class="col-lg-6">
                    <div class="service-item bg-white p-4 rounded">
                        <div class="d-flex align-items-center mb-4">
                            <div class="service-icon bg-danger rounded-circle p-3 me-4">
                                <i class="fas fa-shield-alt fa-2x text-white"></i>
                            </div>
                            <h4 class="mb-0">Sistem Keamanan</h4>
                        </div>
                        <h6 class="text-primary mb-3">Tujuan:</h6>
                        <p class="mb-3">Memastikan keamanan data dan akses yang terjamin untuk seluruh pengguna sistem.</p>
                        <h6 class="text-primary mb-3">Alur Kerja:</h6>
                        <ul class="mb-3">
                            <li>Proses login dan registrasi</li>
                            <li>Enkripsi data sensitif</li>
                            <li>Manajemen session pengguna</li>
                            <li>Backup data berkala</li>
                        </ul>
                        <img src="{{ asset('assets-guest/img/security-system.jpg') }}" class="img-fluid rounded mb-3" alt="Sistem Keamanan">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modules End -->

    <!-- Workflow Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5" style="max-width: 800px;">
                <h5 class="text-uppercase text-primary">Alur Sistem</h5>
                <h1 class="mb-4">Bagaimana Sistem Bekerja</h1>
                <p class="mb-0">Berikut adalah alur kerja terintegrasi dari Portal Bina Desa</p>
            </div>
            <div class="row g-4">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body p-5">
                            <div class="row text-center">
                                <div class="col-lg-3 col-md-6 mb-4">
                                    <div class="workflow-step">
                                        <div class="step-number bg-primary rounded-circle mx-auto mb-3">1</div>
                                        <h5>Registrasi</h5>
                                        <p>Pengguna mendaftar dan mendapatkan akses</p>
                                        <i class="fas fa-user-plus fa-2x text-primary mt-3"></i>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 mb-4">
                                    <div class="workflow-step">
                                        <div class="step-number bg-success rounded-circle mx-auto mb-3">2</div>
                                        <h5>Input Data</h5>
                                        <p>Memasukkan data warga dan informasi</p>
                                        <i class="fas fa-database fa-2x text-success mt-3"></i>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 mb-4">
                                    <div class="workflow-step">
                                        <div class="step-number bg-warning rounded-circle mx-auto mb-3">3</div>
                                        <h5>Manajemen</h5>
                                        <p>Mengelola dan mengorganisir data</p>
                                        <i class="fas fa-tasks fa-2x text-warning mt-3"></i>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 mb-4">
                                    <div class="workflow-step">
                                        <div class="step-number bg-info rounded-circle mx-auto mb-3">4</div>
                                        <h5>Publikasi</h5>
                                        <p>Menyebarkan informasi kepada warga</p>
                                        <i class="fas fa-bullhorn fa-2x text-info mt-3"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Workflow End -->

    <!-- Benefits Start -->
    <div class="container-fluid py-5 bg-light">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5" style="max-width: 800px;">
                <h5 class="text-uppercase text-primary">Manfaat</h5>
                <h1 class="mb-4">Keuntungan Menggunakan Portal Bina Desa</h1>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="benefit-item text-center p-4">
                        <div class="benefit-icon bg-primary rounded-circle p-4 mx-auto mb-4">
                            <i class="fas fa-bolt fa-2x text-white"></i>
                        </div>
                        <h5>Efisiensi Waktu</h5>
                        <p>Proses administrasi menjadi lebih cepat dan terorganisir</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="benefit-item text-center p-4">
                        <div class="benefit-icon bg-success rounded-circle p-4 mx-auto mb-4">
                            <i class="fas fa-chart-line fa-2x text-white"></i>
                        </div>
                        <h5>Transparansi</h5>
                        <p>Data dan informasi dapat diakses dengan mudah oleh warga</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="benefit-item text-center p-4">
                        <div class="benefit-icon bg-warning rounded-circle p-4 mx-auto mb-4">
                            <i class="fas fa-database fa-2x text-white"></i>
                        </div>
                        <h5>Data Terpusat</h5>
                        <p>Seluruh data tersimpan secara terintegrasi dan aman</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="benefit-item text-center p-4">
                        <div class="benefit-icon bg-info rounded-circle p-4 mx-auto mb-4">
                            <i class="fas fa-mobile-alt fa-2x text-white"></i>
                        </div>
                        <h5>Akses Mudah</h5>
                        <p>Dapat diakses kapan saja dan dari mana saja</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Benefits End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-md-4 text-center text-md-start mb-md-0">
                    <span class="text-body"><a href="#"><i class="fas fa-copyright text-light me-2"></i>Portal
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
                        <a href="#" class="btn-hover-color btn-square text-white me-2"><i
                                class="fab fa-pinterest"></i></a>
                        <a href="#" class="btn-hover-color btn-square text-white me-0"><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-md-4 text-center text-md-end text-body">
                    Portal Bina Desa &copy; 2024
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
    <script src="{{ asset('assets-guest/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets-guest/lib/lightbox/js/lightbox.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets-guest/js/main.js') }}"></script>

    <script>
        // Temporary JS to hide spinner
        $(document).ready(function() {
            // Remove spinner if exists
            $('#spinner').remove();
        });
    </script>

</body>

</html>
