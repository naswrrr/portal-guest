<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
            background: linear-gradient(180deg, #87ceeb 0%, #4682b4 30%, #2c5282 60%, #1a365d 100%);
        }

        /* Ilustrasi Pegunungan */
        .mountains {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100%;
            pointer-events: none;
        }

        .mountain-back {
            position: absolute;
            bottom: 0;
            left: -10%;
            width: 120%;
            height: 60%;
            background: linear-gradient(to bottom, transparent 0%, #1e3a5f 50%);
            clip-path: polygon(0% 100%, 20% 60%, 35% 70%, 50% 50%, 65% 65%, 80% 55%, 100% 100%);
            opacity: 0.6;
        }

        .mountain-mid {
            position: absolute;
            bottom: 0;
            left: -5%;
            width: 110%;
            height: 50%;
            background: linear-gradient(to bottom, transparent 0%, #152a47 50%);
            clip-path: polygon(0% 100%, 15% 70%, 30% 55%, 45% 65%, 60% 50%, 75% 60%, 90% 70%, 100% 100%);
            opacity: 0.8;
        }

        .mountain-front {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 35%;
            background: linear-gradient(to bottom, transparent 0%, #0a1929 60%);
            clip-path: polygon(0% 100%, 10% 80%, 25% 60%, 40% 75%, 55% 65%, 70% 80%, 85% 70%, 100% 100%);
        }

        /* Awan */
        .clouds {
            position: absolute;
            top: 10%;
            left: 0;
            right: 0;
            height: 200px;
            pointer-events: none;
        }

        .cloud {
            position: absolute;
            background: rgba(255, 255, 255, 0.6);
            border-radius: 100px;
            animation: float 20s infinite ease-in-out;
        }

        .cloud:nth-child(1) {
            width: 120px;
            height: 40px;
            top: 20px;
            left: 10%;
            animation-delay: 0s;
        }

        .cloud:nth-child(2) {
            width: 90px;
            height: 30px;
            top: 60px;
            left: 60%;
            animation-delay: 3s;
        }

        .cloud:nth-child(3) {
            width: 100px;
            height: 35px;
            top: 40px;
            right: 15%;
            animation-delay: 6s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
        }

        /* Burung */
        .birds {
            position: absolute;
            top: 15%;
            right: 20%;
            pointer-events: none;
        }

        .bird {
            width: 20px;
            height: 2px;
            background: rgba(0, 0, 0, 0.3);
            position: absolute;
            animation: fly 4s infinite ease-in-out;
        }

        .bird::before {
            content: '';
            position: absolute;
            width: 15px;
            height: 2px;
            background: rgba(0, 0, 0, 0.3);
            transform: rotate(20deg);
            left: -5px;
        }

        .bird:nth-child(1) { top: 0; left: 0; }
        .bird:nth-child(2) { top: 10px; left: 20px; animation-delay: 0.3s; }
        .bird:nth-child(3) { top: 5px; left: 40px; animation-delay: 0.6s; }

        @keyframes fly {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        .login-wrapper {
            width: 100%;
            max-width: 420px;
            position: relative;
            z-index: 10;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 40px 35px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            animation: slideUp 0.6s cubic-bezier(0.22, 1, 0.36, 1);
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-header h2 {
            color: #ffffff;
            font-weight: 700;
            margin-bottom: 8px;
            font-size: 32px;
            letter-spacing: 1px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .login-header p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 15px;
            font-weight: 400;
        }

        .form-label {
            color: rgba(255, 255, 255, 0.95);
            font-weight: 600;
            margin-bottom: 10px;
            font-size: 14px;
            display: none;
        }

        .input-wrapper {
            position: relative;
            margin-bottom: 18px;
        }

        .input-icon {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.8);
            font-size: 18px;
            z-index: 2;
        }

        .form-control {
            border: 2px solid rgba(255, 255, 255, 0.4);
            border-radius: 50px;
            padding: 14px 50px 14px 24px;
            font-size: 15px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.2);
            color: #ffffff;
            font-weight: 500;
        }

        .form-control:focus {
            border-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 0 4px rgba(255, 255, 255, 0.1);
            outline: none;
            background: rgba(255, 255, 255, 0.25);
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
            font-weight: 400;
        }

        .btn-login {
            background: rgba(255, 255, 255, 0.95);
            border: none;
            border-radius: 50px;
            padding: 14px;
            font-weight: 700;
            font-size: 16px;
            color: #1e3a8a;
            width: 100%;
            margin-top: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            background: #ffffff;
        }

        .btn-login:active {
            transform: translateY(0);
            background: #1e3a8a;
            color: #ffffff;
        }

        .password-requirements {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 20px;
            margin-top: 25px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .password-requirements h6 {
            color: #ffffff;
            font-weight: 700;
            margin-bottom: 14px;
            font-size: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .password-requirements h6::before {
            content: '📋';
            font-size: 16px;
        }

        .password-requirements ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .password-requirements li {
            color: rgba(255, 255, 255, 0.95);
            padding: 6px 0;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 400;
        }

        .password-requirements li:before {
            content: "";
            width: 5px;
            height: 5px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 50%;
            flex-shrink: 0;
        }

        .alert {
            border: none;
            border-radius: 16px;
            padding: 16px 20px;
            margin-bottom: 20px;
            animation: shake 0.5s ease-out;
            background: rgba(220, 38, 38, 0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(220, 38, 38, 0.4);
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-8px); }
            75% { transform: translateX(8px); }
        }

        .alert-danger {
            color: #ffffff;
        }

        .alert ul {
            margin: 0;
            padding-left: 20px;
        }

        .alert li {
            margin: 6px 0;
            font-weight: 500;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .login-container {
                padding: 35px 28px;
            }

            .login-header h2 {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>
    <!-- Background Elements -->
    <div class="clouds">
        <div class="cloud"></div>
        <div class="cloud"></div>
        <div class="cloud"></div>
    </div>

    <div class="birds">
        <div class="bird"></div>
        <div class="bird"></div>
        <div class="bird"></div>
    </div>

    <div class="mountains">
        <div class="mountain-back"></div>
        <div class="mountain-mid"></div>
        <div class="mountain-front"></div>
    </div>

    <div class="login-wrapper">
        <div class="login-container">
            <div class="login-header">
                <h2>Login</h2>
                <p>Silakan masuk ke akun Anda</p>
            </div>

            <!-- Error Messages -->
            @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('auth.login') }}" method="POST">
                @csrf
                <div class="input-wrapper">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                           id="username" name="username"
                           value="{{ old('username') }}" placeholder="Username" required>
                    <span class="input-icon">👤</span>
                </div>

                <div class="input-wrapper">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                           id="password" name="password"
                           placeholder="Password" required>
                    <span class="input-icon">🔒</span>
                </div>

                <button type="submit" class="btn-login">Login</button>
            </form>

            <!-- Ketentuan Password -->
            <div class="password-requirements">
                <h6>Ketentuan Password</h6>
                <ul>
                    <li>Minimal 3 karakter</li>
                    <li>Harus mengandung huruf kapital</li>
                    <li>Username dan password harus sama</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-ajax1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
