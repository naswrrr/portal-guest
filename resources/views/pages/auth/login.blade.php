<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Portal Desa - Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets-guest/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets-guest/css/style.css') }}" rel="stylesheet">

    <style>
        body {
            background: #f8fafc;
            min-height: 100vh;
            display: flex;
            align-items: center;
            font-family: 'Roboto', sans-serif;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }

        /* Slideshow Background */
        .slideshow-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .slideshow-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 1.5s ease-in-out;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .slideshow-slide.active {
            opacity: 1;
        }

        /* Overlay untuk meningkatkan keterbacaan */
        .slideshow-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            z-index: 0;
        }

        /* Konten login di atas slideshow */
        .login-wrapper {
            max-width: 450px;
            margin: 0 auto;
            width: 100%;
            position: relative;
            z-index: 1;
        }

        .login-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            border: none;
        }

        .page-header-modern {
            background: linear-gradient(to right, rgba(30, 60, 114, 0.9), rgba(42, 82, 152, 0.9));
            padding: 40px 30px;
            text-align: center;
            color: white;
            position: relative;
            z-index: 1;
        }

        .header-icon {
            width: 70px;
            height: 70px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 30px;
        }

        .text-primary {
            color: #1e3c72 !important;
        }

        .fw-bold {
            font-weight: 600;
        }

        .text-uppercase {
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 14px;
        }

        .display-4 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .text-muted {
            color: #6c757d !important;
            opacity: 0.8;
        }

        .fs-5 {
            font-size: 1rem;
        }

        .card-body {
            padding: 40px 30px;
        }

        .alert-modern {
            border-radius: 8px;
            border: none;
            padding: 15px 20px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
            border-left: 4px solid #10b981;
        }

        .alert-warning {
            background: #fef3c7;
            color: #92400e;
            border-left: 4px solid #f59e0b;
        }

        .alert-danger {
            background: #fee2e2;
            color: #991b1b;
            border-left: 4px solid #ef4444;
        }

        .alert-icon {
            font-size: 20px;
        }

        .alert-content {
            flex: 1;
        }

        .alert-content ul {
            margin: 5px 0 0 0;
            padding-left: 20px;
        }

        .alert-content ul li {
            margin-bottom: 3px;
        }

        .form-group-modern {
            margin-bottom: 25px;
        }

        .form-label-modern {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #374151;
            font-size: 14px;
        }

        .input-group-modern {
            position: relative;
            display: flex;
            align-items: center;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            transition: all 0.3s ease;
            background: white;
        }

        .input-group-modern:focus-within {
            border-color: #1e3c72;
            box-shadow: 0 0 0 3px rgba(30, 60, 114, 0.1);
        }

        .input-icon {
            padding: 0 15px;
            color: #6b7280;
            font-size: 18px;
            border-right: 1px solid #d1d5db;
        }

        .form-control-modern {
            border: none;
            padding: 14px 15px;
            width: 100%;
            font-size: 15px;
            background: transparent;
            outline: none;
            color: #1f2937;
        }

        .form-control-modern::placeholder {
            color: #9ca3af;
        }

        .btn-modern {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 14px 30px;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            gap: 8px;
        }

        .btn-primary-modern {
            background: linear-gradient(to right, #1e3c72, #2a5298);
            color: white;
            width: 100%;
        }

        .btn-primary-modern:hover {
            background: linear-gradient(to right, #2a5298, #1e3c72);
            color: white;
            transform: translateY(-2px);
        }

        .btn-success-modern {
            background: linear-gradient(to right, #10b981, #059669);
            color: white;
            width: 100%;
        }

        .btn-success-modern:hover {
            background: linear-gradient(to right, #059669, #10b981);
            color: white;
            transform: translateY(-2px);
        }

        .form-check-modern {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 25px;
        }

        .form-check-input-modern {
            width: 18px;
            height: 18px;
            border-radius: 4px;
            border: 2px solid #d1d5db;
            cursor: pointer;
            accent-color: #1e3c72;
        }

        .form-check-label-modern {
            font-size: 14px;
            color: #6b7280;
            cursor: pointer;
        }

        .login-footer {
            text-align: center;
            padding-top: 25px;
            margin-top: 30px;
            border-top: 1px solid #e5e7eb;
        }

        .footer-text {
            color: #6b7280;
            margin-bottom: 20px;
            font-size: 15px;
        }

        #spinner {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

        .spinner-grow {
            width: 40px;
            height: 40px;
        }

        /* Slideshow navigation dots */
        .slideshow-dots {
            position: fixed;
            bottom: 20px;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: center;
            gap: 10px;
            z-index: 2;
        }

        .slideshow-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .slideshow-dot.active {
            background: white;
            transform: scale(1.2);
        }

        @media (max-width: 576px) {
            .page-header-modern {
                padding: 30px 20px;
            }

            .card-body {
                padding: 30px 20px;
            }

            .header-icon {
                width: 60px;
                height: 60px;
                font-size: 24px;
            }

            .display-4 {
                font-size: 1.75rem;
            }

            .slideshow-dots {
                bottom: 10px;
            }
        }
    </style>
</head>

<body>

    <!-- Slideshow Background -->
    <div class="slideshow-container">
        <div class="slideshow-overlay"></div>
        <div class="slideshow-slide active" id="slide-1" style="background-image: url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');"></div>
        <div class="slideshow-slide" id="slide-2" style="background-image: url('https://images.unsplash.com/photo-1518834103328-93d45986dce1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');"></div>
        <div class="slideshow-slide" id="slide-3" style="background-image: url('https://images.unsplash.com/photo-1559827260-dc66d52bef19?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');"></div>
        <div class="slideshow-slide" id="slide-4" style="background-image: url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');"></div>
        <div class="slideshow-slide" id="slide-5" style="background-image: url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');"></div>
    </div>

    <!-- Slideshow Navigation Dots -->
    <div class="slideshow-dots">
        <div class="slideshow-dot active" data-slide="0"></div>
        <div class="slideshow-dot" data-slide="1"></div>
        <div class="slideshow-dot" data-slide="2"></div>
        <div class="slideshow-dot" data-slide="3"></div>
        <div class="slideshow-dot" data-slide="4"></div>
    </div>

    <!-- Spinner -->
    <div id="spinner" class="show">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>

    <div class="login-wrapper">
        <div class="login-card">

            <!-- Page Header Start -->
            <div class="page-header-modern text-center">

                <!-- LOGO -->
                <img src="{{ asset('assets-guest/img/logo.png') }}" alt="Logo Desa"
                    style="width: 170px; height: 170px; object-fit: contain; margin-bottom: 20px;">

                <h1 class="display-4 fw-bold mb-3">Login Sistem</h1>
                <p class="text-white-50 fs-5 mb-0">Masuk untuk mengelola data desa</p>
            </div>
            <!-- Page Header End -->


            <div class="card-body">

                {{-- FLASH ERROR --}}
                @if (session('error'))
                    <div class="alert-modern alert-warning" role="alert">
                        <i class="fas fa-exclamation-circle alert-icon"></i>
                        <div class="alert-content">
                            {{ session('error') }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                {{-- FLASH SUCCESS --}}
                @if (session('success'))
                    <div class="alert-modern alert-success" role="alert">
                        <i class="fas fa-check-circle alert-icon"></i>
                        <div class="alert-content">
                            {{ session('success') }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                {{-- LARAVEL VALIDATION ERRORS --}}
                @if ($errors->any())
                    <div class="alert-modern alert-danger" role="alert">
                        <i class="fas fa-exclamation-triangle alert-icon"></i>
                        <div class="alert-content">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group-modern">
                        <label for="email" class="form-label-modern">Email</label>
                        <div class="input-group-modern">
                            <span class="input-icon">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <input type="email" class="form-control-modern @error('email') is-invalid @enderror"
                                id="email" name="email" value="{{ old('email') }}"
                                placeholder="Masukkan email Anda" required>
                        </div>
                    </div>

                    <div class="form-group-modern">
                        <label for="password" class="form-label-modern">Password</label>
                        <div class="input-group-modern">
                            <span class="input-icon">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input type="password" class="form-control-modern @error('password') is-invalid @enderror"
                                id="password" name="password" placeholder="Masukkan password" required>
                        </div>
                    </div>

                    <button type="submit" class="btn-modern btn-primary-modern">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Login</span>
                    </button>
                </form>

                <div class="login-footer">
                    <p class="footer-text">Belum punya akun?</p>
                    <a href="{{ route('register') }}" class="btn-modern btn-success-modern">
                        <i class="fas fa-user-plus"></i>
                        <span>Daftar Akun Baru</span>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            // Remove spinner
            $('#spinner').fadeOut(500);

            // Slideshow functionality
            let currentSlide = 0;
            const slides = $('.slideshow-slide');
            const dots = $('.slideshow-dot');
            const totalSlides = slides.length;

            // Function to change slide
            function changeSlide(slideIndex) {
                // Remove active class from all slides and dots
                slides.removeClass('active');
                dots.removeClass('active');

                // Add active class to current slide and dot
                $(slides[slideIndex]).addClass('active');
                $(dots[slideIndex]).addClass('active');

                currentSlide = slideIndex;
            }

            // Auto slideshow
            function nextSlide() {
                let nextSlideIndex = (currentSlide + 1) % totalSlides;
                changeSlide(nextSlideIndex);
            }

            // Start auto slideshow
            let slideshowInterval = setInterval(nextSlide, 5000);

            // Dot click event
            dots.click(function() {
                let slideIndex = $(this).data('slide');
                changeSlide(slideIndex);

                // Reset interval
                clearInterval(slideshowInterval);
                slideshowInterval = setInterval(nextSlide, 5000);
            });

            // Pause slideshow on hover (optional)
            $('.slideshow-container').hover(
                function() {
                    clearInterval(slideshowInterval);
                },
                function() {
                    slideshowInterval = setInterval(nextSlide, 5000);
                }
            );
        });
    </script>

</body>

</html>
