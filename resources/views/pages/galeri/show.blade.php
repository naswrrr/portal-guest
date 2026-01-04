{{-- Menggunakan layout utama halaman guest --}}
@extends('layouts.guest.app')

{{-- Section konten utama --}}
@section('content')

    {{-- Memanggil navbar --}}
    @include('layouts.guest.navbar')

    {{-- Container full width untuk background --}}
    <div class="container-fluid content-section">

        {{-- Container pembatas lebar konten --}}
        <div class="container py-5">

            {{-- ================= ACTION BAR ================= --}}
            {{-- Header halaman detail galeri --}}
            <div class="action-bar mb-4">

                {{-- Bagian kiri: judul & info galeri --}}
                <div class="action-left">
                    <h4 class="mb-0 fw-bold text-dark">
                        <i class="fas fa-eye me-2 text-primary"></i>
                        Detail Galeri
                    </h4>

                    {{-- Menampilkan judul galeri (dibatasi 50 karakter) --}}
                    <p class="text-muted mb-0 mt-1">
                        <i class="fas fa-images me-1"></i>
                        "{{ \Illuminate\Support\Str::limit($galeri->judul, 50) }}"
                    </p>
                </div>

                {{-- Bagian kanan: tombol kembali --}}
                <div class="action-right">
                    <a href="{{ route('galeri.index') }}"
                       class="btn-modern btn-secondary-modern">
                        <i class="fas fa-arrow-left me-2"></i>
                        Kembali
                    </a>
                </div>

            </div>
            {{-- ================= END ACTION BAR ================= --}}

            {{-- Grid utama halaman --}}
            <div class="row">

                {{-- ================= KONTEN UTAMA ================= --}}
                <div class="col-lg-8">

                    {{-- ===== INFORMASI GALERI ===== --}}
                    <div class="card-modern mb-4">

                        {{-- Header card --}}
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-info-circle"></i>
                                <h5>Informasi Galeri</h5>
                            </div>
                        </div>

                        {{-- Body card --}}
                        <div class="card-body p-4">

                            {{-- Judul galeri --}}
                            <h5 class="fw-bold mb-2">
                                {{ $galeri->judul }}
                            </h5>

                            {{-- Deskripsi galeri (jika kosong tampilkan "-") --}}
                            <p class="text-muted mb-3">
                                {{ $galeri->deskripsi ?: '-' }}
                            </p>

                            {{-- Metadata galeri --}}
                            <div class="d-flex gap-4 text-muted">

                                {{-- Tanggal pembuatan --}}
                                <span>
                                    <i class="fas fa-calendar-alt me-1"></i>
                                    Dibuat: {{ $galeri->created_at->format('d M Y') }}
                                </span>

                                {{-- Jumlah foto --}}
                                <span>
                                    <i class="fas fa-images me-1"></i>
                                    {{ $galeri->media->count() }} Foto
                                </span>

                            </div>
                        </div>
                    </div>
                    {{-- ===== END INFORMASI GALERI ===== --}}

                    {{-- ===== FOTO GALERI ===== --}}
                    <div class="card-modern">

                        {{-- Header card --}}
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-images"></i>
                                <h5>Foto Galeri</h5>
                            </div>
                        </div>

                        {{-- Body card --}}
                        <div class="card-body p-4">

                            {{-- Cek apakah galeri memiliki foto --}}
                            @if ($galeri->media->count())

                                {{-- Grid foto --}}
                                <div class="row g-3">
                                    @foreach ($galeri->media as $media)

                                        {{-- Thumbnail foto --}}
                                        <div class="col-6 col-md-4">
                                            <img src="{{ asset('storage/' . $media->file_name) }}"
                                                 class="img-fluid rounded shadow-sm"
                                                 style="width:100%; height:180px; object-fit:cover;">
                                        </div>

                                    @endforeach
                                </div>

                            @else
                                {{-- Tampilan jika tidak ada foto --}}
                                <div class="text-center text-muted py-5">
                                    <i class="fas fa-image fa-3x mb-3"></i>
                                    <p>Belum ada foto di galeri ini</p>
                                </div>
                            @endif

                        </div>
                    </div>
                    {{-- ===== END FOTO GALERI ===== --}}

                </div>
                {{-- ================= END KONTEN UTAMA ================= --}}

                {{-- ================= SIDEBAR ================= --}}
                <div class="col-lg-4">

                    {{-- Card aksi --}}
                    <div class="card-modern mb-4">

                        {{-- Header card --}}
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-cogs"></i>
                                <h5>Aksi</h5>
                            </div>
                        </div>

                        {{-- Body card --}}
                        <div class="card-body">

                            {{-- Tombol aksi --}}
                            <div class="d-grid gap-2">

                                {{-- Tombol edit galeri --}}
                                <a href="{{ route('galeri.edit', $galeri->galeri_id) }}"
                                   class="btn-modern btn-warning-modern">
                                    <i class="fas fa-edit me-2"></i>
                                    Edit Galeri
                                </a>

                                {{-- Form hapus galeri --}}
                                <form action="{{ route('galeri.destroy', $galeri->galeri_id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Hapus galeri ini?')">

                                    {{-- Token keamanan --}}
                                    @csrf

                                    {{-- Method DELETE --}}
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn-modern btn-danger-modern w-100">
                                        <i class="fas fa-trash me-2"></i>
                                        Hapus Galeri
                                    </button>
                                </form>

                                {{-- Tombol tambah galeri --}}
                                <a href="{{ route('galeri.create') }}"
                                   class="btn-modern btn-success-modern">
                                    <i class="fas fa-plus me-2"></i>
                                    Tambah Galeri
                                </a>

                            </div>
                        </div>
                    </div>

                </div>
                {{-- ================= END SIDEBAR ================= --}}

            </div>

        </div>
    </div>

@endsection
