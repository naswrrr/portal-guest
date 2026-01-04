{{-- Menggunakan layout utama guest --}}
@extends('layouts.guest.app')

{{-- Memulai section content yang akan di-render di layout --}}
@section('content')
    {{-- Memanggil navbar guest --}}
    @include('layouts.guest.navbar')

    {{-- Container full width sebagai pembungkus halaman --}}
    <div class="container-fluid content-section">

        {{-- Container tengah (punya max-width Bootstrap) --}}
        <div class="container py-5">

            {{-- ================= ACTION BAR ================= --}}
            {{-- Header halaman + tombol navigasi --}}
            <div class="action-bar mb-4">

                {{-- Bagian kiri action bar --}}
                <div class="action-left">
                    <h4 class="mb-0 fw-bold text-dark">
                        {{-- Ikon + Judul halaman --}}
                        <i class="fas fa-eye me-2 text-primary"></i>
                        Detail Kategori Berita
                    </h4>

                    {{-- Subjudul menampilkan nama kategori (dibatasi 50 karakter) --}}
                    <p class="text-muted mb-0 mt-1">
                        <i class="fas fa-tag me-1"></i>
                        "{{ Str::limit($kategori->nama, 50) }}"
                    </p>
                </div>

                {{-- Bagian kanan action bar --}}
                <div class="action-right">
                    {{-- Tombol kembali ke halaman index kategori --}}
                    <a href="{{ route('kategori_berita.index') }}" class="btn-modern btn-secondary-modern">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </div>
            {{-- =============== END ACTION BAR =============== --}}

            {{-- Grid utama halaman --}}
            <div class="row">

                {{-- ================= KONTEN UTAMA ================= --}}
                {{-- Kolom kiri (8/12 lebar layar) --}}
                <div class="col-lg-8">

                    {{-- Card informasi kategori --}}
                    <div class="card-modern mb-4">

                        {{-- Header card --}}
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-info-circle"></i>
                                <h5>Informasi Kategori</h5>
                            </div>
                        </div>

                        {{-- Body card --}}
                        <div class="card-body p-0">
                            <div class="card-warga">

                                {{-- Header data kategori --}}
                                <div class="card-warga-header">
                                    {{-- Icon kategori --}}
                                    <div class="user-avatar-modern">
                                        <i class="fas fa-tag"></i>
                                    </div>

                                    {{-- Nama dan slug kategori --}}
                                    <div class="user-info">
                                        <h6 class="user-name">{{ $kategori->nama }}</h6>
                                        <span class="badge-gender badge-male">
                                            <i class="fas fa-link me-1"></i>{{ $kategori->slug }}
                                        </span>
                                    </div>
                                </div>

                                {{-- Body detail kategori --}}
                                <div class="card-warga-body">

                                    {{-- Deskripsi kategori --}}
                                    <div class="info-item">
                                        <div class="info-icon bg-primary">
                                            <i class="fas fa-align-left"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Deskripsi</span>
                                            <span class="info-value">
                                                {{ $kategori->deskripsi ?: 'Tidak ada deskripsi' }}
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
                                                {{ $kategori->created_at->format('d M Y') }}
                                            </span>
                                        </div>
                                    </div>

                                    {{-- Terakhir diupdate --}}
                                    <div class="info-item">
                                        <div class="info-icon bg-info">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Update Terakhir</span>
                                            <span class="info-value">
                                                {{ $kategori->updated_at->format('d M Y H:i') }}
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- =============== END KONTEN UTAMA =============== --}}

                {{-- ================= SIDEBAR ================= --}}
                {{-- Kolom kanan (4/12 lebar layar) --}}
                <div class="col-lg-4">

                    {{-- Card aksi --}}
                    <div class="card-modern mb-4">

                        {{-- Header aksi --}}
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-cogs"></i>
                                <h5>Aksi</h5>
                            </div>
                        </div>

                        {{-- Tombol-tombol aksi --}}
                        <div class="card-body">
                            <div class="d-grid gap-2">

                                {{-- Edit kategori --}}
                                <a href="{{ route('kategori_berita.edit', $kategori->kategori_id) }}"
                                    class="btn-modern btn-warning-modern w-100">
                                    <i class="fas fa-edit me-2"></i>Edit Kategori
                                </a>

                                {{-- Hapus kategori --}}
                                <form action="{{ route('kategori_berita.destroy', $kategori->kategori_id) }}" method="POST"
                                    class="m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-modern btn-danger-modern w-100"
                                        onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                                        <i class="fas fa-trash me-2"></i>Hapus Kategori
                                    </button>
                                </form>

                                {{-- Tambah kategori --}}
                                <a href="{{ route('kategori_berita.create') }}" class="btn-modern btn-success-modern w-100">
                                    <i class="fas fa-plus me-2"></i>Tambah Kategori
                                </a>

                                {{-- Daftar kategori --}}
                                <a href="{{ route('kategori_berita.index') }}"
                                    class="btn-modern btn-secondary-modern w-100">
                                    <i class="fas fa-list me-2"></i>Daftar Kategori
                                </a>

                            </div>
                        </div>

                    </div>

                    {{-- Card informasi tambahan --}}
                    <div class="card-modern">

                        {{-- Header --}}
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-info-circle"></i>
                                <h5>Informasi Tambahan</h5>
                            </div>
                        </div>

                        {{-- Isi informasi --}}
                        <div class="card-body">
                            <div class="d-flex flex-column gap-3">

                                {{-- ID kategori --}}
                                <div class="d-flex align-items-center gap-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-hashtag"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">ID Kategori</small>
                                        <strong>{{ $kategori->kategori_id }}</strong>
                                    </div>
                                </div>

                                {{-- Usia data --}}
                                <div class="d-flex align-items-center gap-3">
                                    <div class="icon-circle bg-success">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Usia Data</small>
                                        <strong>{{ $kategori->created_at->diffForHumans() }}</strong>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                {{-- =============== END SIDEBAR =============== --}}

            </div>
        </div>
    </div>

    {{-- Menutup section content --}}
@endsection
