@extends('layouts.guest.app')
{{-- Menggunakan layout utama guest (template dasar halaman) --}}

@section('content')
    {{-- Memanggil navbar khusus guest --}}
    @include('layouts.guest.navbar')

    {{-- Container utama halaman --}}
    <div class="container-fluid content-section">
        <div class="container py-5">

            <!-- ================= PAGE HEADER ================= -->
            {{-- Header halaman edit agenda --}}
            <div class="page-header-modern text-center mb-5">
                <div class="header-icon">
                    {{-- Icon halaman --}}
                    <i class="fas fa-calendar-edit"></i>
                </div>
                <h5 class="text-primary fw-bold text-uppercase mb-2">Edit Agenda</h5>
                <h1 class="display-4 fw-bold mb-3">Perbarui Agenda</h1>
                <p class="text-muted fs-5 mb-0">
                    Update data agenda kegiatan desa
                </p>
            </div>

            <!-- ================= ACTION BAR ================= -->
            {{-- Bar aksi: judul halaman & tombol kembali --}}
            <div class="action-bar mb-4">
                <div class="action-left">
                    {{-- Judul section --}}
                    <h4 class="mb-0 fw-bold text-dark">
                        <i class="fas fa-edit me-2 text-primary"></i>
                        Edit Agenda
                    </h4>
                    {{-- Menampilkan judul agenda yang sedang diedit --}}
                    <p class="text-muted mb-0 mt-1">
                        Perbarui informasi agenda "{{ $agenda->judul }}"
                    </p>
                </div>

                {{-- Tombol kembali ke halaman index agenda --}}
                <div class="action-right">
                    <a href="{{ route('agenda.index') }}" class="btn-modern btn-secondary-modern">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </div>

            <!-- ================= ERROR ALERT ================= -->
            {{-- Menampilkan error validasi jika ada --}}
            @if ($errors->any())
                <div class="alert alert-modern alert-danger alert-dismissible fade show mb-4">
                    <div class="alert-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="alert-content">
                        <strong>Terjadi Kesalahan!</strong>
                        <ul class="mb-0 mt-2">
                            {{-- Loop semua pesan error --}}
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    {{-- Tombol close alert --}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- ================= CARD FORM ================= -->
            {{-- Card utama form edit --}}
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card-modern card-edit">

                        {{-- Header card --}}
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-edit"></i>
                                <h5>Form Edit Agenda</h5>
                            </div>
                        </div>

                        {{-- Body card --}}
                        <div class="card-body p-4">
                            {{-- Form update agenda --}}
                            <form action="{{ route('agenda.update', $agenda->agenda_id) }}" method="POST"
                                enctype="multipart/form-data">

                                {{-- CSRF protection --}}
                                @csrf

                                {{-- Method spoofing untuk PUT --}}
                                @method('PUT')

                                <div class="row g-4">

                                    <!-- ================= JUDUL ================= -->
                                    {{-- Input judul agenda --}}
                                    <div class="col-12">
                                        <label class="form-label-modern">
                                            Judul Agenda <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-heading"></i>
                                            </span>
                                            <input type="text" name="judul" class="form-control-modern"
                                                value="{{ old('judul', $agenda->judul) }}" required>
                                        </div>
                                    </div>

                                    <!-- ================= LOKASI ================= -->
                                    {{-- Input lokasi agenda --}}
                                    <div class="col-md-6">
                                        <label class="form-label-modern">
                                            Lokasi <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </span>
                                            <input type="text" name="lokasi" class="form-control-modern"
                                                value="{{ old('lokasi', $agenda->lokasi) }}" required>
                                        </div>
                                    </div>

                                    <!-- ================= PENYELENGGARA ================= -->
                                    {{-- Input nama penyelenggara --}}
                                    <div class="col-md-6">
                                        <label class="form-label-modern">
                                            Penyelenggara <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-building"></i>
                                            </span>
                                            <input type="text" name="penyelenggara" class="form-control-modern"
                                                value="{{ old('penyelenggara', $agenda->penyelenggara) }}" required>
                                        </div>
                                    </div>

                                    <!-- ================= TANGGAL MULAI ================= -->
                                    {{-- Input tanggal mulai agenda --}}
                                    <div class="col-md-6">
                                        <label class="form-label-modern">
                                            Tanggal Mulai <span class="text-danger">*</span>
                                        </label>
                                        <input type="date" name="tanggal_mulai" class="form-control-modern"
                                            value="{{ old('tanggal_mulai', $agenda->tanggal_mulai) }}" required>
                                    </div>

                                    <!-- ================= TANGGAL SELESAI ================= -->
                                    {{-- Input tanggal selesai agenda --}}
                                    <div class="col-md-6">
                                        <label class="form-label-modern">
                                            Tanggal Selesai <span class="text-danger">*</span>
                                        </label>
                                        <input type="date" name="tanggal_selesai" class="form-control-modern"
                                            value="{{ old('tanggal_selesai', $agenda->tanggal_selesai) }}" required>
                                    </div>

                                    <!-- ================= DESKRIPSI ================= -->
                                    {{-- Textarea deskripsi agenda --}}
                                    <div class="col-12">
                                        <label class="form-label-modern">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control-modern" rows="4">{{ old('deskripsi', $agenda->deskripsi) }}</textarea>
                                    </div>

                                    <!-- ================= MEDIA EXISTING ================= -->
                                    {{-- Menampilkan media yang sudah ada --}}
                                    @if ($agenda->media->count())
                                        <div class="col-12">
                                            <label class="form-label-modern">Media Saat Ini</label>
                                            <div class="row g-3">
                                                {{-- Loop media agenda --}}
                                                @foreach ($agenda->media as $media)
                                                    <div class="col-md-3">
                                                        <div class="border rounded p-2 text-center">
                                                            {{-- Preview gambar --}}
                                                            <img src="{{ asset('storage/' . $media->file_name) }}?v={{ time() }}"
                                                                class="img-fluid rounded mb-2"
                                                                style="height:120px; object-fit:cover">
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif

                                    <!-- ================= ADD MEDIA BARU ================= -->
                                    {{-- Upload media baru --}}
                                    <div class="col-12">
                                        <label class="form-label-modern">
                                            Tambah Media Baru
                                        </label>
                                        <input type="file" name="filename[]" class="form-control-modern" multiple
                                            accept="image/*">

                                        <small class="text-muted">
                                            Bisa upload lebih dari satu gambar
                                        </small>
                                    </div>

                                    <!-- ================= ACTION BUTTON ================= -->
                                    {{-- Tombol submit & batal --}}
                                    <div class="col-12 mt-4">
                                        <div class="d-flex justify-content-end gap-3">
                                            <button type="submit" class="btn-modern btn-primary-modern">
                                                <i class="fas fa-save me-2"></i>Update Agenda
                                            </button>
                                            <a href="{{ route('agenda.index') }}"
                                                class="btn-modern btn-secondary-modern">
                                                <i class="fas fa-times me-2"></i>Batal
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
