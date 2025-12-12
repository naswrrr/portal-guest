@extends('layouts.guest.app')

@section('content')
    @include('layouts.guest.navbar')

    <div class="container-fluid content-section">
        <div class="container py-5">

            <!-- Page Header Start -->
            <div class="page-header-modern text-center mb-5">
                <div class="header-icon">
                    <i class="fas fa-newspaper"></i>
                </div>
                <h5 class="text-primary fw-bold text-uppercase mb-2">Detail Berita</h5>
                <h1 class="display-4 fw-bold mb-3">{{ Str::limit($berita->judul, 50) }}</h1>
                <p class="text-muted fs-5 mb-0">
                    {{ $berita->kategori->nama ?? 'Informasi' }} | Dibuat: {{ $berita->created_at->format('d M Y') }}
                </p>
            </div>
            <!-- Page Header End -->


            <!-- Action Bar -->
            <div class="action-bar mb-4">
                <div class="action-left">
                    <h4 class="mb-0 fw-bold text-dark">
                        <i class="fas fa-eye me-2 text-primary"></i>
                        Detail Berita
                    </h4>
                    <p class="text-muted mb-0 mt-1">
                        <i class="fas fa-file-alt me-1"></i>
                        "{{ Str::limit($berita->judul, 50) }}"
                    </p>
                </div>
                <div class="action-right">
                    <a href="{{ route('berita.index') }}" class="btn-modern btn-secondary-modern">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </div>

            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <!-- Info Card -->
                    <div class="card-modern mb-4">
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-info-circle"></i>
                                <h5>Informasi</h5>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="card-warga">
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
                                <div class="card-warga-body">
                                    <div class="info-item">
                                        <div class="info-icon bg-primary">
                                            <i class="fas fa-id-card"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">ID Berita</span>
                                            <span class="info-value">{{ $berita->berita_id }}</span>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-icon bg-success">
                                            <i class="fas fa-database"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Kategori ID</span>
                                            <span class="info-value">{{ $berita->kategori_id }}</span>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-icon bg-warning">
                                            <i class="fas fa-calendar-plus"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Dibuat</span>
                                            <span class="info-value">{{ $berita->created_at->format('d M Y') }}</span>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-icon bg-info">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Durasi</span>
                                            <span class="info-value">{{ $berita->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Foto Cover Section -->
                    @php
                        $mediaFiles = $berita->media()->orderBy('sort_order')->get();
                        $mediaCount = $mediaFiles->count();
                    @endphp

                    <div class="card-modern mb-4">
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-images"></i>
                                <h5>Foto Cover Berita</h5>
                            </div>
                            <span class="badge bg-primary">{{ $mediaCount }} Foto</span>
                        </div>
                        <div class="card-body p-4">
                            @if ($mediaCount > 0)
                                <div class="row g-3">
                                    @foreach ($mediaFiles as $file)
                                        <div class="col-md-4 col-lg-3 mb-3">
                                            <div class="border rounded overflow-hidden shadow-sm">
                                                @if (str_contains($file->mime_type, 'image'))
                                                    <img src="{{ Storage::url($file->file_name) }}" class="img-fluid w-100"
                                                        style="height: 150px; object-fit: cover; cursor: pointer;"
                                                        alt="{{ $file->caption }}" data-bs-toggle="modal"
                                                        data-bs-target="#imageModal{{ $file->media_id }}"
                                                        onerror="this.src='https://via.placeholder.com/300x200?text=Gagal+Memuat+Gambar'">
                                                @else
                                                    <div class="text-center p-4 bg-light">
                                                        <i class="fas fa-file fa-3x text-muted"></i>
                                                        <p class="small mt-2 mb-0">{{ $file->file_name }}</p>
                                                    </div>
                                                @endif

                                                <div class="p-3 bg-white">
                                                    <small class="d-block text-truncate" title="{{ $file->caption }}">
                                                        <i class="fas fa-sticky-note me-1"></i>
                                                        {{ $file->caption ?: 'Tanpa keterangan' }}
                                                    </small>
                                                    <small class="text-muted">
                                                        {{ strtoupper(pathinfo($file->file_name, PATHINFO_EXTENSION)) }}
                                                    </small>
                                                </div>
                                            </div>

                                            @if (str_contains($file->mime_type, 'image'))
                                                <div class="modal fade" id="imageModal{{ $file->media_id }}">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">
                                                                    {{ $file->caption ?: 'Foto Cover' }}</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <img src="{{ Storage::url($file->file_name) }}"
                                                                    class="img-fluid rounded" alt="{{ $file->caption }}"
                                                                    style="max-height: 70vh;">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="{{ Storage::url($file->file_name) }}"
                                                                    download="{{ $file->file_name }}"
                                                                    class="btn btn-sm btn-primary">
                                                                    <i class="fas fa-download me-1"></i>Download
                                                                </a>
                                                                <button type="button" class="btn btn-sm btn-secondary"
                                                                    data-bs-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-5">
                                    <i class="fas fa-image fa-4x text-muted mb-3"></i>
                                    <p class="text-muted">Belum ada foto cover</p>
                                    <a href="{{ route('berita.edit', $berita->berita_id) }}"
                                        class="btn btn-sm btn-primary">
                                        <i class="fas fa-plus me-1"></i> Tambah Foto
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
                                <a href="{{ route('berita.edit', $berita->berita_id) }}"
                                    class="btn-modern btn-warning-modern">
                                    <i class="fas fa-edit me-2"></i>Edit Berita
                                </a>
                                <form action="{{ route('berita.destroy', $berita->berita_id) }}" method="POST"
                                    class="d-grid">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-modern btn-danger-modern"
                                        onclick="return confirm('Hapus berita ini? Semua foto terkait juga akan dihapus.')">
                                        <i class="fas fa-trash me-2"></i>Hapus Berita
                                    </button>
                                </form>
                                <a href="{{ route('berita.create') }}" class="btn-modern btn-success-modern">
                                    <i class="fas fa-plus me-2"></i>Buat Baru
                                </a>
                                <a href="{{ route('berita.index') }}" class="btn-modern btn-secondary-modern">
                                    <i class="fas fa-list me-2"></i>Daftar Berita
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Info Card -->
                    <div class="card-modern">
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-info-circle"></i>
                                <h5>Informasi</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-column gap-3">
                                <div class="d-flex align-items-center gap-3">
                                    <i class="fas fa-id-card text-primary"></i>
                                    <div>
                                        <small class="text-muted d-block">ID Berita</small>
                                        <strong>{{ $berita->berita_id }}</strong>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-3">
                                    <i class="fas fa-database text-success"></i>
                                    <div>
                                        <small class="text-muted d-block">Kategori ID</small>
                                        <strong>{{ $berita->kategori_id }}</strong>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-3">
                                    <i class="fas fa-calendar-plus text-warning"></i>
                                    <div>
                                        <small class="text-muted d-block">Dibuat</small>
                                        <strong>{{ $berita->created_at->format('d M Y') }}</strong>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-3">
                                    <i class="fas fa-clock text-info"></i>
                                    <div>
                                        <small class="text-muted d-block">Durasi</small>
                                        <strong>{{ $berita->created_at->diffForHumans() }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
