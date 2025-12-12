@extends('layouts.guest.app')

@section('content')
<!-- Content Start -->
<div class="container-fluid content-section" style="padding-top: 130px; padding-bottom: 80px;">
    <div class="container py-5">

        <!-- Page Header -->
        <div class="page-header-modern text-center mb-5">
            <div class="header-icon">
                <i class="fas fa-info-circle"></i>
            </div>
            <h5 class="text-primary fw-bold text-uppercase mb-2">Tentang Kami</h5>
            <h1 class="display-4 fw-bold mb-3">Portal Bina Desa</h1>
            <p class="text-muted fs-5 mb-0">Membangun Desa Mandiri Melalui Teknologi Digital</p>
        </div>

        <!-- Hero Section -->
        <div class="row g-4 mb-5 align-items-center">
            <div class="col-lg-6">
                <div class="card-modern overflow-hidden shadow-lg">
                    <img src="{{ asset('assets-guest/img/background1.jpg') }}" class="img-fluid w-100" alt="Portal Bina Desa" style="height:420px; object-fit:cover;">
                    
                </div>
            </div>
            <div class="col-lg-6">
                <div class="p-4 p-md-5">
                    <span class="badge bg-primary px-3 py-2 mb-3 rounded-pill"><i class="fas fa-globe me-2"></i>Portal Digital Desa</span>
                    <h2 class="fw-bold mb-3">Transformasi Digital untuk Desa Modern</h2>
                    <p class="text-muted fs-6 lh-lg mb-4">
                        Portal Bina Desa adalah sistem informasi desa yang memajukan pembangunan desa melalui digitalisasi data dan informasi. Kami meningkatkan pelayanan warga dan transparansi pengelolaan desa.
                    </p>

                    <div class="d-flex gap-4 mb-4">
                        <div class="text-center">
                            <div class="fs-3 fw-bold text-primary">100+</div>
                            <small class="text-muted">Warga Terdaftar</small>
                        </div>
                        <div class="text-center">
                            <div class="fs-3 fw-bold text-success">50+</div>
                            <small class="text-muted">Layanan Digital</small>
                        </div>
                        <div class="text-center">
                            <div class="fs-3 fw-bold text-info">24/7</div>
                            <small class="text-muted">Akses Portal</small>
                        </div>
                    </div>

                    <a href="{{ route('login') }}" class="btn-modern btn-primary-modern px-4 py-2 mt-2"><i class="fas fa-sign-in-alt me-2"></i>Mulai Sekarang</a>
                </div>
            </div>
        </div>

        <!-- Visi & Misi Section -->
        <div class="card-modern mb-5">
            <div class="card-header-modern">
                <div class="header-content">
                    <i class="fas fa-bullseye"></i>
                    <h5>Visi & Misi Kami</h5>
                </div>
            </div>
            <div class="card-body p-4">
                <ul class="nav nav-pills justify-content-center mb-4" id="visiMisiTab" role="tablist">
                    <li class="nav-item mx-1">
                        <button class="nav-link active rounded-pill" id="visi-tab" data-bs-toggle="pill" data-bs-target="#visi" type="button">Visi</button>
                    </li>
                    <li class="nav-item mx-1">
                        <button class="nav-link rounded-pill" id="misi-tab" data-bs-toggle="pill" data-bs-target="#misi" type="button">Misi</button>
                    </li>
                    <li class="nav-item mx-1">
                        <button class="nav-link rounded-pill" id="nilai-tab" data-bs-toggle="pill" data-bs-target="#nilai" type="button">Nilai</button>
                    </li>
                </ul>

                <div class="tab-content">
                    <!-- Visi -->
                    <div class="tab-pane fade show active" id="visi">
                        <div class="p-4 text-center">
                            <h6 class="fw-bold mb-2">Visi Portal Bina Desa</h6>
                            <p class="text-muted">Menjadi portal desa terdepan dalam mewujudkan desa mandiri, sejahtera, dan berkelanjutan melalui pemanfaatan teknologi informasi yang inovatif dan inklusif.</p>
                        </div>
                    </div>

                    <!-- Misi -->
                    <div class="tab-pane fade" id="misi">
                        <div class="row g-3">
                            @php
                                $missions = [
                                    "Meningkatkan kualitas pelayanan publik melalui digitalisasi sistem administrasi desa",
                                    "Mempermudah akses informasi bagi warga dengan platform yang user-friendly",
                                    "Menciptakan tata kelola desa yang transparan dan akuntabel",
                                    "Memberdayakan masyarakat desa melalui literasi digital dan teknologi"
                                ];
                            @endphp
                            @foreach($missions as $i => $mission)
                                <div class="col-md-6">
                                    <div class="p-3 border rounded shadow-sm d-flex align-items-start gap-3 hover-card">
                                        <div class="badge rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width:40px;height:40px;">{{ $i+1 }}</div>
                                        <p class="mb-0 text-muted">{{ $mission }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Nilai -->
                    <div class="tab-pane fade" id="nilai">
                        <div class="row g-4 text-center">
                            @php
                                $values = [
                                    ["Integritas", "Menjunjung tinggi kejujuran dan transparansi", "shield-alt", "primary"],
                                    ["Inovasi", "Terus berinovasi memberikan solusi terbaik", "rocket", "success"],
                                    ["Kolaborasi", "Membangun kerjasama yang solid dengan stakeholder", "users", "info"]
                                ];
                            @endphp
                            @foreach($values as $val)
                                <div class="col-md-4">
                                    <div class="p-4 border rounded shadow-sm hover-card">
                                        <div class="bg-{{ $val[3] }} bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width:70px;height:70px;">
                                            <i class="fas fa-{{ $val[2] }} fa-2x text-{{ $val[3] }}"></i>
                                        </div>
                                        <h5 class="fw-bold mb-2">{{ $val[0] }}</h5>
                                        <p class="text-muted small mb-0">{{ $val[1] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tujuan & Alur -->
        <div class="row g-4 mb-5">
            <div class="col-lg-6">
                <div class="card-modern h-100">
                    <div class="card-header-modern">
                        <div class="header-content">
                            <i class="fas fa-bullseye"></i>
                            <h5>Tujuan Portal</h5>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Memudahkan akses data dan informasi desa secara real-time</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Meningkatkan efisiensi administrasi dan pelayanan publik</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Transparansi pengelolaan dan pengambilan keputusan desa</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Pemberdayaan masyarakat melalui teknologi informasi</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i>Meningkatkan partisipasi warga dalam pembangunan desa</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card-modern h-100">
                    <div class="card-header-modern">
                        <div class="header-content">
                            <i class="fas fa-stream"></i>
                            <h5>Alur Sistem</h5>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        @php
                            $steps = [
                                ["Registrasi & Login", "Warga mendaftar dan login ke sistem portal", "primary"],
                                ["Akses Informasi", "Mengakses data warga, berita, dan layanan desa", "success"],
                                ["Pengajuan Layanan", "Mengajukan permohonan surat atau layanan online", "info"],
                                ["Verifikasi & Selesai", "Admin memverifikasi dan memproses layanan", "warning"]
                            ];
                        @endphp
                        @foreach($steps as $i => $step)
                            <div class="d-flex align-items-start mb-3 gap-3">
                                <div class="badge rounded-circle bg-{{ $step[2] }} text-white d-flex align-items-center justify-content-center" style="width:45px;height:45px;">{{ $i+1 }}</div>
                                <div>
                                    <h6 class="fw-bold mb-1">{{ $step[0] }}</h6>
                                    <p class="text-muted small mb-0">{{ $step[1] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Fitur Utama -->
        <div class="card-modern text-center mb-5">
            <div class="card-header-modern">
                <div class="header-content">
                    <i class="fas fa-th-large"></i>
                    <h5>Fitur Utama Portal</h5>
                </div>
            </div>
            <div class="card-body p-4">
                <div class="row g-4 justify-content-center">
                    @php
                        $features = [
                            ["Data Warga", "Kelola data penduduk secara digital dan terstruktur", "users", "primary"],
                            ["Berita Desa", "Informasi terkini seputar kegiatan dan program desa", "newspaper", "success"],
                            ["Berita", "Pengajuan berita beserta kategori beritasecara online dan cepat", "file-alt", "info"],
                            ["Dashboard", "Monitoring dan analisis data desa real-time", "chart-line", "warning"]
                        ];
                    @endphp
                    @foreach($features as $feat)
                        <div class="col-md-6 col-lg-3">
                            <div class="p-4 border rounded shadow-sm hover-card text-center">
                                <div class="bg-{{ $feat[3] }} bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width:70px;height:70px;">
                                    <i class="fas fa-{{ $feat[2] }} fa-2x text-{{ $feat[3] }}"></i>
                                </div>
                                <h5 class="fw-bold mb-2">{{ $feat[0] }}</h5>
                                <p class="text-muted small mb-0">{{ $feat[1] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Content End -->
@endsection
