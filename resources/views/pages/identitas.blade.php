@extends('layouts.guest.app')

@section('content')
    <div class="container-fluid content-section">
        <div class="container py-5">

            <!-- Header -->
            <div class="page-header-modern text-center mb-5">
                <div class="header-icon">
                    <i class="fas fa-user-cog"></i>
                </div>
                <h5 class="text-primary fw-bold text-uppercase mb-2">Identitas Pengembang</h5>
                <h1 class="display-4 fw-bold mb-3">Profil Pengembang Portal Desa</h1>
                <p class="text-muted fs-5 mb-0">Informasi lengkap tentang pengembang sistem Portal Desa</p>
            </div>

            <!-- WRAPPER IDENTITAS -->
            <div class="card-modern p-5 mx-auto shadow-lg rounded-4 border-0 bg-white position-relative overflow-hidden"
                style="max-width: 900px;">

                <!-- BACKGROUND PATTERN -->
                <div class="position-absolute top-0 end-0 opacity-10"
                    style="width: 220px; height: 220px; background: url('https://www.svgrepo.com/show/331368/abstract.svg') no-repeat; background-size: contain;">
                </div>

                <!-- Foto + Nama -->
                <div class="text-center mb-4">
                    <img src="{{ asset('assets-guest/img/kendal.jpg') }}"
                        class="rounded-circle shadow-lg border border-4 border-white"
                        style="width:150px; height:150px; object-fit:cover;" alt="Foto Developer">

                    <h2 class="fw-bold mt-3 mb-1 text-dark">Nasywa Jenner</h2>
                    <p class="text-muted fs-5 mb-0">Full Stack Developer</p>

                    <!-- Divider -->
                    <div class="mx-auto mt-3" style="width:80px; height:4px; background:#0d6efd; border-radius:10px;"></div>
                </div>

                <!-- INFORMASI -->
                <div class="row g-4 mt-4">

                    @php
                        $infoItems = [
                            ['icon' => 'fa-id-card', 'label' => 'NIM', 'value' => '2457301109', 'color' => 'primary'],
                            [
                                'icon' => 'fa-graduation-cap',
                                'label' => 'Program Studi',
                                'value' => 'Sistem Informasi',
                                'color' => 'warning',
                            ],
                            [
                                'icon' => 'fa-university',
                                'label' => 'Universitas',
                                'value' => 'Politeknik Caltex Riau',
                                'color' => 'success',
                            ],
                            [
                                'icon' => 'fa-envelope',
                                'label' => 'Email',
                                'value' => 'nasywa24si@mahasiswa.pcr.ac.id',
                                'color' => 'info',
                            ],
                        ];
                    @endphp

                    @foreach ($infoItems as $item)
                        <div class="col-md-6">
                            <div class="d-flex align-items-center p-3 rounded-3 shadow-sm bg-light hover-card"
                                style="transition: .2s;">
                                <div class="icon rounded-circle d-flex justify-content-center align-items-center me-3
                                bg-{{ $item['color'] }} text-white shadow"
                                    style="width:55px; height:55px; font-size:20px;">
                                    <i class="fas {{ $item['icon'] }}"></i>
                                </div>
                                <div class="info">
                                    <label class="text-muted small">{{ $item['label'] }}</label>
                                    <h6 class="fw-bold mb-0">{{ $item['value'] }}</h6>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                <!-- BIO -->
                <div class="mt-5">
                    <h5 class="fw-bold mb-3 text-primary">
                        <i class="fas fa-user-edit me-2"></i>Tentang Saya
                    </h5>
                    <p class="text-muted fst-italic" style="line-height:1.7;">
                        Seorang pengembang yang fokus pada pengembangan aplikasi berbasis web modern.
                        Berpengalaman dalam backend & frontend, serta menyukai desain UI/UX minimalis.
                    </p>
                </div>

                <div class="mt-4">
                    <h5 class="fw-bold mb-3 text-primary">
                        <i class="fas fa-tools me-2"></i>Keahlian
                    </h5>

                    <div class="d-flex flex-wrap gap-2">
                        @foreach (['Laravel', 'PHP', 'JavaScript', 'MySQL', 'Bootstrap', 'Git'] as $skill)
                            <span class="badge bg-primary px-3 py-2 shadow-sm rounded-pill text-white">
                                {{ $skill }}
                            </span>
                        @endforeach
                    </div>
                </div>


                <!-- SOSIAL MEDIA -->
                <div class="mt-5 text-center">
                    <h5 class="fw-bold mb-3 text-primary">
                        <i class="fas fa-share-alt me-2"></i>Hubungi Saya
                    </h5>

                    <div class="d-flex justify-content-center gap-3">
                        @php
                            $socials = [
                                ['link' => 'https://www.linkedin.com/in/nasywa-azzahro-b7b7b13a0?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app ', 'icon' => 'fab fa-linkedin', 'color' => 'primary'],
                                ['link' => 'https://github.com/naswrrr/portal-guest.git', 'icon' => 'fab fa-github', 'color' => 'dark'],
                                ['link' => 'https://www.instagram.com/nasiwwaa?igsh=MW5mcDAya2EwNGFlaQ%3D%3D&utm_source=qr ', 'icon' => 'fab fa-instagram', 'color' => 'danger'],
                                ['link' => 'mailto:nasywa24si@mahasiswa.pcr.ac.id', 'icon' => 'fas fa-envelope', 'color' => 'info'],
                            ];
                        @endphp

                        @foreach ($socials as $s)
                            <a href="{{ $s['link'] }}"
                                class="btn btn-{{ $s['color'] }} shadow btn-lg rounded-circle d-flex justify-content-center align-items-center"
                                style="width:58px; height:58px;">
                                <i class="{{ $s['icon'] }} fa-lg text-white"></i>
                            </a>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>

    </div>
    </div>
@endsection
