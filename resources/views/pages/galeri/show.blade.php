@extends('layouts.guest.app')

@section('content')
    @include('layouts.guest.navbar')

    <div class="container-fluid content-section">
        <div class="container py-5">

            <!-- ACTION BAR -->
            <div class="action-bar mb-4">
                <div class="action-left">
                    <h4 class="mb-0 fw-bold text-dark">
                        <i class="fas fa-eye me-2 text-primary"></i>
                        Detail Galeri
                    </h4>
                    <p class="text-muted mb-0 mt-1">
                        <i class="fas fa-images me-1"></i>
                        "{{ \Illuminate\Support\Str::limit($galeri->judul, 50) }}"
                    </p>
                </div>
                <div class="action-right">
                    <a href="{{ route('galeri.index') }}" class="btn-modern btn-secondary-modern">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </div>

            <div class="row">

                <!-- MAIN -->
                <div class="col-lg-8">

                    <!-- INFO GALERI -->
                    <div class="card-modern mb-4">
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-info-circle"></i>
                                <h5>Informasi Galeri</h5>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-2">{{ $galeri->judul }}</h5>
                            <p class="text-muted mb-3">
                                {{ $galeri->deskripsi ?: '-' }}
                            </p>

                            <div class="d-flex gap-4 text-muted">
                                <span>
                                    <i class="fas fa-calendar-alt me-1"></i>
                                    Dibuat: {{ $galeri->created_at->format('d M Y') }}
                                </span>
                                <span>
                                    <i class="fas fa-images me-1"></i>
                                    {{ $galeri->media->count() }} Foto
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- FOTO GALERI -->
                    <div class="card-modern">
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-images"></i>
                                <h5>Foto Galeri</h5>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            @if ($galeri->media->count())
                                <div class="row g-3">
                                    @foreach ($galeri->media as $media)
                                        <div class="col-6 col-md-4">
                                            <img src="{{ asset('storage/' . $media->file_name) }}"
                                                class="img-fluid rounded shadow-sm"
                                                style="width:100%;height:180px;object-fit:cover;">
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center text-muted py-5">
                                    <i class="fas fa-image fa-3x mb-3"></i>
                                    <p>Belum ada foto di galeri ini</p>
                                </div>
                            @endif

                        </div>
                    </div>

                </div>

                <!-- SIDEBAR -->
                <div class="col-lg-4">

                    <div class="card-modern mb-4">
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-cogs"></i>
                                <h5>Aksi</h5>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <a href="{{ route('galeri.edit', $galeri->galeri_id) }}"
                                    class="btn-modern btn-warning-modern">
                                    <i class="fas fa-edit me-2"></i>Edit Galeri
                                </a>

                                <form action="{{ route('galeri.destroy', $galeri->galeri_id) }}" method="POST"
                                    onsubmit="return confirm('Hapus galeri ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-modern btn-danger-modern w-100">
                                        <i class="fas fa-trash me-2"></i>Hapus Galeri
                                    </button>
                                </form>

                                <a href="{{ route('galeri.create') }}" class="btn-modern btn-success-modern">
                                    <i class="fas fa-plus me-2"></i>Tambah Galeri
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection
