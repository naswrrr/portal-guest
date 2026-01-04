{{-- Menggunakan layout utama halaman guest --}}
@extends('layouts.guest.app')

{{-- Section konten utama --}}
@section('content')

    {{-- Memanggil navbar --}}
    @include('layouts.guest.navbar')

    {{-- Container full width sebagai pembungkus konten --}}
    <div class="container-fluid content-section">
        <div class="container py-5">

            {{-- ================= PAGE HEADER ================= --}}
            {{-- Judul halaman tambah galeri --}}
            <div class="page-header-modern text-center mb-5">
                <div class="header-icon">
                    <i class="fas fa-images"></i>
                </div>
                <h5 class="text-primary fw-bold text-uppercase mb-2">
                    Galeri
                </h5>
                <h1 class="display-4 fw-bold mb-3">
                    Tambah Galeri
                </h1>
                <p class="text-muted fs-5 mb-0">
                    Tambahkan dokumentasi kegiatan desa
                </p>
            </div>
            {{-- ================= END PAGE HEADER ================= --}}

            {{-- ================= ALERT ERROR ================= --}}
            {{-- Menampilkan pesan error validasi --}}
            @if ($errors->any())
                <div class="alert alert-modern alert-danger mb-4">
                    <strong>Terjadi Kesalahan</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{-- ================= END ALERT ERROR ================= --}}

            {{-- ================= CARD FORM ================= --}}
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    {{-- Card pembungkus form --}}
                    <div class="card-modern">

                        {{-- Header card --}}
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-plus"></i>
                                <h5>Form Tambah Galeri</h5>
                            </div>
                        </div>

                        {{-- Body card --}}
                        <div class="card-body p-4">

                            {{-- ================= FORM TAMBAH GALERI ================= --}}
                            {{-- enctype wajib untuk upload file --}}
                            <form action="{{ route('galeri.store') }}"
                                  method="POST"
                                  enctype="multipart/form-data"
                                  novalidate>

                                {{-- Token keamanan CSRF --}}
                                @csrf

                                {{-- ================= JUDUL ================= --}}
                                {{-- Input judul galeri --}}
                                <div class="mb-3">
                                    <label class="form-label-modern">
                                        Judul Galeri <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           name="judul"
                                           class="form-control-modern"
                                           value="{{ old('judul') }}"
                                           required>
                                </div>

                                {{-- ================= DESKRIPSI ================= --}}
                                {{-- Textarea deskripsi galeri --}}
                                <div class="mb-4">
                                    <label class="form-label-modern">
                                        Deskripsi
                                    </label>
                                    <textarea name="deskripsi"
                                              rows="4"
                                              class="form-control-modern">{{ old('deskripsi') }}</textarea>
                                </div>

                                {{-- ================= UPLOAD FOTO ================= --}}
                                {{-- Upload multiple foto (opsional) --}}
                                <div class="mb-4">
                                    <label class="form-label-modern">
                                        Upload Foto
                                    </label>
                                    <input type="file"
                                           name="media[]"
                                           class="form-control-modern"
                                           multiple
                                           accept="image/*">

                                    {{-- Informasi aturan upload --}}
                                    <small class="text-muted">
                                        Bisa upload lebih dari satu foto (jpg, png, max 2MB).
                                        Bisa dikosongkan, akan pakai placeholder.
                                    </small>
                                </div>

                                {{-- ================= BUTTON ================= --}}
                                {{-- Tombol batal dan simpan --}}
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('galeri.index') }}"
                                       class="btn-modern btn-secondary-modern">
                                        Batal
                                    </a>
                                    <button type="submit"
                                            class="btn-modern btn-primary-modern">
                                        <i class="fas fa-save me-2"></i>
                                        Simpan Galeri
                                    </button>
                                </div>

                            </form>
                            {{-- ================= END FORM ================= --}}

                        </div>
                    </div>

                </div>
            </div>
            {{-- ================= END CARD FORM ================= --}}

        </div>
    </div>

@endsection
