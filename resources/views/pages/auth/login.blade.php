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
        }

        .login-wrapper {
            max-width: 450px;
            margin: 0 auto;
            width: 100%;
        }

        .login-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            border: none;
        }

        .page-header-modern {
            background: linear-gradient(to right, #1e3c72, #2a5298);
            padding: 40px 30px;
            text-align: center;
            color: white;
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
        }
    </style>
</head>

<body>

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

                    <div class="form-check-modern">
                        <input type="checkbox" class="form-check-input-modern" id="remember" name="remember">
                        <label class="form-check-label-modern" for="remember">Ingat saya</label>
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
        });
    </script>

</body>

</html>
