<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Contact - Portal Desa Bina Desa</title>
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
                        <a href="{{ route('contact') }}" class="nav-item nav-link active">
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
                    <h1 class="display-3 text-white animated slideInDown mb-4">Hubungi Kami</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Home</a>
                            </li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Contact Start -->
    <div class="container-fluid contact py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5" style="max-width: 800px;">
                <h5 class="text-uppercase text-primary">Kontak Kami</h5>
                <h1 class="mb-0">Hubungi Kami Untuk Informasi Lebih Lanjut</h1>
                <p class="mb-4">Kami siap membantu Anda dengan segala pertanyaan dan kebutuhan informasi seputar
                    Portal Bina Desa.</p>
            </div>
            <div class="row g-4">
                <!-- Telepon -->
                <div class="col-md-6 col-lg-3">
                    <div class="service-item text-center p-4">
                        <div class="service-icon bg-primary rounded-circle p-4 mx-auto mb-4">
                            <i class="fas fa-phone-alt fa-3x text-white"></i>
                        </div>
                        <h5 class="mb-3">Telepon</h5>
                        <p class="mb-4">Hubungi kami via telepon untuk informasi cepat</p>
                        <a href="tel:+01234567890" class="btn-hover-bg btn btn-primary text-white py-2 px-4">
                            <i class="fas fa-phone me-2"></i>+01234567890
                        </a>
                    </div>
                </div>

                <!-- WhatsApp -->
                <div class="col-md-6 col-lg-3">
                    <div class="service-item text-center p-4">
                        <div class="service-icon bg-success rounded-circle p-4 mx-auto mb-4">
                            <i class="fab fa-whatsapp fa-3x text-white"></i>
                        </div>
                        <h5 class="mb-3">WhatsApp</h5>
                        <p class="mb-4">Chat langsung via WhatsApp untuk respon cepat</p>
                        <a href="https://wa.me/6201234567890" target="_blank"
                            class="btn-hover-bg btn btn-success text-white py-2 px-4">
                            <i class="fab fa-whatsapp me-2"></i>+62 812 3456 7890
                        </a>
                    </div>
                </div>

                <!-- Email -->
                <div class="col-md-6 col-lg-3">
                    <div class="service-item text-center p-4">
                        <div class="service-icon bg-danger rounded-circle p-4 mx-auto mb-4">
                            <i class="fas fa-envelope fa-3x text-white"></i>
                        </div>
                        <h5 class="mb-3">Email</h5>
                        <p class="mb-4">Kirim pesan detail via email untuk pertanyaan kompleks</p>
                        <a href="mailto:BinaDesa@gmail.com" class="btn-hover-bg btn btn-danger text-white py-2 px-4">
                            <i class="fas fa-envelope me-2"></i>BinaDesa@gmail.com
                        </a>
                    </div>
                </div>

                <!-- Lokasi -->
                <div class="col-md-6 col-lg-3">
                    <div class="service-item text-center p-4">
                        <div class="service-icon bg-warning rounded-circle p-4 mx-auto mb-4">
                            <i class="fas fa-map-marker-alt fa-3x text-white"></i>
                        </div>
                        <h5 class="mb-3">Alamat</h5>
                        <p class="mb-4">Kunjungi kantor kami untuk konsultasi langsung</p>
                        <a href="https://maps.google.com" target="_blank"
                            class="btn-hover-bg btn btn-warning text-white py-2 px-4">
                            <i class="fas fa-map-marker-alt me-2"></i>Lihat Peta
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <!-- Additional Info Start -->
    <div class="container-fluid py-5 bg-light">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="card border-0">
                        <div class="card-body p-4">
                            <h4 class="mb-4">Informasi Kontak Lainnya</h4>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <h6><i class="fas fa-clock text-primary me-2"></i>Jam Operasional</h6>
                                    <p class="mb-2">Senin - Jumat: 08:00 - 17:00 WIB</p>
                                    <p class="mb-0">Sabtu: 08:00 - 12:00 WIB</p>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <h6><i class="fas fa-user text-primary me-2"></i>Contact Person</h6>
                                    <p class="mb-2"><strong>Admin 1:</strong> +62 812 3456 7890</p>
                                    <p class="mb-0"><strong>Admin 2:</strong> +62 823 4567 8901</p>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <h6><i class="fas fa-info-circle text-primary me-2"></i>Informasi Penting</h6>
                                    <p class="mb-0">Untuk pengaduan dan layanan darurat, silakan hubungi contact
                                        person yang tersedia di luar jam operasional.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card border-0">
                        <div class="card-body p-4">
                            <h4 class="mb-4">Form Kontak</h4>
                            <form>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Nama Lengkap"
                                            required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" placeholder="Email" required>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control" placeholder="Subjek" required>
                                    </div>
                                    <div class="col-12">
                                        <textarea class="form-control" rows="5" placeholder="Pesan" required></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn-hover-bg btn btn-primary text-white w-100 py-3"
                                            type="submit">
                                            <i class="fas fa-paper-plane me-2"></i>Kirim Pesan
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Additional Info End -->

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
