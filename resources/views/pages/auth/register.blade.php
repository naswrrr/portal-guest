<!DOCTYPE html>
<html lang="id">

<head>
    <!-- ================= META ================= -->
    <meta charset="utf-8">
    <title>Portal Desa - Register</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- ================= GOOGLE FONT ================= -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap"
        rel="stylesheet">

    <!-- ================= ICON ================= -->
    <link rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
        rel="stylesheet">

    <!-- ================= CSS ================= -->
    <link href="{{ asset('assets-guest/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/css/style.css') }}" rel="stylesheet">

    <!-- ================= CSS CUSTOM ================= -->
    <style>
        /* ===== BODY ===== */
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

        /* ===== SLIDESHOW BACKGROUND ===== */
        .slideshow-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .slideshow-slide {
            position: absolute;
            inset: 0;
            opacity: 0;
            transition: opacity 1.5s ease-in-out;
            background-size: cover;
            background-position: center;
        }

        .slideshow-slide.active {
            opacity: 1;
        }

        .slideshow-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.4);
        }

        /* ===== REGISTER CARD ===== */
        .register-wrapper {
            max-width: 500px;
            margin: auto;
            width: 100%;
            z-index: 1;
        }

        .register-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, .15);
            overflow: hidden;
        }

        /* ===== HEADER ===== */
        .page-header-modern {
            background: linear-gradient(to right,
                    rgba(30, 60, 114, .9),
                    rgba(42, 82, 152, .9));
            padding: 40px 30px;
            text-align: center;
            color: white;
        }

        /* ===== FORM ===== */
        .form-group-modern {
            margin-bottom: 20px;
        }

        .form-label-modern {
            font-weight: 500;
            margin-bottom: 8px;
            display: block;
        }

        .required::after {
            content: " *";
            color: #ef4444;
        }

        .input-group-modern {
            display: flex;
            align-items: center;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            transition: .3s;
        }

        .input-group-modern:focus-within {
            border-color: #1e3c72;
            box-shadow: 0 0 0 3px rgba(30, 60, 114, .1);
        }

        .input-icon {
            padding: 0 15px;
            border-right: 1px solid #d1d5db;
        }

        .form-control-modern {
            border: none;
            padding: 12px 15px;
            width: 100%;
            outline: none;
        }

        .invalid-feedback {
            color: #ef4444;
            font-size: 14px;
            margin-top: 5px;
        }

        /* ===== BUTTON ===== */
        .btn-modern {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 14px;
            border-radius: 8px;
            border: none;
            font-weight: 500;
        }

        .btn-primary-modern {
            background: linear-gradient(to right, #1e3c72, #2a5298);
            color: white;
        }

        .btn-success-modern {
            background: linear-gradient(to right, #10b981, #059669);
            color: white;
        }

        /* ===== SPINNER ===== */
        #spinner {
            position: fixed;
            inset: 0;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }
    </style>
</head>

<body>

    <!-- ================= SLIDESHOW ================= -->
    <div class="slideshow-container">
        <div class="slideshow-overlay"></div>
        <div class="slideshow-slide active"
            style="background-image:url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4')"></div>
        <div class="slideshow-slide"
            style="background-image:url('https://images.unsplash.com/photo-1518834103328-93d45986dce1')"></div>
        <div class="slideshow-slide"
            style="background-image:url('https://images.unsplash.com/photo-1559827260-dc66d52bef19')"></div>
        <div class="slideshow-slide"
            style="background-image:url('https://images.unsplash.com/photo-1500382017468-9049fed747ef')"></div>
        <div class="slideshow-slide"
            style="background-image:url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4')"></div>
    </div>

    <!-- ================= SPINNER ================= -->
    <div id="spinner">
        <div class="spinner-grow text-primary"></div>
    </div>

    <!-- ================= REGISTER ================= -->
    <div class="register-wrapper">
        <div class="register-card">

            <!-- HEADER -->
            <div class="page-header-modern">
                <img src="{{ asset('assets-guest/img/logo.png') }}"
                    style="width:120px; margin-bottom:15px">
                <h1>Daftar Akun Baru</h1>
                <p>Bergabung untuk mengelola data desa</p>
            </div>

            <!-- BODY -->
            <div class="card-body p-4">

                <!-- SUCCESS -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- ERROR -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- FORM -->
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- NAMA -->
                    <div class="form-group-modern">
                        <label class="form-label-modern required">Nama Lengkap</label>
                        <div class="input-group-modern">
                            <span class="input-icon"><i class="fas fa-user"></i></span>
                            <input type="text" name="name"
                                class="form-control-modern"
                                value="{{ old('name') }}" required>
                        </div>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- EMAIL -->
                    <div class="form-group-modern">
                        <label class="form-label-modern required">Email</label>
                        <div class="input-group-modern">
                            <span class="input-icon"><i class="fas fa-envelope"></i></span>
                            <input type="email" name="email"
                                class="form-control-modern"
                                value="{{ old('email') }}" required>
                        </div>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- PASSWORD -->
                    <div class="form-group-modern">
                        <label class="form-label-modern required">Password</label>
                        <div class="input-group-modern">
                            <span class="input-icon"><i class="fas fa-lock"></i></span>
                            <input type="password" name="password"
                                class="form-control-modern" required>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- KONFIRMASI PASSWORD -->
                    <div class="form-group-modern">
                        <label class="form-label-modern required">Konfirmasi Password</label>
                        <div class="input-group-modern">
                            <span class="input-icon"><i class="fas fa-lock"></i></span>
                            <input type="password"
                                name="password_confirmation"
                                class="form-control-modern" required>
                        </div>
                    </div>

                    <!-- SUBMIT -->
                    <button type="submit" class="btn-modern btn-primary-modern">
                        <i class="fas fa-user-plus"></i> Daftar Sekarang
                    </button>
                </form>

                <!-- FOOTER -->
                <div class="text-center mt-4">
                    <p>Sudah punya akun?</p>
                    <a href="{{ route('login') }}" class="btn-modern btn-success-modern">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- ================= JS ================= -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function () {

            // Hilangkan spinner setelah halaman siap
            $('#spinner').fadeOut(500);

            // Slideshow otomatis
            let slides = $('.slideshow-slide');
            let current = 0;

            function nextSlide() {
                slides.removeClass('active');
                current = (current + 1) % slides.length;
                slides.eq(current).addClass('active');
            }

            setInterval(nextSlide, 5000);
        });
    </script>

</body>
</html>
