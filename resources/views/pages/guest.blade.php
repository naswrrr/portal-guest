@extends('layouts.guest.app')

@section('content')

<div class="container-fluid carousel-header vh-100 px-0">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="{{ asset('assets-guest/img/background1.jpg') }}" class="img-fluid" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Selamat
                                Datang di Portal Desa</h4>
                            <h1 class="display-1 text-capitalize text-white mb-4">Desa Maju Mandiri</h1>
                            <p class="mb-5 fs-5">Portal informasi dan layanan desa untuk memajukan kesejahteraan
                                masyarakat dan pembangunan desa yang berkelanjutan.
                            </p>
                            <div class="d-flex align-items-center justify-content-center">
                                <a class="btn-hover-bg btn btn-primary text-white py-3 px-5"
                                    href="#about">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets-guest/img/background2.jpg') }}" class="img-fluid" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Data
                                Terintegrasi</h4>
                            <h1 class="display-1 text-capitalize text-white mb-4">Warga Desa</h1>
                            <p class="mb-5 fs-5">Sistem terpadu untuk mengelola data warga, berita, dan informasi desa
                                secara digital dan transparan.
                            </p>
                            <div class="d-flex align-items-center justify-content-center">
                                <a class="btn-hover-bg btn btn-primary text-white py-3 px-5"
                                    href="{{ route('warga.index') }}">Lihat Data Warga</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets-guest/img/background3.jpg') }}" class="img-fluid" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Informasi
                                Terkini</h4>
                            <h1 class="display-1 text-capitalize text-white mb-4">Berita Desa</h1>
                            <p class="mb-5 fs-5">Dapatkan informasi terbaru seputar kegiatan, program, dan perkembangan
                                desa melalui kategori berita yang terorganisir.
                            </p>
                            <div class="d-flex align-items-center justify-content-center">
                                <a class="btn-hover-bg btn btn-primary text-white py-3 px-5"
                                    href="{{ route('kategori_berita.index') }}">Lihat Kategori Berita</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- About Start -->
         <div id="about" class="container-fluid about py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-xl-5">
                    <div class="h-100">
                        <img src="{{ asset('assets-guest/img/background4.jpg') }}" class="img-fluid w-100 h-100"
                            alt="Image">
                    </div>
                </div>
                <div class="col-xl-7">
                    <h5 class="text-uppercase text-primary">Tentang Kami</h5>
                    <h1 class="mb-4">Portal Bina Desa - Membangun Desa Mandiri</h1>
                    <p class="fs-5 mb-4">Portal Bina Desa merupakan sistem informasi desa yang bertujuan untuk
                        memajukan pembangunan desa melalui digitalisasi data dan informasi. Kami berkomitmen untuk
                        meningkatkan pelayanan kepada warga dan transparansi pengelolaan desa.
                    </p>
                    <div class="tab-class bg-light p-4"> <!-- Changed from bg-secondary to bg-light -->
                        <ul class="nav d-flex mb-2">
                            <li class="nav-item mb-3">
                                <a class="d-flex py-2 text-center bg-white active" data-bs-toggle="pill"
                                    href="#tab-1">
                                    <span class="text-dark" style="width: 150px;">Tentang</span>
                                </a>
                            </li>
                            <li class="nav-item mb-3">
                                <a class="d-flex py-2 mx-3 text-center bg-white" data-bs-toggle="pill"
                                    href="#tab-2">
                                    <span class="text-dark" style="width: 150px;">Misi</span>
                                </a>
                            </li>
                            <li class="nav-item mb-3">
                                <a class="d-flex py-2 text-center bg-white" data-bs-toggle="pill" href="#tab-3">
                                    <span class="text-dark" style="width: 150px;">Visi</span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane fade show p-0 active">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex">
                                            <div class="text-start my-auto">
                                                <h5 class="text-uppercase mb-3">Portal Bina Desa</h5>
                                                <p class="mb-4">Sebagai wujud komitmen dalam membangun desa digital,
                                                    kami menyediakan platform terintegrasi untuk mengelola data warga,
                                                    informasi desa, dan layanan publik secara online.
                                                </p>
                                                <div class="d-flex align-items-center justify-content-start">
                                                    <a class="btn-hover-bg btn btn-primary text-white py-2 px-4"
                                                        href="#">Selengkapnya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane fade show p-0">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex">
                                            <div class="text-start my-auto">
                                                <h5 class="text-uppercase mb-3">Misi Kami</h5>
                                                <p class="mb-4">Meningkatkan kualitas pelayanan publik melalui
                                                    digitalisasi, mempermudah akses informasi bagi warga, dan
                                                    menciptakan tata kelola desa yang transparan dan akuntabel.
                                                </p>
                                                <div class="d-flex align-items-center justify-content-start">
                                                    <a class="btn-hover-bg btn btn-primary text-white py-2 px-4"
                                                        href="#">Selengkapnya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-3" class="tab-pane fade show p-0">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex">
                                            <div class="text-start my-auto">
                                                <h5 class="text-uppercase mb-3">Visi Kami</h5>
                                                <p class="mb-4">Menjadi portal desa terdepan dalam mewujudkan desa
                                                    mandiri, sejahtera, dan berkelanjutan melalui pemanfaatan teknologi
                                                    informasi yang optimal.
                                                </p>
                                                <div class="d-flex align-items-center justify-content-start">
                                                    <a class="btn-hover-bg btn btn-primary text-white py-2 px-4"
                                                        href="#">Selengkapnya</a>
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
        </div>
    </div>

@endsection
