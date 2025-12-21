@extends('layouts.guest.app')

@section('content')
@include('layouts.guest.navbar')

<div class="container-fluid content-section">
    <div class="container py-5">

        <!-- PAGE HEADER -->
        <div class="page-header-modern text-center mb-5">
            <div class="header-icon">
                <i class="fas fa-calendar-plus"></i>
            </div>
            <h5 class="text-primary fw-bold text-uppercase mb-2">Tambah Agenda</h5>
            <h1 class="display-4 fw-bold mb-3">Buat Agenda Baru</h1>
            <p class="text-muted fs-5 mb-0">
                Tambahkan agenda kegiatan desa dengan rapi
            </p>
        </div>

        <!-- ALERT ERROR -->
        @if ($errors->any())
            <div class="alert alert-modern alert-danger alert-dismissible fade show mb-4">
                <div class="alert-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="alert-content">
                    <strong>Kesalahan Input!</strong>
                    <ul class="mt-2 mb-0">
                        @foreach ($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- CARD FORM -->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card-modern card-edit">
                    <div class="card-header-modern">
                        <div class="header-content">
                            <i class="fas fa-calendar-plus"></i>
                            <h5>Buat Agenda</h5>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <form action="{{ route('agenda.store') }}"
                              method="POST"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="row g-4">

                                <!-- JUDUL -->
                                <div class="col-12">
                                    <label class="form-label-modern">Judul Agenda *</label>
                                    <div class="input-group-modern">
                                        <span class="input-icon">
                                            <i class="fas fa-heading"></i>
                                        </span>
                                        <input type="text"
                                               name="judul"
                                               class="form-control-modern"
                                               value="{{ old('judul') }}"
                                               required>
                                    </div>
                                </div>

                                <!-- LOKASI -->
                                <div class="col-12">
                                    <label class="form-label-modern">Lokasi *</label>
                                    <div class="input-group-modern">
                                        <span class="input-icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </span>
                                        <input type="text"
                                               name="lokasi"
                                               class="form-control-modern"
                                               value="{{ old('lokasi') }}"
                                               required>
                                    </div>
                                </div>

                                <!-- PENYELENGGARA -->
                                <div class="col-12">
                                    <label class="form-label-modern">Penyelenggara *</label>
                                    <div class="input-group-modern">
                                        <span class="input-icon">
                                            <i class="fas fa-building"></i>
                                        </span>
                                        <input type="text"
                                               name="penyelenggara"
                                               class="form-control-modern"
                                               value="{{ old('penyelenggara') }}"
                                               required>
                                    </div>
                                </div>

                                <!-- TANGGAL -->
                                <div class="col-md-6">
                                    <label class="form-label-modern">Tanggal Mulai *</label>
                                    <input type="date"
                                           name="tanggal_mulai"
                                           class="form-control-modern"
                                           value="{{ old('tanggal_mulai') }}"
                                           required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label-modern">Tanggal Selesai *</label>
                                    <input type="date"
                                           name="tanggal_selesai"
                                           class="form-control-modern"
                                           value="{{ old('tanggal_selesai') }}"
                                           required>
                                </div>

                                <!-- DESKRIPSI -->
                                <div class="col-12">
                                    <label class="form-label-modern">Deskripsi</label>
                                    <textarea name="deskripsi"
                                              class="form-control-modern"
                                              rows="4">{{ old('deskripsi') }}</textarea>
                                </div>

                                <!-- UPLOAD MEDIA -->
                                <div class="col-12">
                                    <label class="form-label-modern">
                                        Media Agenda (Foto / Dokumen)
                                    </label>
                                    <input type="file"
                                           name="filename[]"
                                           class="form-control"
                                           multiple
                                           accept="image/*,application/pdf">
                                    <small class="text-muted">
                                        Bisa upload lebih dari satu file
                                    </small>
                                </div>

                                <!-- BUTTON -->
                                <div class="col-12 mt-3 d-flex justify-content-end gap-3">
                                    <button type="submit" class="btn-modern btn-primary-modern">
                                        <i class="fas fa-save me-2"></i>Simpan Agenda
                                    </button>
                                    <a href="{{ route('agenda.index') }}"
                                       class="btn-modern btn-secondary-modern">
                                        <i class="fas fa-times me-2"></i>Batal
                                    </a>
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
