@extends('layouts.guest.app')

@section('content')
    @include('layouts.guest.navbar')

    <div class="container-fluid content-section">
        <div class="container py-5">

            <!-- Action Bar -->
            <div class="action-bar mb-4">
                <div class="action-left">
                    <h4 class="mb-0 fw-bold text-dark">
                        <i class="fas fa-eye me-2 text-primary"></i>
                        Detail Data Warga
                    </h4>
                    <p class="text-muted mb-0 mt-1">
                        <i class="fas fa-user me-1"></i>
                        "{{ $warga->nama }}"
                    </p>
                </div>
                <div class="action-right">
                    <a href="{{ route('warga.index') }}" class="btn-modern btn-secondary-modern">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </div>

            <div class="row">
                <!-- KONTEN UTAMA -->
                <div class="col-lg-8">

                    <!-- Informasi Warga -->
                    <div class="card-modern mb-4">
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-id-card"></i>
                                <h5>Informasi Warga</h5>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <div class="card-warga">
                                <div class="card-warga-header">

                                    {{-- Foto Warga --}}
                                    @if ($warga->media && $warga->media->first())
                                        <img src="{{ asset('storage/' . $warga->media->first()->file_name) }}"
                                            style="width:70px;height:70px;border-radius:50%;object-fit:cover;">
                                    @else
                                        <div class="user-avatar-modern">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    @endif

                                    <div class="user-info">
                                        <h6 class="user-name">{{ $warga->nama }}</h6>
                                        <span
                                            class="badge-gender {{ $warga->jenis_kelamin == 'Laki-laki' ? 'badge-male' : 'badge-female' }}">
                                            <i
                                                class="fas {{ $warga->jenis_kelamin == 'Laki-laki' ? 'fa-mars' : 'fa-venus' }}"></i>
                                            {{ $warga->jenis_kelamin }}
                                        </span>
                                    </div>
                                </div>

                                <div class="card-warga-body">

                                    <div class="info-item">
                                        <div class="info-icon bg-primary">
                                            <i class="fas fa-id-card"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">No KTP</span>
                                            <span class="info-value">{{ $warga->no_ktp }}</span>
                                        </div>
                                    </div>

                                    <div class="info-item">
                                        <div class="info-icon bg-success">
                                            <i class="fas fa-praying-hands"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Agama</span>
                                            <span class="info-value">{{ $warga->agama }}</span>
                                        </div>
                                    </div>

                                    <div class="info-item">
                                        <div class="info-icon bg-warning">
                                            <i class="fas fa-briefcase"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Pekerjaan</span>
                                            <span class="info-value">{{ $warga->pekerjaan }}</span>
                                        </div>
                                    </div>

                                    <div class="info-item">
                                        <div class="info-icon bg-info">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Telepon</span>
                                            <span class="info-value">{{ $warga->telp ?: '-' }}</span>
                                        </div>
                                    </div>

                                    <div class="info-item">
                                        <div class="info-icon bg-secondary">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Email</span>
                                            <span class="info-value">{{ $warga->email ?: '-' }}</span>
                                        </div>
                                    </div>

                                    <div class="info-item">
                                        <div class="info-icon bg-warning">
                                            <i class="fas fa-calendar-plus"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Dibuat</span>
                                            <span class="info-value">{{ $warga->created_at->format('d M Y') }}</span>
                                        </div>
                                    </div>

                                    <div class="info-item">
                                        <div class="info-icon bg-info">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Update Terakhir</span>
                                            <span class="info-value">{{ $warga->updated_at->format('d M Y H:i') }}</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- SIDEBAR -->
                <div class="col-lg-4">

                    <!-- Aksi -->
                    <div class="card-modern mb-4">
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-cogs"></i>
                                <h5>Aksi</h5>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="d-grid gap-2">

                                <a href="{{ route('warga.edit', $warga->warga_id) }}"
                                    class="btn-modern btn-warning-modern w-100">
                                    <i class="fas fa-edit me-2"></i>Edit Data
                                </a>

                                <form action="{{ route('warga.destroy', $warga->warga_id) }}" method="POST"
                                    class="w-100">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-modern btn-danger-modern w-100"
                                        onclick="return confirm('Hapus data warga ini?')">
                                        <i class="fas fa-trash me-2"></i>Hapus
                                    </button>
                                </form>

                                <a href="{{ route('warga.create') }}" class="btn-modern btn-success-modern w-100">
                                    <i class="fas fa-plus me-2"></i>Tambah Warga
                                </a>

                            </div>
                        </div>
                    </div>



                    <!-- Statistik -->
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
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted">Nama</small>
                                        <strong>{{ $warga->nama }}</strong>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="icon-circle bg-success">
                                        <i class="fas fa-venus-mars"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted">Jenis Kelamin</small>
                                        <strong>{{ $warga->jenis_kelamin }}</strong>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="icon-circle bg-warning">
                                        <i class="fas fa-hashtag"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted">ID Warga</small>
                                        <strong>{{ $warga->warga_id }}</strong>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="icon-circle bg-info">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted">Durasi</small>
                                        <strong>{{ $warga->created_at->diffForHumans() }}</strong>
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
