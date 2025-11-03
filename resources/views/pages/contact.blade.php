@extends('layouts.guest.app')

@section('content')
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
    @endsection
