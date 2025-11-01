<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Portal Desa - Project Bina Desa</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    {{-- Start CSS --}}
    @include('guest.layouts.warga.css')
    {{-- End CSS --}}

    <style>
        /* ===== FLOATING WHATSAPP STYLES ===== */
        .floating-whatsapp {
            position: fixed;
            bottom: 25px;
            right: 25px;
            z-index: 1000;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .whatsapp-container {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 15px;
        }

        .whatsapp-main-button {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #25D366, #128C7E);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 25px rgba(37, 211, 102, 0.4);
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            border: 3px solid white;
            text-decoration: none;
        }

        .whatsapp-main-button:hover {
            transform: scale(1.1);
            box-shadow: 0 12px 30px rgba(37, 211, 102, 0.6);
        }

        .whatsapp-main-button i {
            font-size: 28px;
            color: white;
        }

        .whatsapp-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #FF4444;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            border: 2px solid white;
            animation: pulse-badge 2s infinite;
        }

        .whatsapp-tooltip {
            background: white;
            padding: 12px 16px;
            border-radius: 25px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
            display: flex;
            align-items: center;
            gap: 10px;
            max-width: 250px;
            opacity: 0;
            transform: translateX(20px);
            transition: all 0.3s ease;
            pointer-events: none;
        }

        .whatsapp-container:hover .whatsapp-tooltip {
            opacity: 1;
            transform: translateX(0);
        }

        .whatsapp-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #25D366, #128C7E);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .whatsapp-avatar i {
            font-size: 20px;
            color: white;
        }

        .whatsapp-info {
            flex: 1;
        }

        .whatsapp-info h4 {
            margin: 0;
            font-size: 14px;
            font-weight: 600;
            color: #25D366;
        }

        .whatsapp-info p {
            margin: 2px 0 0 0;
            font-size: 12px;
            color: #666;
            line-height: 1.3;
        }

        .whatsapp-status {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-top: 3px;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #4CAF50;
            animation: blink 2s infinite;
        }

        .status-text {
            font-size: 11px;
            color: #4CAF50;
            font-weight: 500;
        }

        .whatsapp-chat-bubble {
            background: #25D366;
            color: white;
            padding: 8px 12px;
            border-radius: 18px 18px 0 18px;
            font-size: 12px;
            margin-top: 8px;
            position: relative;
            animation: slideIn 0.5s ease;
        }

        .whatsapp-chat-bubble::after {
            content: '';
            position: absolute;
            bottom: -5px;
            right: 10px;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-top: 5px solid #25D366;
        }

        /* Animations */
        @keyframes pulse-badge {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
        }

        @keyframes blink {
            0%, 50% {
                opacity: 1;
            }
            51%, 100% {
                opacity: 0.3;
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-5px);
            }
        }

        .whatsapp-main-button {
            animation: float 3s ease-in-out infinite;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .floating-whatsapp {
                bottom: 20px;
                right: 15px;
            }

            .whatsapp-main-button {
                width: 55px;
                height: 55px;
            }

            .whatsapp-main-button i {
                font-size: 24px;
            }

            .whatsapp-tooltip {
                max-width: 220px;
                padding: 10px 14px;
            }
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
    <!-- Navbar start -->
    @include('guest.layouts.warga.navbar', ['activePage' => 'home'])
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
                    <div class="tab-class bg-light p-4"> <!-- Changed from bg-secondary to bg-light -->
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

    <!-- Floating WhatsApp Button -->
    <div class="floating-whatsapp">
        <div class="whatsapp-container">
            <div class="whatsapp-tooltip">
                <div class="whatsapp-avatar">
                    <i class="fab fa-whatsapp"></i>
                </div>
                <div class="whatsapp-info">
                    <h4>Admin Bina Desa</h4>
                    <p>Butuh bantuan? Chat dengan kami!</p>
                    <div class="whatsapp-status">
                        <div class="status-dot"></div>
                        <span class="status-text">Online</span>
                    </div>
                    <div class="whatsapp-chat-bubble">
                        Ada yang bisa kami bantu? 👋
                    </div>
                </div>
            </div>
            <a href="https://wa.me/6281234567890?text=Halo%20Admin%20Portal%20Bina%20Desa,%20saya%20ingin%20bertanya%20tentang:"
               class="whatsapp-main-button"
               target="_blank"
               title="Chat via WhatsApp">
                <i class="fab fa-whatsapp"></i>
                <div class="whatsapp-badge">1</div>
            </a>
        </div>
    </div>

    <!-- Copyright Start -->
    @include('guest.layouts.warga.footer')
    <!-- Copyright End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top"><i
            class="fa fa-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    @include('guest.layouts.warga.js')

    <script>
        // Temporary JS to hide spinner
        $(document).ready(function() {
            // Remove spinner if exists
            $('#spinner').remove();

            // Initialize carousel
            $('.carousel').carousel();

            // WhatsApp button functionality
            $('.whatsapp-main-button').on('click', function(e) {
                // Optional: Add analytics tracking here
                console.log('WhatsApp button clicked');
            });

            // Auto-hide tooltip after 5 seconds of appearing
            $('.whatsapp-container').on('mouseenter', function() {
                clearTimeout(window.whatsappTooltipTimeout);
            });

            $('.whatsapp-container').on('mouseleave', function() {
                window.whatsappTooltipTimeout = setTimeout(function() {
                    $('.whatsapp-tooltip').css({
                        'opacity': '0',
                        'transform': 'translateX(20px)'
                    });
                }, 5000);
            });
        });
    </script>

</body>

</html>
