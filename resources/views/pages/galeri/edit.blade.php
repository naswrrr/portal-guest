{{-- Menggunakan layout utama halaman guest --}}
@extends('layouts.guest.app')

{{-- Section konten utama --}}
@section('content')

    {{-- Memanggil navbar --}}
    @include('layouts.guest.navbar')

    {{-- Container full width untuk background halaman --}}
    <div class="container-fluid content-section">

        {{-- Container utama pembatas lebar konten --}}
        <div class="container py-5">

            {{-- ================= PAGE HEADER ================= --}}
            {{-- Judul halaman edit galeri --}}
            <div class="page-header-modern text-center mb-5">
                <div class="header-icon">
                    <i class="fas fa-edit"></i>
                </div>
                <h5 class="text-primary fw-bold text-uppercase mb-2">
                    Edit Galeri Desa
                </h5>
                <h1 class="display-4 fw-bold mb-3">
                    Perbarui Galeri
                </h1>
                <p class="text-muted fs-5 mb-0">
                    Perbarui informasi dan dokumentasi galeri desa
                </p>
            </div>
            {{-- ================= END PAGE HEADER ================= --}}

            {{-- ================= ALERT ERROR ================= --}}
            {{-- Menampilkan pesan error validasi --}}
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
            {{-- ================= END ALERT ERROR ================= --}}

            {{-- ================= FORM EDIT ================= --}}
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    {{-- Card pembungkus form --}}
                    <div class="card-modern">
                        <div class="card-body p-4">

                            {{-- Form update galeri --}}
                            <form action="{{ route('galeri.update', $galeri->galeri_id) }}"
                                  method="POST"
                                  enctype="multipart/form-data">

                                {{-- Token keamanan --}}
                                @csrf

                                {{-- Spoofing method PUT --}}
                                @method('PUT')

                                {{-- ================= JUDUL ================= --}}
                                {{-- Input judul galeri --}}
                                <div class="mb-3">
                                    <label class="form-label-modern">
                                        Judul Galeri
                                    </label>
                                    <input type="text"
                                           name="judul"
                                           class="form-control-modern"
                                           value="{{ old('judul', $galeri->judul) }}"
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
                                              class="form-control-modern">{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
                                </div>

                                {{-- ================= MEDIA LAMA ================= --}}
                                {{-- Menampilkan foto galeri yang sudah ada --}}
                                @if ($galeri->media->count())
                                    <div class="mb-4">
                                        <label class="form-label-modern">
                                            Foto Saat Ini
                                        </label>

                                        {{-- Grid foto lama --}}
                                        <div class="row g-3">
                                            @foreach ($galeri->media as $media)
                                                <div class="col-4">
                                                    <img src="{{ asset('storage/' . $media->file_name) }}"
                                                         class="img-fluid rounded shadow-sm">
                                                </div>
                                            @endforeach
                                        </div>

                                        {{-- Informasi perilaku upload --}}
                                        <small class="text-danger d-block mt-2">
                                            ⚠ Jika upload foto baru, foto lama tidak dihapus (ditambahkan)
                                        </small>
                                    </div>
                                @endif
                                {{-- ================= END MEDIA LAMA ================= --}}

                                {{-- ================= UPLOAD FOTO ================= --}}
                                {{-- Input upload multiple foto --}}
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

                                {{-- ================= BUTTON ================= --}}
                                {{-- Tombol submit dan batal --}}
                                <div class="d-flex justify-content-end gap-3">
                                    <button class="btn-modern btn-primary-modern">
                                        <i class="fas fa-save me-2"></i>
                                        Update Galeri
                                    </button>
                                    <a href="{{ route('galeri.index') }}"
                                       class="btn-modern btn-secondary-modern">
                                        Batal
                                    </a>
                                </div>

                            </form>
                            {{-- ================= END FORM ================= --}}

                        </div>
                    </div>

                </div>
            </div>
            {{-- ================= END FORM EDIT ================= --}}

        </div>
    </div>

@endsection
