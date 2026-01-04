{{-- Menggunakan layout utama halaman guest --}}
@extends('layouts.guest.app')

{{-- Section konten utama --}}
@section('content')

    {{-- Memanggil navbar --}}
    @include('layouts.guest.navbar')

    {{-- Container utama halaman --}}
    <div class="container-fluid content-section">
        <div class="container py-5">

            {{-- ================= PAGE HEADER ================= --}}
            {{-- Header halaman detail berita --}}
            <div class="page-header-modern text-center mb-5">
                <div class="header-icon">
                    <i class="fas fa-newspaper"></i>
                </div>

                {{-- Judul berita dibatasi 50 karakter --}}
                <h5 class="text-primary fw-bold text-uppercase mb-2">Detail Berita</h5>
                <h1 class="display-4 fw-bold mb-3">
                    {{ Str::limit($berita->judul, 50) }}
                </h1>

                {{-- Menampilkan kategori dan tanggal dibuat --}}
                <p class="text-muted fs-5 mb-0">
                    {{ $berita->kategori->nama ?? 'Informasi' }} |
                    Dibuat: {{ $berita->created_at->format('d M Y') }}
                </p>
            </div>
            {{-- ================= END PAGE HEADER ================= --}}

            {{-- ================= ACTION BAR ================= --}}
            {{-- Bar navigasi atas --}}
            <div class="action-bar mb-4">
                <div class="action-left">
                    <h4 class="mb-0 fw-bold text-dark">
                        <i class="fas fa-eye me-2 text-primary"></i>
                        Detail Berita
                    </h4>

                    {{-- Preview judul berita --}}
                    <p class="text-muted mb-0 mt-1">
                        <i class="fas fa-file-alt me-1"></i>
                        "{{ Str::limit($berita->judul, 50) }}"
                    </p>
                </div>

                {{-- Tombol kembali --}}
                <div class="action-right">
                    <a href="{{ route('berita.index') }}"
                       class="btn-modern btn-secondary-modern">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </div>
            {{-- ================= END ACTION BAR ================= --}}

            <div class="row">

                {{-- ================= MAIN CONTENT ================= --}}
                <div class="col-lg-8">

                    {{-- ================= INFO CARD ================= --}}
                    {{-- Card informasi detail berita --}}
                    <div class="card-modern mb-4">
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-info-circle"></i>
                                <h5>Informasi</h5>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <div class="card-warga">

                                {{-- Header informasi --}}
                                <div class="card-warga-header">
                                    <div class="user-avatar-modern">
                                        <i class="fas fa-info-circle"></i>
                                    </div>
                                    <div class="user-info">
                                        <h6 class="user-name">Detail Berita</h6>
                                        <span class="badge-gender badge-male">
                                            <i class="fas fa-newspaper me-1"></i>
                                            {{ $berita->kategori->nama ?? 'Informasi' }}
                                        </span>
                                    </div>
                                </div>

                                {{-- Isi informasi berita --}}
                                <div class="card-warga-body">

                                    {{-- ID Berita --}}
                                    <div class="info-item">
                                        <div class="info-icon bg-primary">
                                            <i class="fas fa-id-card"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">ID Berita</span>
                                            <span class="info-value">
                                                {{ $berita->berita_id }}
                                            </span>
                                        </div>
                                    </div>

                                    {{-- ID Kategori --}}
                                    <div class="info-item">
                                        <div class="info-icon bg-success">
                                            <i class="fas fa-database"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Kategori ID</span>
                                            <span class="info-value">
                                                {{ $berita->kategori_id }}
                                            </span>
                                        </div>
                                    </div>

                                    {{-- Tanggal dibuat --}}
                                    <div class="info-item">
                                        <div class="info-icon bg-warning">
                                            <i class="fas fa-calendar-plus"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Dibuat</span>
                                            <span class="info-value">
                                                {{ $berita->created_at->format('d M Y') }}
                                            </span>
                                        </div>
                                    </div>

                                    {{-- Durasi waktu relatif --}}
                                    <div class="info-item">
                                        <div class="info-icon bg-info">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Durasi</span>
                                            <span class="info-value">
                                                {{ $berita->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- ================= END INFO CARD ================= --}}

                    {{-- ================= MEDIA BERITA ================= --}}
                    {{-- Mengambil data media berita --}}
                    @php
                        $mediaFiles = $berita->media()->orderBy('sort_order')->get();
                        $mediaCount = $mediaFiles->count();
                    @endphp

                    {{-- Card foto cover --}}
                    <div class="card-modern mb-4">
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-images"></i>
                                <h5>Foto Cover Berita</h5>
                            </div>

                            {{-- Jumlah foto --}}
                            <span class="badge bg-primary">
                                {{ $mediaCount }} Foto
                            </span>
                        </div>

                        <div class="card-body p-4">

                            {{-- Jika ada foto --}}
                            @if ($mediaCount > 0)
                                <div class="row g-3">

                                    {{-- Loop semua media --}}
                                    @foreach ($mediaFiles as $file)
                                        <div class="col-md-4 col-lg-3 mb-3">
                                            <div class="border rounded overflow-hidden shadow-sm">

                                                {{-- Jika file berupa gambar --}}
                                                @if (str_contains($file->mime_type, 'image'))
                                                    <img src="{{ Storage::url($file->file_name) }}"
                                                         class="img-fluid w-100"
                                                         style="height:150px; object-fit:cover; cursor:pointer;"
                                                         alt="{{ $file->caption }}"
                                                         data-bs-toggle="modal"
                                                         data-bs-target="#imageModal{{ $file->media_id }}"
                                                         onerror="this.src='https://via.placeholder.com/300x200?text=Gagal+Memuat+Gambar'">
                                                @else
                                                    {{-- Jika bukan gambar --}}
                                                    <div class="text-center p-4 bg-light">
                                                        <i class="fas fa-file fa-3x text-muted"></i>
                                                        <p class="small mt-2 mb-0">
                                                            {{ $file->file_name }}
                                                        </p>
                                                    </div>
                                                @endif

                                                {{-- Caption dan tipe file --}}
                                                <div class="p-3 bg-white">
                                                    <small class="d-block text-truncate">
                                                        <i class="fas fa-sticky-note me-1"></i>
                                                        {{ $file->caption ?: 'Tanpa keterangan' }}
                                                    </small>
                                                    <small class="text-muted">
                                                        {{ strtoupper(pathinfo($file->file_name, PATHINFO_EXTENSION)) }}
                                                    </small>
                                                </div>
                                            </div>

                                            {{-- Modal preview gambar --}}
                                            @if (str_contains($file->mime_type, 'image'))
                                                <div class="modal fade"
                                                     id="imageModal{{ $file->media_id }}">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">

                                                            <div class="modal-header">
                                                                <h5 class="modal-title">
                                                                    {{ $file->caption ?: 'Foto Cover' }}
                                                                </h5>
                                                                <button type="button"
                                                                        class="btn-close"
                                                                        data-bs-dismiss="modal"></button>
                                                            </div>

                                                            <div class="modal-body text-center">
                                                                <img src="{{ Storage::url($file->file_name) }}"
                                                                     class="img-fluid rounded"
                                                                     style="max-height:70vh;">
                                                            </div>

                                                            <div class="modal-footer">
                                                                <a href="{{ Storage::url($file->file_name) }}"
                                                                   download
                                                                   class="btn btn-sm btn-primary">
                                                                    <i class="fas fa-download me-1"></i>Download
                                                                </a>
                                                                <button type="button"
                                                                        class="btn btn-sm btn-secondary"
                                                                        data-bs-dismiss="modal">
                                                                    Tutup
                                                                </button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>

                            {{-- Jika tidak ada foto --}}
                            @else
                                <div class="text-center py-5">
                                    <i class="fas fa-image fa-4x text-muted mb-3"></i>
                                    <p class="text-muted">Belum ada foto cover</p>
                                    <a href="{{ route('berita.edit', $berita->berita_id) }}"
                                       class="btn btn-sm btn-primary">
                                        <i class="fas fa-plus me-1"></i>Tambah Foto
                                    </a>
                                </div>
                            @endif

                        </div>
                    </div>
                    {{-- ================= END MEDIA ================= --}}
                </div>

                {{-- ================= SIDEBAR ================= --}}
                <div class="col-lg-4">

                    {{-- Card aksi --}}
                    <div class="card-modern mb-4">
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-cogs"></i>
                                <h5>Aksi</h5>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="d-grid gap-2">

                                {{-- Edit --}}
                                <a href="{{ route('berita.edit', $berita->berita_id) }}"
                                   class="btn-modern btn-warning-modern">
                                    <i class="fas fa-edit me-2"></i>Edit Berita
                                </a>

                                {{-- Hapus --}}
                                <form action="{{ route('berita.destroy', $berita->berita_id) }}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn-modern btn-danger-modern"
                                            onclick="return confirm('Hapus berita ini?')">
                                        <i class="fas fa-trash me-2"></i>Hapus Berita
                                    </button>
                                </form>

                                {{-- Tambah --}}
                                <a href="{{ route('berita.create') }}"
                                   class="btn-modern btn-success-modern">
                                    <i class="fas fa-plus me-2"></i>Buat Baru
                                </a>

                                {{-- Daftar --}}
                                <a href="{{ route('berita.index') }}"
                                   class="btn-modern btn-secondary-modern">
                                    <i class="fas fa-list me-2"></i>Daftar Berita
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
