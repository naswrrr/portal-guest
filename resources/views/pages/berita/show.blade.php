@extends('layouts.guest.app')

@section('content')
    {{-- start main content --}}
    <div class="container-fluid content-section">
        <div class="container py-5">

            <!-- Action Bar -->
            <div class="action-bar mb-4">
                <div class="action-left">
                    <a href="{{ route('berita.index') }}" class="btn-modern btn-secondary-modern mb-3">
                        <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar
                    </a>
                    <h4 class="mb-0 fw-bold text-dark">
                        <i class="fas fa-eye me-2 text-primary"></i>
                        Detail Berita
                    </h4>
                </div>
                <div class="action-right">
                    <a href="{{ route('berita.edit', $berita->berita_id) }}"  class="btn-modern btn-warning-modern">
                        <i class="fas fa-edit me-2"></i>Edit Berita
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <!-- Berita Content -->
                    <div class="card-modern">
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-newspaper"></i>
                                <h5>{{ $berita->judul }}</h5>
                            </div>
                            <span class="badge-gender {{ $berita->status == 'terbit' ? 'badge-male' : 'badge-female' }}">
                                {{ $berita->status == 'terbit' ? 'Terbit' : 'Draft' }}
                            </span>
                        </div>
                        <div class="card-body p-4">
                            <div class="berita-meta mb-4">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="meta-item">
                                            <i class="fas fa-tags text-primary me-2"></i>
                                            <strong>Kategori:</strong> {{ $berita->kategori->nama }}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="meta-item">
                                            <i class="fas fa-user-edit text-success me-2"></i>
                                            <strong>Penulis:</strong> {{ $berita->penulis }}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="meta-item">
                                            <i class="fas fa-calendar text-warning me-2"></i>
                                            <strong>Tanggal Terbit:</strong>
                                            {{ $berita->terbit_at ? $berita->terbit_at->format('d M Y H:i') : 'Belum diterbitkan' }}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="meta-item">
                                            <i class="fas fa-sync text-info me-2"></i>
                                            <strong>Terakhir Update:</strong>
                                            {{ $berita->updated_at->format('d M Y H:i') }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="berita-content">
                                <h6 class="text-muted mb-3">Isi Berita:</h6>
                                <div class="content-body p-3 bg-light rounded">
                                    {!! $berita->isi_html !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- Action Sidebar -->
                    <div class="card-modern">
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-cogs"></i>
                                <h5>Aksi</h5>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="d-grid gap-2">
                                <a href="{{ route('berita.edit', $berita->berita_id) }}" class="btn-modern btn-warning-modern">
                                    <i class="fas fa-edit me-2"></i>Edit Berita
                                </a>
                                <form action="{{ route('berita.destroy', $berita->berita_id) }}" method="POST" class="d-grid">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-modern btn-danger-modern"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                        <i class="fas fa-trash me-2"></i>Hapus Berita
                                    </button>
                                </form>
                                <a href="{{ route('berita.index') }}" class="btn-modern btn-secondary-modern">
                                    <i class="fas fa-list me-2"></i>Kembali ke Daftar
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Info Sidebar -->
                    <div class="card-modern mt-4">
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-info-circle"></i>
                                <h5>Informasi</h5>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="info-list">
                                <div class="info-item small">
                                    <i class="fas fa-calendar-plus text-success me-2"></i>
                                    <strong>Dibuat:</strong> {{ $berita->created_at->format('d M Y H:i') }}
                                </div>
                                <div class="info-item small">
                                    <i class="fas fa-sync text-warning me-2"></i>
                                    <strong>Diupdate:</strong> {{ $berita->updated_at->format('d M Y H:i') }}
                                </div>
                                <div class="info-item small">
                                    <i class="fas fa-link text-primary me-2"></i>
                                    <strong>Slug:</strong> {{ $berita->slug }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end main content --}}
@endsection
