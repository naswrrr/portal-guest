@extends('layouts.guest.app')

@section('content')
    @include('layouts.guest.navbar')

    <div class="container-fluid content-section">
        <div class="container py-5">

            <!-- PAGE HEADER -->
            <div class="page-header-modern text-center mb-5">
                <div class="header-icon">
                    <i class="fas fa-edit"></i>
                </div>
                <h5 class="text-primary fw-bold text-uppercase mb-2">Edit Galeri Desa</h5>
                <h1 class="display-4 fw-bold mb-3">Perbarui Galeri</h1>
                <p class="text-muted fs-5 mb-0">
                    Perbarui informasi dan dokumentasi galeri desa
                </p>
            </div>

            <!-- ALERT ERROR -->
            @if ($errors->any())
                <div class="alert alert-modern alert-danger alert-dismissible fade show mb-4">
                    <strong>Terjadi Kesalahan</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card-modern">
                        <div class="card-body p-4">

                            <form action="{{ route('galeri.update', $galeri->galeri_id) }}"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- JUDUL -->
                                <div class="mb-3">
                                    <label class="form-label-modern">Judul Galeri</label>
                                    <input type="text"
                                           name="judul"
                                           class="form-control-modern"
                                           value="{{ old('judul', $galeri->judul) }}"
                                           required>
                                </div>

                                <!-- DESKRIPSI -->
                                <div class="mb-4">
                                    <label class="form-label-modern">Deskripsi</label>
                                    <textarea name="deskripsi"
                                              rows="4"
                                              class="form-control-modern">{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
                                </div>

                                <!-- MEDIA LAMA -->
                                @if ($galeri->media->count())
                                    <div class="mb-4">
                                        <label class="form-label-modern">Foto Saat Ini</label>
                                        <div class="row g-3">
                                            @foreach ($galeri->media as $media)
                                                <div class="col-4">
                                                    <img src="{{ asset('storage/' . $media->file_name) }}"
                                                         class="img-fluid rounded shadow-sm">
                                                </div>
                                            @endforeach
                                        </div>
                                        <small class="text-danger d-block mt-2">
                                            ⚠ Jika upload foto baru, foto lama tidak dihapus (ditambahkan)
                                        </small>
                                    </div>
                                @endif

                                <!-- UPLOAD MULTIPLE -->
                                <div class="mb-4">
                                    <label class="form-label-modern">
                                        Upload Foto Baru (Multiple)
                                    </label>
                                    <input type="file"
                                           name="media[]"
                                           class="form-control-modern"
                                           multiple
                                           accept="image/*">
                                </div>

                                <!-- BUTTON -->
                                <div class="d-flex justify-content-end gap-3">
                                    <button class="btn-modern btn-primary-modern">
                                        <i class="fas fa-save me-2"></i>Update Galeri
                                    </button>
                                    <a href="{{ route('galeri.index') }}"
                                       class="btn-modern btn-secondary-modern">
                                        Batal
                                    </a>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
