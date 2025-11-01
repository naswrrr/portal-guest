<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Contact - Portal Desa Bina Desa</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    {{-- Start CSS --}}
    @include('guest.layouts.warga.css')
    {{-- End CSS --}}

    <style>
        body {
            background: #f8f9fa;
        }

        .page-header-modern {
            padding: 3rem 0;
            background: #f8f9fa;
            border-radius: 10px;
            margin-bottom: 3rem;
            border: none;
        }

        .header-icon {
            font-size: 3rem;
            color: #3498db;
            margin-bottom: 1rem;
        }

        .content-section {
            background: #f8f9fa;
        }

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

        /* Existing styles tetap dipertahankan */
        .card-modern {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
            background: white;
        }

        .card-header-modern {
            background: #3498db;
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 10px 10px 0 0 !important;
            border: none;
        }

        .header-content {
            display: flex;
            align-items: center;
        }

        .header-content i {
            font-size: 1.2rem;
            margin-right: 10px;
        }

        .card-warga {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
            margin-bottom: 1.5rem;
            border: none;
        }

        .card-warga-header {
            padding: 1.5rem;
            background: #f8f9fa;
            display: flex;
            align-items: center;
            border-bottom: none;
        }

        .user-avatar-modern {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #3498db;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: white;
            font-size: 1.2rem;
        }

        .info-item {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .info-item:last-child {
            margin-bottom: 0;
        }

        .info-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            color: white;
            font-size: 1rem;
        }

        .info-label {
            display: block;
            font-size: 0.8rem;
            color: #6c757d;
            margin-bottom: 2px;
        }

        .info-value {
            display: block;
            font-weight: 500;
            color: #2c3e50;
        }

        .action-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            background: #f8f9fa;
            padding: 1rem 1.5rem;
            border-radius: 10px;
            border: none;
        }

        .btn-modern {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 5px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-primary-modern {
            background: #3498db;
            color: white;
        }

        .btn-primary-modern:hover {
            background: #2980b9;
            color: white;
        }

        .contact-service-item {
            background: white;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
            height: 100%;
            transition: transform 0.3s ease;
        }

        .contact-service-item:hover {
            transform: translateY(-5px);
        }

        .service-icon-modern {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: white;
            font-size: 2rem;
        }

        .form-control-modern {
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 0.75rem;
            width: 100%;
            background: white;
        }

        .form-control-modern:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
        }

        .form-label-modern {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 0.5rem;
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
    @include('guest.layouts.warga.navbar', ['activePage' => 'contact'])

    <!-- Content Start -->
    <div class="container-fluid content-section">
        <div class="container py-5">

            <!-- Page Header Start -->
            <div class="page-header-modern text-center mb-5">
                <div class="header-icon">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <h5 class="text-primary fw-bold text-uppercase mb-2">Kontak Kami</h5>
                <h1 class="display-4 fw-bold mb-3">Hubungi Kami</h1>
                <p class="text-muted fs-5 mb-0">Kami siap membantu Anda dengan segala pertanyaan dan kebutuhan informasi seputar Portal Bina Desa</p>
            </div>
            <!-- Page Header End -->

            <!-- Contact Services Section -->
            <div class="action-bar mb-4">
                <div class="action-left">
                    <h4 class="mb-0 fw-bold text-dark">
                        <i class="fas fa-headset me-2 text-primary"></i>
                        Layanan Kontak
                    </h4>
                    <p class="text-muted mb-0 mt-1">Pilih metode kontak yang paling nyaman untuk Anda</p>
                </div>
            </div>

            <div class="row g-4">
                <!-- Telepon -->
                <div class="col-md-6 col-lg-3">
                    <div class="contact-service-item">
                        <div class="service-icon-modern bg-primary">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Telepon</h5>
                        <p class="text-muted mb-4">Hubungi kami via telepon untuk informasi cepat</p>
                        <a href="tel:+01234567890" class="btn-modern btn-primary-modern w-100">
                            <i class="fas fa-phone me-2"></i>+01234567890
                        </a>
                    </div>
                </div>

                <!-- WhatsApp -->
                <div class="col-md-6 col-lg-3">
                    <div class="contact-service-item">
                        <div class="service-icon-modern bg-success">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <h5 class="fw-bold mb-3">WhatsApp</h5>
                        <p class="text-muted mb-4">Chat langsung via WhatsApp untuk respon cepat</p>
                        <a href="https://wa.me/6201234567890" target="_blank" class="btn-modern btn-primary-modern w-100">
                            <i class="fab fa-whatsapp me-2"></i>+62 812 3456 7890
                        </a>
                    </div>
                </div>

                <!-- Email -->
                <div class="col-md-6 col-lg-3">
                    <div class="contact-service-item">
                        <div class="service-icon-modern bg-danger">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Email</h5>
                        <p class="text-muted mb-4">Kirim pesan detail via email untuk pertanyaan kompleks</p>
                        <a href="mailto:BinaDesa@gmail.com" class="btn-modern btn-primary-modern w-100">
                            <i class="fas fa-envelope me-2"></i>BinaDesa@gmail.com
                        </a>
                    </div>
                </div>

                <!-- Lokasi -->
                <div class="col-md-6 col-lg-3">
                    <div class="contact-service-item">
                        <div class="service-icon-modern bg-warning">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Alamat</h5>
                        <p class="text-muted mb-4">Kunjungi kantor kami untuk konsultasi langsung</p>
                        <a href="https://maps.google.com" target="_blank" class="btn-modern btn-primary-modern w-100">
                            <i class="fas fa-map-marker-alt me-2"></i>Lihat Peta
                        </a>
                    </div>
                </div>
            </div>

            <!-- Additional Information Section -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card-modern">
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-info-circle"></i>
                                <h5>Informasi Kontak Lainnya</h5>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="card-warga">
                                        <div class="card-warga-header">
                                            <div class="user-avatar-modern">
                                                <i class="fas fa-clock"></i>
                                            </div>
                                            <div class="user-info">
                                                <h6 class="user-name">Jam Operasional</h6>
                                                <span class="badge-gender badge-male">
                                                    <i class="fas fa-business-time me-1"></i>
                                                    Waktu Layanan
                                                </span>
                                            </div>
                                        </div>
                                        <div class="card-warga-body">
                                            <div class="info-item">
                                                <div class="info-icon bg-primary">
                                                    <i class="fas fa-calendar-day"></i>
                                                </div>
                                                <div class="info-content">
                                                    <span class="info-label">Senin - Jumat</span>
                                                    <span class="info-value">08:00 - 17:00 WIB</span>
                                                </div>
                                            </div>
                                            <div class="info-item">
                                                <div class="info-icon bg-success">
                                                    <i class="fas fa-calendar-week"></i>
                                                </div>
                                                <div class="info-content">
                                                    <span class="info-label">Sabtu</span>
                                                    <span class="info-value">08:00 - 12:00 WIB</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-warga">
                                        <div class="card-warga-header">
                                            <div class="user-avatar-modern">
                                                <i class="fas fa-users"></i>
                                            </div>
                                            <div class="user-info">
                                                <h6 class="user-name">Contact Person</h6>
                                                <span class="badge-gender badge-male">
                                                    <i class="fas fa-user-tie me-1"></i>
                                                    Tim Admin
                                                </span>
                                            </div>
                                        </div>
                                        <div class="card-warga-body">
                                            <div class="info-item">
                                                <div class="info-icon bg-primary">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                                <div class="info-content">
                                                    <span class="info-label">Admin 1</span>
                                                    <span class="info-value">+62 812 3456 7890</span>
                                                </div>
                                            </div>
                                            <div class="info-item">
                                                <div class="info-icon bg-success">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                                <div class="info-content">
                                                    <span class="info-label">Admin 2</span>
                                                    <span class="info-value">+62 823 4567 8901</span>
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

            <!-- Contact Form Section -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card-modern">
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-envelope"></i>
                                <h5>Form Kontak</h5>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <form>
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <label class="form-label-modern">Nama Lengkap</label>
                                        <input type="text" class="form-control-modern" placeholder="Masukkan nama lengkap" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label-modern">Email</label>
                                        <input type="email" class="form-control-modern" placeholder="Masukkan email" required>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label-modern">Subjek</label>
                                        <input type="text" class="form-control-modern" placeholder="Masukkan subjek pesan" required>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label-modern">Pesan</label>
                                        <textarea class="form-control-modern" rows="5" placeholder="Tulis pesan Anda di sini..." required></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn-modern btn-primary-modern w-100">
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
    <!-- Content End -->

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
    <a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top">
        <i class="fa fa-arrow-up"></i>
    </a>

    <!-- JavaScript Libraries -->
    @include('guest.layouts.warga.js')

    <script>
        $(document).ready(function() {
            // Remove spinner if exists
            $('#spinner').remove();

            // WhatsApp button functionality
            $('.whatsapp-main-button').on('click', function(e) {
                // Optional: Add analytics tracking here
                console.log('WhatsApp button clicked');

                // The link will naturally redirect to WhatsApp
                // No need for additional JavaScript for basic functionality
            });

            // Optional: Add smooth scroll for back to top button
            $('.back-to-top').on('click', function(e) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: 0
                }, 800);
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
