<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Berhasil</title>
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

        .success-wrapper {
            width: 100%;
            max-width: 480px;
            position: relative;
            z-index: 10;
        }

        .success-container {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 50px 40px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            animation: slideUp 0.6s cubic-bezier(0.22, 1, 0.36, 1);
            border: 2px solid rgba(255, 255, 255, 0.3);
            text-align: center;
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

        .success-icon {
            font-size: 80px;
            margin-bottom: 25px;
            animation: checkmark 0.8s ease-in-out;
            display: inline-block;
        }

        @keyframes checkmark {
            0% {
                transform: scale(0) rotate(-45deg);
                opacity: 0;
            }
            50% {
                transform: scale(1.2) rotate(0deg);
            }
            100% {
                transform: scale(1) rotate(0deg);
                opacity: 1;
            }
        }

        .success-container h2 {
            color: #ffffff;
            font-weight: 700;
            margin-bottom: 20px;
            font-size: 32px;
            letter-spacing: 0.5px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .success-container .lead {
            color: rgba(255, 255, 255, 0.95);
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 30px;
            font-weight: 400;
        }

        .success-container .lead strong {
            color: #ffffff;
            font-weight: 700;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }

        .btn-back {
            background: rgba(255, 255, 255, 0.95);
            border: none;
            border-radius: 50px;
            padding: 14px 40px;
            font-weight: 700;
            font-size: 16px;
            color: #1e3a8a;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            letter-spacing: 0.5px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-back:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            background: #ffffff;
            color: #1e3a8a;
        }

        .btn-back:active {
            transform: translateY(0);
            background: #1e3a8a;
            color: #ffffff;
        }

        /* Info Card */
        .info-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 20px;
            margin-top: 25px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .info-card p {
            color: rgba(255, 255, 255, 0.95);
            margin: 0;
            font-size: 14px;
            font-weight: 400;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .success-container {
                padding: 40px 30px;
            }

            .success-container h2 {
                font-size: 28px;
            }

            .success-icon {
                font-size: 70px;
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

    <div class="success-wrapper">
        <div class="success-container">
            <h2>Login Berhasil!</h2>
            <p class="lead">
                Selamat datang, <strong>{{ $username }}</strong>!<br>
                Anda telah berhasil login ke sistem.
            </p>

            <a href="{{ route('auth.form') }}" class="btn-back">Kembali ke Login</a>

            <div class="info-card">
                <p>Sesi login Anda telah aktif dan siap digunakan</p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
