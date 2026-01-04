@extends('layouts.guest.app')
{{--
    Menggunakan layout utama untuk halaman guest (pengunjung)
    Biasanya berisi <head>, navbar, footer, dll
--}}

@section('content')
{{--
    Section content: seluruh isi halaman akan dimasukkan
    ke @yield('content') di layout
--}}

    <!-- ===================== CAROUSEL HEADER START ===================== -->
    <div class="container-fluid carousel-header vh-100 px-0">
        {{--
            container-fluid  : full width
            vh-100           : tinggi 100% viewport
            px-0             : tanpa padding horizontal
        --}}

        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            {{--
                Carousel Bootstrap
                data-bs-ride="carousel" => otomatis berjalan
            --}}

            <!-- Indicator / titik navigasi carousel -->
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
            </ol>

            <!-- Isi carousel -->
            <div class="carousel-inner" role="listbox">

                <!-- SLIDE 1 -->
                <div class="carousel-item active">
                    {{-- Gambar background slide --}}
                    <img src="{{ asset('assets-guest/img/background1.jpg') }}" class="img-fluid" alt="Image">

                    {{-- Caption / teks di atas gambar --}}
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">
                                Selamat Datang di Portal Desa
                            </h4>
                            <h1 class="display-1 text-capitalize text-white mb-4">
                                Desa Maju Mandiri
                            </h1>
                            <p class="mb-5 fs-5">
                                Portal informasi dan layanan desa untuk memajukan kesejahteraan
                                masyarakat dan pembangunan desa yang berkelanjutan.
                            </p>

                            {{-- Tombol menuju section About --}}
                            <div class="d-flex align-items-center justify-content-center">
                                <a class="btn-hover-bg btn btn-primary text-white py-3 px-5" href="#about">
                                    Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SLIDE 2 -->
                <div class="carousel-item">
                    <img src="{{ asset('assets-guest/img/background2.jpg') }}" class="img-fluid" alt="Image">

                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">
                                Data Terintegrasi
                            </h4>
                            <h1 class="display-1 text-capitalize text-white mb-4">
                                Warga Desa
                            </h1>
                            <p class="mb-5 fs-5">
                                Sistem terpadu untuk mengelola data warga, berita,
                                dan informasi desa secara digital dan transparan.
                            </p>

                            {{-- Tombol menuju halaman data warga --}}
                            <div class="d-flex align-items-center justify-content-center">
                                <a class="btn-hover-bg btn btn-primary text-white py-3 px-5"
                                   href="{{ route('warga.index') }}">
                                    Lihat Data Warga
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SLIDE 3 -->
                <div class="carousel-item">
                    <img src="{{ asset('assets-guest/img/background3.jpg') }}" class="img-fluid" alt="Image">

                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">
                                Informasi Terkini
                            </h4>
                            <h1 class="display-1 text-capitalize text-white mb-4">
                                Berita Desa
                            </h1>
                            <p class="mb-5 fs-5">
                                Dapatkan informasi terbaru seputar kegiatan,
                                program, dan perkembangan desa.
                            </p>

                            {{-- Tombol menuju kategori berita --}}
                            <div class="d-flex align-items-center justify-content-center">
                                <a class="btn-hover-bg btn btn-primary text-white py-3 px-5"
                                   href="{{ route('kategori_berita.index') }}">
                                    Lihat Kategori Berita
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Tombol navigasi carousel -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                <span class="visually-hidden">Previous</span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- ===================== CAROUSEL HEADER END ===================== -->


    <!-- ===================== ABOUT SECTION START ===================== -->
    <div id="about" class="container-fluid about py-5">
        {{-- id="about" digunakan sebagai anchor dari tombol Selengkapnya --}}
        <div class="container py-5">

            <div class="row g-5">
                <!-- Kolom gambar -->
                <div class="col-xl-5 mb-4 mb-xl-0">
                    <img src="{{ asset('assets-guest/img/background4.jpg') }}"
                         class="img-fluid w-100"
                         alt="Image">
                </div>

                <!-- Kolom teks -->
                <div class="col-xl-7">
                    <h5 class="text-uppercase text-primary">Tentang Kami</h5>
                    <h1 class="mb-4">
                        Portal Bina Desa - Membangun Desa Mandiri
                    </h1>
                    <p class="fs-5 mb-4">
                        Portal Bina Desa merupakan sistem informasi desa
                        yang bertujuan untuk memajukan pembangunan desa
                        melalui digitalisasi data dan informasi.
                    </p>

                    <!-- Tab Tentang / Misi / Visi -->
                    <div class="tab-class bg-light p-4">

                        <!-- Navigasi tab -->
                        <ul class="nav nav-pills flex-column flex-md-row gap-2 mb-3">
                            <li class="nav-item flex-fill">
                                <a class="nav-link active text-center"
                                   data-bs-toggle="pill"
                                   href="#tab-1">
                                    Tentang
                                </a>
                            </li>
                            <li class="nav-item flex-fill">
                                <a class="nav-link text-center"
                                   data-bs-toggle="pill"
                                   href="#tab-2">
                                    Misi
                                </a>
                            </li>
                            <li class="nav-item flex-fill">
                                <a class="nav-link text-center"
                                   data-bs-toggle="pill"
                                   href="#tab-3">
                                    Visi
                                </a>
                            </li>
                        </ul>

                        <!-- Konten tab -->
                        <div class="tab-content">

                            <!-- TAB TENTANG -->
                            <div id="tab-1" class="tab-pane fade show active">
                                <h5 class="text-uppercase mb-3">Portal Bina Desa</h5>
                                <p class="mb-4">
                                    Platform terintegrasi untuk mengelola data warga,
                                    informasi desa, dan layanan publik secara online.
                                </p>
                            </div>

                            <!-- TAB MISI -->
                            <div id="tab-2" class="tab-pane fade">
                                <h5 class="text-uppercase mb-3">Misi Kami</h5>
                                <p class="mb-4">
                                    Meningkatkan kualitas pelayanan publik melalui
                                    digitalisasi dan transparansi pengelolaan desa.
                                </p>
                            </div>

                            <!-- TAB VISI -->
                            <div id="tab-3" class="tab-pane fade">
                                <h5 class="text-uppercase mb-3">Visi Kami</h5>
                                <p class="mb-4">
                                    Menjadi portal desa terdepan dalam mewujudkan
                                    desa mandiri dan berkelanjutan.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- ===================== ABOUT SECTION END ===================== -->

@endsection
