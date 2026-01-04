{{-- Menggunakan layout utama guest --}}
@extends('layouts.guest.app')

{{-- Section konten utama --}}
@section('content')

    {{-- Memanggil navbar --}}
    @include('layouts.guest.navbar')

    {{-- Container utama halaman --}}
    <div class="container-fluid content-section">
        <div class="container py-5">

            {{-- ================= ACTION BAR ================= --}}
            {{-- Menampilkan judul halaman dan navigasi --}}
            <div class="action-bar mb-4">
                <div class="action-left">
                    <h4 class="mb-0 fw-bold text-dark">
                        {{-- Ikon detail --}}
                        <i class="fas fa-eye me-2 text-primary"></i>
                        Detail Profil Desa
                    </h4>

                    {{-- Menampilkan nama desa (dibatasi 50 karakter) --}}
                    <p class="text-muted mb-0 mt-1">
                        <i class="fas fa-home me-1"></i>
                        "{{ Str::limit($profil->nama_desa, 50) }}"
                    </p>
                </div>

                {{-- Tombol kembali ke halaman index --}}
                <div class="action-right">
                    <div class="d-flex gap-2">
                        <a href="{{ route('profil.index') }}" class="btn-modern btn-secondary-modern">
                            <i class="fas fa-arrow-left me-2"></i>Kembali
                        </a>
                    </div>
                </div>
            </div>
            {{-- ================= END ACTION BAR ================= --}}

            <div class="row">

                {{-- ================= KONTEN UTAMA ================= --}}
                <div class="col-lg-8">

                    {{-- ================= INFO PROFIL DESA ================= --}}
                    <div class="card-modern mb-4">
                        <div class="card-header-modern">
                            <div class="header-content">
                                {{-- Ikon info --}}
                                <i class="fas fa-info-circle"></i>
                                <h5>Informasi Profil Desa</h5>
                            </div>
                        </div>

                        {{-- Body card --}}
                        <div class="card-body p-0">
                            <div class="card-warga">

                                {{-- Header informasi desa --}}
                                <div class="card-warga-header">
                                    <div class="user-avatar-modern">
                                        <i class="fas fa-home"></i>
                                    </div>

                                    <div class="user-info">
                                        {{-- Nama desa --}}
                                        <h6 class="user-name">{{ $profil->nama_desa }}</h6>

                                        {{-- Kecamatan --}}
                                        <span class="badge-gender badge-male">
                                            <i class="fas fa-map-marker-alt me-1"></i>
                                            {{ $profil->kecamatan }}
                                        </span>
                                    </div>
                                </div>

                                {{-- Body detail profil --}}
                                <div class="card-warga-body">

                                    {{-- ID Profil --}}
                                    <div class="info-item">
                                        <div class="info-icon bg-primary">
                                            <i class="fas fa-id-card"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">ID Profil</span>
                                            <span class="info-value">{{ $profil->profil_id }}</span>
                                        </div>
                                    </div>

                                    {{-- Kabupaten --}}
                                    <div class="info-item">
                                        <div class="info-icon bg-success">
                                            <i class="fas fa-map"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Kabupaten</span>
                                            <span class="info-value">{{ $profil->kabupaten }}</span>
                                        </div>
                                    </div>

                                    {{-- Provinsi --}}
                                    <div class="info-item">
                                        <div class="info-icon bg-warning">
                                            <i class="fas fa-globe-asia"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Provinsi</span>
                                            <span class="info-value">{{ $profil->provinsi }}</span>
                                        </div>
                                    </div>

                                    {{-- Alamat kantor --}}
                                    <div class="info-item">
                                        <div class="info-icon bg-info">
                                            <i class="fas fa-building"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Alamat Kantor</span>
                                            <span class="info-value">{{ $profil->alamat_kantor }}</span>
                                        </div>
                                    </div>

                                    {{-- Email --}}
                                    <div class="info-item">
                                        <div class="info-icon bg-primary">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Email</span>
                                            <span class="info-value">{{ $profil->email ?: '-' }}</span>
                                        </div>
                                    </div>

                                    {{-- Telepon --}}
                                    <div class="info-item">
                                        <div class="info-icon bg-success">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Telepon</span>
                                            <span class="info-value">{{ $profil->telepon ?: '-' }}</span>
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
                                                {{ $profil->created_at->format('d M Y') }}
                                            </span>
                                        </div>
                                    </div>

                                    {{-- Terakhir diperbarui --}}
                                    <div class="info-item">
                                        <div class="info-icon bg-info">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Update Terakhir</span>
                                            <span class="info-value">
                                                {{ $profil->updated_at->format('d M Y H:i') }}
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- ================= END INFO PROFIL ================= --}}

                    {{-- ================= VISI & MISI ================= --}}
                    @if ($profil->visi || $profil->misi)
                        <div class="row mt-4">

                            {{-- VISI --}}
                            @if ($profil->visi)
                                <div class="{{ $profil->misi ? 'col-md-6' : 'col-12' }} mb-4">
                                    <div class="card-modern h-100">
                                        <div class="card-header-modern">
                                            <i class="fas fa-lightbulb"></i>
                                            <h5>Visi Desa</h5>
                                        </div>
                                        <div class="card-body p-4" style="white-space: pre-line;">
                                            {{ $profil->visi }}
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {{-- MISI --}}
                            @if ($profil->misi)
                                <div class="{{ $profil->visi ? 'col-md-6' : 'col-12' }} mb-4">
                                    <div class="card-modern h-100">
                                        <div class="card-header-modern">
                                            <i class="fas fa-bullseye"></i>
                                            <h5>Misi Desa</h5>
                                        </div>
                                        <div class="card-body p-4" style="white-space: pre-line;">
                                            {{ $profil->misi }}
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                    @endif
                    {{-- ================= END VISI MISI ================= --}}

                    {{-- ================= LOGO DESA ================= --}}
                    {{-- Mengambil data logo dari tabel media --}}
                    @php
                        $logo = App\Models\Media::where('ref_table', 'profil')
                            ->where('ref_id', $profil->profil_id)
                            ->first();
                    @endphp

                    {{-- Card logo desa --}}
                    <div class="card-modern">
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-image"></i>
                                <h5>Logo Desa</h5>
                            </div>

                            {{-- Badge jika logo tersedia --}}
                            @if ($logo)
                                <span class="badge bg-primary">1 Logo</span>
                            @endif
                        </div>

                        <div class="card-body p-4">

                            {{-- Jika logo tersedia --}}
                            @if ($logo)
                                <div class="row g-3">
                                    <div class="col-md-4 col-lg-3">
                                        <div class="border rounded overflow-hidden shadow-sm">

                                            {{-- Cek apakah file berupa gambar --}}
                                            @if (str_contains($logo->mime_type, 'image'))
                                                {{-- Menampilkan gambar logo --}}
                                                <img src="{{ Storage::url($logo->file_name) }}" class="img-fluid w-100"
                                                    style="height:200px;object-fit:contain;cursor:pointer;"
                                                    data-bs-toggle="modal" data-bs-target="#logoModal">
                                            @else
                                                {{-- Jika bukan gambar --}}
                                                <div class="text-center p-4 bg-light">
                                                    <i class="fas fa-file fa-3x text-muted"></i>
                                                    <p class="small mt-2 mb-0">{{ $logo->file_name }}</p>
                                                </div>
                                            @endif

                                            {{-- Informasi file --}}
                                            <div class="p-3 bg-white">
                                                <small class="d-block text-truncate">
                                                    {{ $logo->caption ?: 'Logo ' . $profil->nama_desa }}
                                                </small>
                                                <small class="text-muted">
                                                    {{ strtoupper(pathinfo($logo->file_name, PATHINFO_EXTENSION)) }}
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Modal preview logo --}}
                                @if (str_contains($logo->mime_type, 'image'))
                                    <div class="modal fade" id="logoModal">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">

                                                {{-- Header modal --}}
                                                <div class="modal-header">
                                                    <h5 class="modal-title">
                                                        {{ $logo->caption ?: 'Logo ' . $profil->nama_desa }}
                                                    </h5>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>

                                                {{-- Body modal --}}
                                                <div class="modal-body text-center">
                                                    <img src="{{ Storage::url($logo->file_name) }}"
                                                        class="img-fluid rounded">
                                                </div>

                                                {{-- Footer modal --}}
                                                <div class="modal-footer">
                                                    <a href="{{ Storage::url($logo->file_name) }}" download
                                                        class="btn btn-sm btn-primary">
                                                        <i class="fas fa-download me-1"></i>Download
                                                    </a>
                                                    <button type="button" class="btn btn-sm btn-secondary"
                                                        data-bs-dismiss="modal">
                                                        Tutup
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @else
                                {{-- Jika logo belum ada --}}
                                <div class="text-center py-5">
                                    <i class="fas fa-image fa-4x text-muted mb-3"></i>
                                    <p class="text-muted">Belum ada logo desa</p>
                                    <a href="{{ route('profil.edit', $profil->profil_id) }}"
                                        class="btn btn-sm btn-primary">
                                        <i class="fas fa-plus me-1"></i> Tambah Logo
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                    {{-- ================= END LOGO ================= --}}

                </div>

                {{-- ================= SIDEBAR ================= --}}
                <div class="col-lg-4">

                    {{-- CARD AKSI --}}
                    <div class="card-modern mb-4">
                        <div class="card-header-modern">
                            <i class="fas fa-cogs"></i>
                            <h5>Aksi</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-2">

                                {{-- Edit --}}
                                <a href="{{ route('profil.edit', $profil->profil_id) }}"
                                    class="btn-modern btn-warning-modern w-100">
                                    <i class="fas fa-edit me-2"></i>Edit Profil
                                </a>

                                {{-- Hapus --}}
                                <form action="{{ route('profil.destroy', $profil->profil_id) }}" method="POST"
                                    class="m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-modern btn-danger-modern w-100"
                                        onclick="return confirm('Hapus profil desa ini?')">
                                        <i class="fas fa-trash me-2"></i>Hapus Profil
                                    </button>
                                </form>

                                {{-- Buat Baru --}}
                                <a href="{{ route('profil.create') }}" class="btn-modern btn-success-modern w-100">
                                    <i class="fas fa-plus me-2"></i>Buat Baru
                                </a>

                                {{-- Daftar --}}
                                <a href="{{ route('profil.index') }}" class="btn-modern btn-secondary-modern w-100">
                                    <i class="fas fa-list me-2"></i>Daftar Profil
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
