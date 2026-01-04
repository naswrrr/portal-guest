<!DOCTYPE html>
<html lang="id">

<head>
    <!-- ===================== META DASAR ===================== -->
    <meta charset="utf-8">
    <title>Portal Desa - Login</title>

    <!-- Responsive viewport -->
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- ===================== GOOGLE FONTS ===================== -->
    <!-- Font Jost & Roboto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap"
        rel="stylesheet">

    <!-- ===================== ICON ===================== -->
    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />

    <!-- Bootstrap Icons -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
        rel="stylesheet">

    <!-- ===================== CSS UTAMA ===================== -->
    <!-- Bootstrap -->
    <link href="{{ asset('assets-guest/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom Style -->
    <link href="{{ asset('assets-guest/css/style.css') }}" rel="stylesheet">

    <!-- ===================== CSS INLINE (CUSTOM LOGIN) ===================== -->
    <style>
        /* ===================== BODY ===================== */
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

        /* ===================== SLIDESHOW BACKGROUND ===================== */
        .slideshow-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        /* Slide gambar */
        .slideshow-slide {
            position: absolute;
            inset: 0;
            opacity: 0;
            transition: opacity 1.5s ease-in-out;
            background-size: cover;
            background-position: center;
        }

        /* Slide aktif */
        .slideshow-slide.active {
            opacity: 1;
        }

        /* Overlay gelap agar teks terbaca */
        .slideshow-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.4);
        }

        /* ===================== WRAPPER LOGIN ===================== */
        .login-wrapper {
            max-width: 450px;
            width: 100%;
            margin: auto;
            z-index: 1;
        }

        /* Card login */
        .login-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
            overflow: hidden;
        }

        /* ===================== HEADER LOGIN ===================== */
        .page-header-modern {
            background: linear-gradient(to right,
                    rgba(30, 60, 114, 0.9),
                    rgba(42, 82, 152, 0.9));
            padding: 40px 30px;
            text-align: center;
            color: white;
        }

        /* ===================== ALERT ===================== */
        .alert-modern {
            border-radius: 8px;
            padding: 15px 20px;
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
        }

        .alert-warning {
            background: #fef3c7;
            color: #92400e;
        }

        .alert-danger {
            background: #fee2e2;
            color: #991b1b;
        }

        /* ===================== FORM ===================== */
        .form-group-modern {
            margin-bottom: 25px;
        }

        .form-label-modern {
            font-weight: 500;
            margin-bottom: 8px;
            display: block;
        }

        /* Input wrapper */
        .input-group-modern {
            display: flex;
            border: 1px solid #d1d5db;
            border-radius: 8px;
        }

        /* Icon input */
        .input-icon {
            padding: 0 15px;
            display: flex;
            align-items: center;
            border-right: 1px solid #d1d5db;
        }

        /* Input */
        .form-control-modern {
            border: none;
            padding: 14px;
            width: 100%;
            outline: none;
        }

        /* ===================== BUTTON ===================== */
        .btn-modern {
            padding: 14px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary-modern {
            background: linear-gradient(to right, #1e3c72, #2a5298);
            color: white;
            width: 100%;
        }

        .btn-success-modern {
            background: linear-gradient(to right, #10b981, #059669);
            color: white;
            width: 100%;
        }
    </style>
</head>

<body>

    <!-- ===================== SLIDESHOW BACKGROUND ===================== -->
    <div class="slideshow-container">
        <div class="slideshow-overlay"></div>

        <!-- Setiap div = 1 slide -->
        <div class="slideshow-slide active"
            style="background-image:url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4');"></div>
        <div class="slideshow-slide"
            style="background-image:url('https://images.unsplash.com/photo-1518834103328-93d45986dce1');"></div>
        <div class="slideshow-slide"
            style="background-image:url('https://images.unsplash.com/photo-1559827260-dc66d52bef19');"></div>
    </div>

    <!-- ===================== SPINNER LOADING ===================== -->
    <div id="spinner">
        <div class="spinner-grow text-primary"></div>
    </div>

    <!-- ===================== LOGIN CARD ===================== -->
    <div class="login-wrapper">
        <div class="login-card">

            <!-- HEADER -->
            <div class="page-header-modern">
                <img src="{{ asset('assets-guest/img/logo.png') }}"
                    alt="Logo Desa"
                    style="width:170px;">
                <h1>Login Sistem</h1>
                <p>Masuk untuk mengelola data desa</p>
            </div>

            <!-- BODY -->
            <div class="card-body">

                {{-- ===================== FLASH MESSAGE ===================== --}}
                @if (session('error'))
                    <div class="alert-modern alert-warning">
                        {{ session('error') }}
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert-modern alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- ===================== VALIDATION ERROR ===================== --}}
                @if ($errors->any())
                    <div class="alert-modern alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- ===================== FORM LOGIN ===================== -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- EMAIL -->
                    <div class="form-group-modern">
                        <label>Email</label>
                        <div class="input-group-modern">
                            <span class="input-icon">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <input type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required>
                        </div>
                    </div>

                    <!-- PASSWORD -->
                    <div class="form-group-modern">
                        <label>Password</label>
                        <div class="input-group-modern">
                            <span class="input-icon">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input type="password"
                                name="password"
                                required>
                        </div>
                    </div>

                    <!-- BUTTON LOGIN -->
                    <button type="submit" class="btn-modern btn-primary-modern">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </button>
                </form>

                <!-- FOOTER -->
                <div class="login-footer">
                    <p>Belum punya akun?</p>
                    <a href="{{ route('register') }}"
                        class="btn-modern btn-success-modern">
                        <i class="fas fa-user-plus"></i> Daftar
                    </a>
                </div>

            </div>
        </div>
    </div>

    <!-- ===================== JS ===================== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function () {

            // ===================== HIDE SPINNER =====================
            $('#spinner').fadeOut(500);

            // ===================== SLIDESHOW =====================
            let currentSlide = 0;
            const slides = $('.slideshow-slide');
            const totalSlides = slides.length;

            // Fungsi ganti slide
            function changeSlide(index) {
                slides.removeClass('active');
                slides.eq(index).addClass('active');
                currentSlide = index;
            }

            // Auto slide
            setInterval(function () {
                let next = (currentSlide + 1) % totalSlides;
                changeSlide(next);
            }, 5000);

        });
    </script>

</body>
</html>
