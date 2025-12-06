@extends('layouts.guest.app')

@section('content')
    {{-- start main content --}}
    @include('layouts.guest.navbar')

    <div class="container-fluid content-section">
        <div class="container py-5">

            <!-- Action Bar -->
            <div class="action-bar mb-4">
                <div class="action-left">
                    <h4 class="mb-0 fw-bold text-dark">
                        <i class="fas fa-eye me-2 text-primary"></i>
                        Detail Profil Desa
                    </h4>
                    <p class="text-muted mb-0 mt-1">
                        <i class="fas fa-home me-1"></i>
                        "{{ Str::limit($profil->nama_desa, 50) }}"
                    </p>
                </div>
                <div class="action-right">
                    <div class="d-flex gap-2">
                        <a href="{{ route('profil.index') }}" class="btn-modern btn-secondary-modern">
                            <i class="fas fa-arrow-left me-2"></i>Kembali
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <!-- Info Card -->
                    <div class="card-modern mb-4">
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-info-circle"></i>
                                <h5>Informasi Profil Desa</h5>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="card-warga">
                                <div class="card-warga-header">
                                    <div class="user-avatar-modern">
                                        <i class="fas fa-home"></i>
                                    </div>
                                    <div class="user-info">
                                        <h6 class="user-name">{{ $profil->nama_desa }}</h6>
                                        <span class="badge-gender badge-male">
                                            <i class="fas fa-map-marker-alt me-1"></i>
                                            {{ $profil->kecamatan }}
                                        </span>
                                    </div>
                                </div>
                                <div class="card-warga-body">
                                    <div class="info-item">
                                        <div class="info-icon bg-primary">
                                            <i class="fas fa-id-card"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">ID Profil</span>
                                            <span class="info-value">{{ $profil->profil_id }}</span>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-icon bg-success">
                                            <i class="fas fa-map"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Kabupaten</span>
                                            <span class="info-value">{{ $profil->kabupaten }}</span>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-icon bg-warning">
                                            <i class="fas fa-globe-asia"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Provinsi</span>
                                            <span class="info-value">{{ $profil->provinsi }}</span>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-icon bg-info">
                                            <i class="fas fa-building"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Alamat Kantor</span>
                                            <span class="info-value">{{ $profil->alamat_kantor }}</span>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-icon bg-primary">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Email</span>
                                            <span class="info-value">{{ $profil->email ?: '-' }}</span>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-icon bg-success">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Telepon</span>
                                            <span class="info-value">{{ $profil->telepon ?: '-' }}</span>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-icon bg-warning">
                                            <i class="fas fa-calendar-plus"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Dibuat</span>
                                            <span class="info-value">{{ $profil->created_at->format('d M Y') }}</span>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-icon bg-info">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Update Terakhir</span>
                                            <span class="info-value">{{ $profil->updated_at->format('d M Y H:i') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Visi Misi Section -->
                    <div class="row">
                        @if($profil->visi)
                        <div class="col-md-6 mb-4">
                            <div class="card-modern">
                                <div class="card-header-modern">
                                    <div class="header-content">
                                        <i class="fas fa-lightbulb"></i>
                                        <h5>Visi Desa</h5>
                                    </div>
                                </div>
                                <div class="card-body p-4">
                                    <div class="p-3 bg-light rounded">
                                        {{ $profil->visi }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($profil->misi)
                        <div class="col-md-6 mb-4">
                            <div class="card-modern">
                                <div class="card-header-modern">
                                    <div class="header-content">
                                        <i class="fas fa-bullseye"></i>
                                        <h5>Misi Desa</h5>
                                    </div>
                                </div>
                                <div class="card-body p-4">
                                    <div class="p-3 bg-light rounded">
                                        {{ $profil->misi }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Logo Desa Section -->
                    @php
                        $logo = App\Models\Media::where('ref_table', 'profil')
                            ->where('ref_id', $profil->profil_id)
                            ->first();
                    @endphp

                    <div class="card-modern">
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-image"></i>
                                <h5>Logo Desa</h5>
                            </div>
                            @if($logo)
                            <span class="badge bg-primary">1 Logo</span>
                            @endif
                        </div>
                        <div class="card-body p-4">
                            @if($logo)
                                <div class="row g-3">
                                    <div class="col-md-4 col-lg-3">
                                        <div class="border rounded overflow-hidden shadow-sm">
                                            @if (str_contains($logo->mime_type, 'image'))
                                                <!-- PAKAI STORAGE URL -->
                                                <img src="{{ Storage::url($logo->file_name) }}" class="img-fluid w-100"
                                                    style="height: 200px; object-fit: contain; cursor: pointer; background-color: #f8f9fa;"
                                                    alt="{{ $logo->caption }}" data-bs-toggle="modal"
                                                    data-bs-target="#logoModal">
                                            @else
                                                <div class="text-center p-4 bg-light">
                                                    <i class="fas fa-file fa-3x text-muted"></i>
                                                    <p class="small mt-2 mb-0">{{ $logo->file_name }}</p>
                                                </div>
                                            @endif

                                            <div class="p-3 bg-white">
                                                <small class="d-block text-truncate" title="{{ $logo->caption }}">
                                                    <i class="fas fa-sticky-note me-1"></i>
                                                    {{ $logo->caption ?: 'Logo ' . $profil->nama_desa }}
                                                </small>
                                                <small class="text-muted">
                                                    {{ strtoupper(pathinfo($logo->file_name, PATHINFO_EXTENSION)) }}
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal for logo preview -->
                                @if (str_contains($logo->mime_type, 'image'))
                                    <div class="modal fade" id="logoModal">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">
                                                        {{ $logo->caption ?: 'Logo ' . $profil->nama_desa }}</h5>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <img src="{{ Storage::url($logo->file_name) }}"
                                                        class="img-fluid rounded" alt="{{ $logo->caption }}"
                                                        style="max-height: 70vh; max-width: 100%;">
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="{{ Storage::url($logo->file_name) }}"
                                                        download="{{ $logo->file_name }}"
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

                                <!-- Media Info -->
                                <div class="alert alert-info mt-4">
                                    <i class="fas fa-info-circle me-2"></i>
                                    <small>
                                        Data disimpan di tabel <code>media</code> dengan
                                        <code>ref_table='profil_desa'</code> dan <code>ref_id={{ $profil->profil_id }}</code>
                                    </small>
                                </div>
                            @else
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
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Action Card -->
                    <div class="card-modern mb-4">
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-cogs"></i>
                                <h5>Aksi</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <a href="{{ route('profil.edit', $profil->profil_id) }}" class="btn-modern btn-warning-modern">
                                    <i class="fas fa-edit me-2"></i>Edit Profil
                                </a>
                                <form action="{{ route('profil.destroy', $profil->profil_id) }}" method="POST" class="d-grid">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-modern btn-danger-modern"
                                        onclick="return confirm('Hapus profil desa ini? Logo terkait juga akan dihapus.')">
                                        <i class="fas fa-trash me-2"></i>Hapus Profil
                                    </button>
                                </form>
                                <a href="{{ route('profil.create') }}" class="btn-modern btn-success-modern">
                                    <i class="fas fa-plus me-2"></i>Buat Baru
                                </a>
                                <a href="{{ route('profil.index') }}" class="btn-modern btn-secondary-modern">
                                    <i class="fas fa-list me-2"></i>Daftar Profil
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Info Card -->
                    <div class="card-modern">
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-info-circle"></i>
                                <h5>Statistik</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-column gap-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-home"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Nama Desa</small>
                                        <strong>{{ $profil->nama_desa }}</strong>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="icon-circle bg-success">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Kecamatan</small>
                                        <strong>{{ $profil->kecamatan }}</strong>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="icon-circle bg-warning">
                                        <i class="fas fa-hashtag"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">ID Profil</small>
                                        <strong>{{ $profil->profil_id }}</strong>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="icon-circle bg-info">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Durasi</small>
                                        <strong>{{ $profil->created_at->diffForHumans() }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Logo Preview Card -->
                    @if($logo)
                    <div class="card-modern mt-4">
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-eye"></i>
                                <h5>Pratinjau Logo</h5>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <div class="logo-preview mb-3">
                                <img src="{{ Storage::url($logo->file_name) }}"
                                     class="img-fluid rounded-circle border shadow-sm"
                                     style="width: 150px; height: 150px; object-fit: cover;"
                                     alt="Logo {{ $profil->nama_desa }}">
                            </div>
                            <p class="text-muted small mb-0">
                                <i class="fas fa-image me-1"></i>
                                {{ $logo->file_name }}
                            </p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
