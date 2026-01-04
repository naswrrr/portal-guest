@extends('layouts.guest.app')
{{--
    Menggunakan layout utama halaman guest
    Berisi struktur HTML utama, navbar, footer, dan asset CSS/JS
--}}

@section('content')
{{--
    Section konten utama halaman kontak
--}}

<!-- ===================== CONTENT START ===================== -->
<div class="container-fluid content-section">
    {{-- Wrapper full width halaman --}}

    <div class="container py-5">
        {{-- Container utama dengan padding vertikal --}}

        <!-- ===================== PAGE HEADER ===================== -->
        <div class="page-header-modern text-center mb-5">
            {{-- Ikon header --}}
            <div class="header-icon">
                <i class="fas fa-phone-alt"></i>
            </div>

            {{-- Subjudul --}}
            <h5 class="text-primary fw-bold text-uppercase mb-2">
                Kontak Kami
            </h5>

            {{-- Judul utama --}}
            <h1 class="display-4 fw-bold mb-3">
                Hubungi Kami
            </h1>

            {{-- Deskripsi --}}
            <p class="text-muted fs-5 mb-0">
                Kami siap membantu Anda dengan segala pertanyaan dan kebutuhan
                informasi seputar Portal Bina Desa
            </p>
        </div>
        <!-- ===================== END PAGE HEADER ===================== -->


        <!-- ===================== LAYANAN KONTAK ===================== -->
        <div class="action-bar mb-4">
            <div class="action-left">
                <h4 class="mb-0 fw-bold text-dark">
                    <i class="fas fa-headset me-2 text-primary"></i>
                    Layanan Kontak
                </h4>
                <p class="text-muted mb-0 mt-1">
                    Pilih metode kontak yang paling nyaman untuk Anda
                </p>
            </div>
        </div>
        <!-- ===================== END LAYANAN KONTAK ===================== -->


        <!-- ===================== INFORMASI KONTAK TAMBAHAN ===================== -->
        <div class="row mt-5">
            <div class="col-12">

                <div class="card-modern">
                    {{-- Card utama informasi tambahan --}}

                    <!-- Header card -->
                    <div class="card-header-modern">
                        <div class="header-content">
                            <i class="fas fa-info-circle"></i>
                            <h5>Informasi Kontak Lainnya</h5>
                        </div>
                    </div>

                    <!-- Body card -->
                    <div class="card-body p-4">
                        <div class="row g-4">

                            <!-- JAM OPERASIONAL -->
                            <div class="col-md-6">
                                <div class="card-warga">

                                    <!-- Header card jam operasional -->
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

                                    <!-- Body card jam operasional -->
                                    <div class="card-warga-body">

                                        <!-- Hari kerja -->
                                        <div class="info-item">
                                            <div class="info-icon bg-primary">
                                                <i class="fas fa-calendar-day"></i>
                                            </div>
                                            <div class="info-content">
                                                <span class="info-label">Senin - Jumat</span>
                                                <span class="info-value">08:00 - 17:00 WIB</span>
                                            </div>
                                        </div>

                                        <!-- Hari Sabtu -->
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

                            <!-- CONTACT PERSON -->
                            <div class="col-md-6">
                                <div class="card-warga">

                                    <!-- Header card contact person -->
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

                                    <!-- Body card contact person -->
                                    <div class="card-warga-body">

                                        <!-- Admin 1 -->
                                        <div class="info-item">
                                            <div class="info-icon bg-primary">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <div class="info-content">
                                                <span class="info-label">Admin 1</span>
                                                <span class="info-value">+62 812 3456 7890</span>
                                            </div>
                                        </div>

                                        <!-- Admin 2 -->
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
                            <!-- END CONTACT PERSON -->

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- ===================== END INFORMASI KONTAK ===================== -->


        <!-- ===================== FORM KONTAK ===================== -->
        <div class="row mt-5">
            <div class="col-12">

                <div class="card-modern">

                    <!-- Header form -->
                    <div class="card-header-modern">
                        <div class="header-content">
                            <i class="fas fa-envelope"></i>
                            <h5>Form Kontak</h5>
                        </div>
                    </div>

                    <!-- Body form -->
                    <div class="card-body p-4">
                        <form>
                            {{-- Form untuk mengirim pesan ke admin --}}
                            <div class="row g-4">

                                <!-- Nama -->
                                <div class="col-md-6">
                                    <label class="form-label-modern">Nama Lengkap</label>
                                    <input type="text"
                                           class="form-control-modern"
                                           placeholder="Masukkan nama lengkap"
                                           required>
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <label class="form-label-modern">Email</label>
                                    <input type="email"
                                           class="form-control-modern"
                                           placeholder="Masukkan email"
                                           required>
                                </div>

                                <!-- Subjek -->
                                <div class="col-12">
                                    <label class="form-label-modern">Subjek</label>
                                    <input type="text"
                                           class="form-control-modern"
                                           placeholder="Masukkan subjek pesan"
                                           required>
                                </div>

                                <!-- Pesan -->
                                <div class="col-12">
                                    <label class="form-label-modern">Pesan</label>
                                    <textarea class="form-control-modern"
                                              rows="5"
                                              placeholder="Tulis pesan Anda di sini..."
                                              required></textarea>
                                </div>

                                <!-- Tombol kirim -->
                                <div class="col-12">
                                    <button type="submit"
                                            class="btn-modern btn-primary-modern w-100">
                                        <i class="fas fa-paper-plane me-2"></i>
                                        Kirim Pesan
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- ===================== END FORM KONTAK ===================== -->

    </div>
</div>
<!-- ===================== CONTENT END ===================== -->

@endsection
