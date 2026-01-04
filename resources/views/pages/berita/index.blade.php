{{-- Menggunakan layout utama halaman guest --}}
@extends('layouts.guest.app')

{{-- Section konten utama --}}
@section('content')

{{-- Container utama halaman --}}
<div class="container-fluid content-section">
    <div class="container py-5">

        {{-- ================= PAGE HEADER ================= --}}
        {{-- Header halaman daftar berita --}}
        <div class="page-header-modern text-center mb-5">
            <div class="header-icon">
                <i class="fas fa-newspaper"></i>
            </div>

            {{-- Judul halaman --}}
            <h5 class="text-primary fw-bold text-uppercase mb-2">Berita Desa</h5>
            <h1 class="display-4 fw-bold mb-3">Kelola Berita Portal Desa</h1>
            <p class="text-muted fs-5 mb-0">
                Kelola berita dan informasi desa dengan mudah dan efisien
            </p>
        </div>
        {{-- ================= END PAGE HEADER ================= --}}

        {{-- ================= NOTIFIKASI SUCCESS ================= --}}
        {{-- Menampilkan pesan sukses dari session --}}
        @if(session('success'))
            <div class="alert alert-modern alert-success alert-dismissible fade show" role="alert">
                <div class="alert-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="alert-content">
                    <strong>Berhasil!</strong>
                    <p class="mb-0">{{ session('success') }}</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        {{-- ================= END NOTIFIKASI ================= --}}

        {{-- ================= ACTION BAR ================= --}}
        {{-- Judul daftar dan tombol tambah berita --}}
        <div class="action-bar mb-4">
            <div class="action-left">
                <h4 class="mb-0 fw-bold text-dark">
                    <i class="fas fa-newspaper me-2 text-primary"></i>
                    Daftar Berita Desa
                </h4>

                {{-- Total berita (pagination) --}}
                <p class="text-muted mb-0 mt-1">
                    Total {{ $berita->total() }} berita terdaftar
                </p>
            </div>

            {{-- Tombol tambah berita --}}
            <div class="action-right">
                <a href="{{ route('berita.create') }}"
                   class="btn-modern btn-primary-modern">
                    <i class="fas fa-plus me-2"></i>Tambah Berita Baru
                </a>
            </div>
        </div>
        {{-- ================= END ACTION BAR ================= --}}

        {{-- ================= SEARCH & FILTER ================= --}}
        {{-- Form pencarian dan filter berita --}}
        <form method="GET" class="mb-4">
            <div class="row g-3">

                {{-- Pencarian judul / penulis --}}
                <div class="col-md-4">
                    <label class="form-label-modern">Cari Berita</label>
                    <div class="input-group-modern">
                        <span class="input-icon">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text"
                               name="search"
                               class="form-control-modern"
                               placeholder="Cari judul atau penulis..."
                               value="{{ request('search') }}">
                    </div>
                </div>

                {{-- Filter kategori --}}
                <div class="col-md-3">
                    <label class="form-label-modern">Kategori</label>
                    <select name="kategori_id" class="form-control-modern">
                        <option value="">Semua Kategori</option>
                        @foreach ($kategories as $kat)
                            <option value="{{ $kat->kategori_id }}"
                                {{ request('kategori_id') == $kat->kategori_id ? 'selected' : '' }}>
                                {{ $kat->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Filter status --}}
                <div class="col-md-3">
                    <label class="form-label-modern">Status</label>
                    <select name="status" class="form-control-modern">
                        <option value="">Semua Status</option>
                        <option value="terbit"
                            {{ request('status') == 'terbit' ? 'selected' : '' }}>
                            Terbit
                        </option>
                        <option value="draft"
                            {{ request('status') == 'draft' ? 'selected' : '' }}>
                            Draft
                        </option>
                    </select>
                </div>

                {{-- Tombol cari --}}
                <div class="col-md-2 d-flex align-items-end">
                    <button class="btn-modern btn-primary-modern w-100">
                        <i class="fas fa-search me-2"></i>Cari
                    </button>
                </div>

                {{-- Tombol reset filter --}}
                @if(request('search') || request('kategori_id') || request('status'))
                    <div class="col-md-2 d-flex align-items-end mt-3 mt-md-0">
                        <a href="{{ route('berita.index') }}"
                           class="btn-modern btn-secondary-modern w-100">
                            <i class="fas fa-times me-2"></i>Clear
                        </a>
                    </div>
                @endif

            </div>
        </form>
        {{-- ================= END SEARCH & FILTER ================= --}}

        {{-- ================= LIST DATA BERITA ================= --}}
        @if($berita->count() > 0)

            <div class="row g-4">
                @foreach($berita as $item)

                    {{-- Mengambil foto pertama sebagai thumbnail --}}
                    @php
                        $firstImage = $item->media->first();
                        $imageSrc = $firstImage
                            ? asset('storage/' . $firstImage->file_name)
                            : asset('assets-guest/img/image1.jpg');
                    @endphp

                    <div class="col-lg-6 col-xl-4">
                        <div class="card-warga">

                            {{-- HEADER CARD --}}
                            <div class="card-warga-header">
                                <img src="{{ $imageSrc }}"
                                     alt="{{ $item->judul }}"
                                     style="width:70px;height:70px;object-fit:cover;border-radius:50%;">

                                <div class="user-info">
                                    {{-- Judul berita dibatasi 30 karakter --}}
                                    <h6 class="user-name">
                                        {{ Str::limit($item->judul, 30) }}
                                    </h6>

                                    {{-- Badge status --}}
                                    <span class="badge-gender
                                        {{ $item->status == 'terbit' ? 'badge-male' : 'badge-female' }}">
                                        <i class="fas fa-{{ $item->status == 'terbit' ? 'check-circle' : 'pencil-alt' }} me-1"></i>
                                        {{ $item->status == 'terbit' ? 'Terbit' : 'Draft' }}
                                    </span>
                                </div>
                            </div>

                            {{-- BODY CARD --}}
                            <div class="card-warga-body">

                                {{-- Kategori --}}
                                <div class="info-item">
                                    <div class="info-icon bg-primary">
                                        <i class="fas fa-tags"></i>
                                    </div>
                                    <div class="info-content">
                                        <span class="info-label">Kategori</span>
                                        <span class="info-value">
                                            {{ $item->kategori->nama }}
                                        </span>
                                    </div>
                                </div>

                                {{-- Penulis --}}
                                <div class="info-item">
                                    <div class="info-icon bg-success">
                                        <i class="fas fa-user-edit"></i>
                                    </div>
                                    <div class="info-content">
                                        <span class="info-label">Penulis</span>
                                        <span class="info-value">
                                            {{ $item->penulis }}
                                        </span>
                                    </div>
                                </div>

                                {{-- Tanggal terbit --}}
                                <div class="info-item">
                                    <div class="info-icon bg-warning">
                                        <i class="fas fa-calendar"></i>
                                    </div>
                                    <div class="info-content">
                                        <span class="info-label">Terbit</span>
                                        <span class="info-value">
                                            {{ $item->terbit_at
                                                ? $item->terbit_at->format('d M Y')
                                                : 'Belum' }}
                                        </span>
                                    </div>
                                </div>

                            </div>

                            {{-- FOOTER CARD --}}
                            <div class="card-warga-footer">

                                {{-- Lihat detail --}}
                                <a href="{{ route('berita.show', $item->berita_id) }}"
                                   class="btn-action btn-action-view">
                                    <i class="fas fa-eye"></i> <span>Lihat</span>
                                </a>

                                {{-- Edit --}}
                                <a href="{{ route('berita.edit', $item->berita_id) }}"
                                   class="btn-action btn-action-edit">
                                    <i class="fas fa-edit"></i> <span>Edit</span>
                                </a>

                                {{-- Hapus --}}
                                <form action="{{ route('berita.destroy', $item->berita_id) }}"
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn-action btn-action-delete"
                                            onclick="return confirm('Hapus berita ini?')">
                                        <i class="fas fa-trash"></i> <span>Hapus</span>
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>

                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-4">
                {{ $berita->links('pagination::bootstrap-5') }}
            </div>

        {{-- Jika data kosong --}}
        @else
            <div class="empty-state-modern text-center py-5">
                <div class="empty-icon">
                    <i class="fas fa-newspaper"></i>
                </div>
                <h4 class="empty-title">Belum Ada Data Berita</h4>
                <p class="empty-text">
                    Mulai tambahkan berita pertama Anda untuk menginformasikan kegiatan desa
                </p>
                <a href="{{ route('berita.create') }}"
                   class="btn-modern btn-primary-modern">
                    <i class="fas fa-plus me-2"></i>Tambah Berita Pertama
                </a>
            </div>
        @endif
        {{-- ================= END LIST DATA ================= --}}

    </div>
</div>

@endsection
