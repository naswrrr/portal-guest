@extends('layouts.guest.app')
{{--
    Menggunakan layout utama untuk halaman guest
    Biasanya berisi navbar, footer, serta asset CSS & JS global
--}}

@section('content')
{{--
    Section konten utama halaman Tentang Kami
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
                <i class="fas fa-info-circle"></i>
            </div>

            {{-- Subjudul --}}
            <h5 class="text-primary fw-bold text-uppercase mb-2">
                Tentang Kami
            </h5>

            {{-- Judul utama --}}
            <h1 class="display-4 fw-bold mb-3">
                Portal Bina Desa
            </h1>

            {{-- Deskripsi singkat --}}
            <p class="text-muted fs-5 mb-0">
                Membangun Desa Mandiri Melalui Teknologi Digital
            </p>
        </div>
        <!-- ===================== END PAGE HEADER ===================== -->


        <!-- ===================== ACTION BAR ===================== -->
        <div class="action-bar mb-4">
            {{-- Informasi ringkas konteks halaman --}}
            <div class="action-left">
                <h4 class="mb-0 fw-bold text-dark">
                    <i class="fas fa-globe me-2 text-primary"></i>
                    Profil Portal
                </h4>
                <p class="text-muted mb-0 mt-1">
                    Informasi singkat mengenai Portal Bina Desa
                </p>
            </div>
        </div>
        <!-- ===================== END ACTION BAR ===================== -->


        <!-- ===================== HERO / DESKRIPSI ===================== -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="card-modern">
                    {{-- Card utama deskripsi portal --}}

                    <div class="card-body p-4">
                        <div class="row align-items-center g-4">

                            <!-- Gambar ilustrasi -->
                            <div class="col-lg-6">
                                <img src="{{ asset('assets-guest/img/background1.jpg') }}"
                                     class="img-fluid rounded shadow-sm"
                                     style="height:420px;object-fit:cover;width:100%;">
                            </div>

                            <!-- Teks deskripsi -->
                            <div class="col-lg-6">
                                <span class="badge bg-primary mb-3 px-3 py-2 rounded-pill">
                                    <i class="fas fa-digital-tachograph me-1"></i>
                                    Sistem Informasi Desa
                                </span>

                                <h3 class="fw-bold mb-3">
                                    Transformasi Digital Desa
                                </h3>

                                <p class="text-muted lh-lg">
                                    Portal Bina Desa adalah sistem informasi desa yang bertujuan
                                    meningkatkan pelayanan publik, transparansi, dan akses
                                    informasi bagi masyarakat desa melalui teknologi digital.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ===================== END HERO ===================== -->


        <!-- ===================== VISI & MISI ===================== -->
        <div class="row mb-5">
            <div class="col-12">

                <div class="card-modern">
                    {{-- Card visi dan misi --}}

                    <div class="card-header-modern">
                        <div class="header-content">
                            <i class="fas fa-bullseye"></i>
                            <h5>Visi & Misi</h5>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <div class="row g-4">

                            <!-- Visi -->
                            <div class="col-md-6">
                                <h6 class="fw-bold mb-2">Visi</h6>
                                <p class="text-muted">
                                    Menjadi portal desa terdepan dalam mewujudkan desa mandiri,
                                    sejahtera, dan berkelanjutan melalui teknologi informasi.
                                </p>
                            </div>

                            <!-- Misi -->
                            <div class="col-md-6">
                                <h6 class="fw-bold mb-2">Misi</h6>
                                <ul class="text-muted">
                                    <li>Meningkatkan kualitas pelayanan publik</li>
                                    <li>Mempermudah akses informasi warga</li>
                                    <li>Mewujudkan tata kelola desa transparan</li>
                                    <li>Mendorong literasi digital masyarakat</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- ===================== END VISI & MISI ===================== -->


        <!-- ===================== TUJUAN & ALUR SISTEM ===================== -->
        <div class="row g-4 mb-5">

            <!-- Tujuan Portal -->
            <div class="col-md-6">
                <div class="card-modern h-100">
                    <div class="card-header-modern">
                        <div class="header-content">
                            <i class="fas fa-check-circle"></i>
                            <h5>Tujuan Portal</h5>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <ul class="text-muted mb-0">
                            <li>Akses data desa secara real-time</li>
                            <li>Efisiensi pelayanan publik</li>
                            <li>Transparansi pengelolaan desa</li>
                            <li>Pemberdayaan masyarakat</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Alur Sistem -->
            <div class="col-md-6">
                <div class="card-modern h-100">
                    <div class="card-header-modern">
                        <div class="header-content">
                            <i class="fas fa-stream"></i>
                            <h5>Alur Sistem</h5>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <ol class="text-muted mb-0">
                            <li>Registrasi & Login</li>
                            <li>Akses Informasi</li>
                            <li>Pengajuan Layanan</li>
                            <li>Verifikasi & Selesai</li>
                        </ol>
                    </div>
                </div>
            </div>

        </div>
        <!-- ===================== END TUJUAN & ALUR ===================== -->


        <!-- ===================== FITUR UTAMA ===================== -->
        <div class="row">
            <div class="col-12">

                <div class="card-modern">
                    {{-- Card daftar fitur utama --}}

                    <div class="card-header-modern">
                        <div class="header-content">
                            <i class="fas fa-th-large"></i>
                            <h5>Fitur Utama</h5>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <div class="row g-4">

                            <!-- Data Warga -->
                            <div class="col-md-3">
                                <div class="text-center">
                                    <i class="fas fa-users fa-2x text-primary mb-2"></i>
                                    <h6 class="fw-bold">Data Warga</h6>
                                    <p class="text-muted small">
                                        Manajemen data penduduk
                                    </p>
                                </div>
                            </div>

                            <!-- Berita Desa -->
                            <div class="col-md-3">
                                <div class="text-center">
                                    <i class="fas fa-newspaper fa-2x text-success mb-2"></i>
                                    <h6 class="fw-bold">Berita Desa</h6>
                                    <p class="text-muted small">
                                        Informasi kegiatan desa
                                    </p>
                                </div>
                            </div>

                            <!-- Layanan Online -->
                            <div class="col-md-3">
                                <div class="text-center">
                                    <i class="fas fa-file-alt fa-2x text-info mb-2"></i>
                                    <h6 class="fw-bold">Layanan Online</h6>
                                    <p class="text-muted small">
                                        Pengajuan layanan digital
                                    </p>
                                </div>
                            </div>

                            <!-- Dashboard -->
                            <div class="col-md-3">
                                <div class="text-center">
                                    <i class="fas fa-chart-line fa-2x text-warning mb-2"></i>
                                    <h6 class="fw-bold">Dashboard</h6>
                                    <p class="text-muted small">
                                        Monitoring data desa
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- ===================== END FITUR UTAMA ===================== -->

    </div>
</div>
<!-- ===================== CONTENT END ===================== -->

@endsection
