<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Portal Desa - Project Bina Desa</title>
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
                        <a href="{{ url('/') }}" class="nav-item nav-link active">
                            <i class="fas fa-home me-1"></i> Home
                        </a>
                        <a href="{{ route('about') }}" class="nav-item nav-link">
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

    <!-- Carousel Start -->
    <div class="container-fluid carousel-header vh-100 px-0">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="{{ asset('assets-guest/img/carousel-1.jpg') }}" class="img-fluid" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Selamat
                                Datang di Portal Desa</h4>
                            <h1 class="display-1 text-capitalize text-white mb-4">Desa Maju Mandiri</h1>
                            <p class="mb-5 fs-5">Portal informasi dan layanan desa untuk memajukan kesejahteraan
                                masyarakat dan pembangunan desa yang berkelanjutan.
                            </p>
                            <div class="d-flex align-items-center justify-content-center">
                                <a class="btn-hover-bg btn btn-primary text-white py-3 px-5"
                                    href="#about">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets-guest/img/carousel-2.jpg') }}" class="img-fluid" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Data
                                Terintegrasi</h4>
                            <h1 class="display-1 text-capitalize text-white mb-4">Warga Desa</h1>
                            <p class="mb-5 fs-5">Sistem terpadu untuk mengelola data warga, berita, dan informasi desa
                                secara digital dan transparan.
                            </p>
                            <div class="d-flex align-items-center justify-content-center">
                                <a class="btn-hover-bg btn btn-primary text-white py-3 px-5"
                                    href="{{ route('warga.index') }}">Lihat Data Warga</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets-guest/img/carousel-3.jpg') }}" class="img-fluid" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Informasi
                                Terkini</h4>
                            <h1 class="display-1 text-capitalize text-white mb-4">Berita Desa</h1>
                            <p class="mb-5 fs-5">Dapatkan informasi terbaru seputar kegiatan, program, dan perkembangan
                                desa melalui kategori berita yang terorganisir.
                            </p>
                            <div class="d-flex align-items-center justify-content-center">
                                <a class="btn-hover-bg btn btn-primary text-white py-3 px-5"
                                    href="{{ route('kategori_berita.index') }}">Lihat Kategori Berita</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- About Start -->
    <div id="about" class="container-fluid about py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-xl-5">
                    <div class="h-100">
                        <img src="{{ asset('assets-guest/img/about-1.jpg') }}" class="img-fluid w-100 h-100"
                            alt="Image">
                    </div>
                </div>
                <div class="col-xl-7">
                    <h5 class="text-uppercase text-primary">Tentang Kami</h5>
                    <h1 class="mb-4">Portal Bina Desa - Membangun Desa Mandiri</h1>
                    <p class="fs-5 mb-4">Portal Bina Desa merupakan sistem informasi desa yang bertujuan untuk
                        memajukan pembangunan desa melalui digitalisasi data dan informasi. Kami berkomitmen untuk
                        meningkatkan pelayanan kepada warga dan transparansi pengelolaan desa.
                    </p>
                    <div class="tab-class bg-secondary p-4">
                        <ul class="nav d-flex mb-2">
                            <li class="nav-item mb-3">
                                <a class="d-flex py-2 text-center bg-white active" data-bs-toggle="pill"
                                    href="#tab-1">
                                    <span class="text-dark" style="width: 150px;">Tentang</span>
                                </a>
                            </li>
                            <li class="nav-item mb-3">
                                <a class="d-flex py-2 mx-3 text-center bg-white" data-bs-toggle="pill"
                                    href="#tab-2">
                                    <span class="text-dark" style="width: 150px;">Misi</span>
                                </a>
                            </li>
                            <li class="nav-item mb-3">
                                <a class="d-flex py-2 text-center bg-white" data-bs-toggle="pill" href="#tab-3">
                                    <span class="text-dark" style="width: 150px;">Visi</span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane fade show p-0 active">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex">
                                            <div class="text-start my-auto">
                                                <h5 class="text-uppercase mb-3">Portal Bina Desa</h5>
                                                <p class="mb-4">Sebagai wujud komitmen dalam membangun desa digital,
                                                    kami menyediakan platform terintegrasi untuk mengelola data warga,
                                                    informasi desa, dan layanan publik secara online.
                                                </p>
                                                <div class="d-flex align-items-center justify-content-start">
                                                    <a class="btn-hover-bg btn btn-primary text-white py-2 px-4"
                                                        href="#">Selengkapnya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane fade show p-0">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex">
                                            <div class="text-start my-auto">
                                                <h5 class="text-uppercase mb-3">Misi Kami</h5>
                                                <p class="mb-4">Meningkatkan kualitas pelayanan publik melalui
                                                    digitalisasi, mempermudah akses informasi bagi warga, dan
                                                    menciptakan tata kelola desa yang transparan dan akuntabel.
                                                </p>
                                                <div class="d-flex align-items-center justify-content-start">
                                                    <a class="btn-hover-bg btn btn-primary text-white py-2 px-4"
                                                        href="#">Selengkapnya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-3" class="tab-pane fade show p-0">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex">
                                            <div class="text-start my-auto">
                                                <h5 class="text-uppercase mb-3">Visi Kami</h5>
                                                <p class="mb-4">Menjadi portal desa terdepan dalam mewujudkan desa
                                                    mandiri, sejahtera, dan berkelanjutan melalui pemanfaatan teknologi
                                                    informasi yang optimal.
                                                </p>
                                                <div class="d-flex align-items-center justify-content-start">
                                                    <a class="btn-hover-bg btn btn-primary text-white py-2 px-4"
                                                        href="#">Selengkapnya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- ... (bagian Services, Counter, Causes, Events, Blog, Gallery tetap sama) ... -->

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

            // Initialize carousel
            $('.carousel').carousel();
        });
    </script>

</body>

</html>
