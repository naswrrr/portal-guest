@extends('layouts.guest.app')

@section('content')
    {{-- start main content --}}
    <div class="container-fluid content-section">
        <div class="container py-5">

            <!-- Page Header Start -->
            <div class="page-header-modern text-center mb-5">
                <div class="header-icon">
                    <i class="fas fa-users-cog"></i>
                </div>
                <h5 class="text-primary fw-bold text-uppercase mb-2">Manajemen User</h5>
                <h1 class="display-4 fw-bold mb-3">Kelola User Portal Desa</h1>
                <p class="text-muted fs-5 mb-0">Kelola user/admin yang dapat mengakses sistem dengan mudah dan efisien</p>
            </div>
            <!-- Page Header End -->

            <!-- Notifikasi -->
            @if (session('success'))
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

            <!-- Form Edit -->
            @if (isset($editData))
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="card-modern card-edit">
                            <div class="card-header-modern">
                                <div class="header-content">
                                    <i class="fas fa-edit"></i>
                                    <h5>Edit Data User</h5>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <form action="{{ route('users.update', $editData->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row g-4">

                                        <div class="col-12">
                                            <label for="name" class="form-label-modern">Nama User</label>
                                            <div class="input-group-modern">
                                                <span class="input-icon"><i class="fas fa-user"></i></span>
                                                <input type="text" class="form-control-modern" name="name"
                                                    value="{{ old('name', $editData->name) }}" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label-modern">Email</label>
                                            <div class="input-group-modern">
                                                <span class="input-icon"><i class="fas fa-envelope"></i></span>
                                                <input type="email" class="form-control-modern" name="email"
                                                    value="{{ old('email', $editData->email) }}" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label-modern">Password Baru</label>
                                            <div class="input-group-modern">
                                                <span class="input-icon"><i class="fas fa-lock"></i></span>
                                                <input type="password" class="form-control-modern" name="password">
                                            </div>
                                            <small class="text-muted">* Kosongkan jika tidak ingin mengubah password</small>
                                        </div>

                                        <div class="col-12">
                                            <div class="d-flex gap-3">
                                                <button type="submit" class="btn-modern btn-primary-modern">
                                                    <i class="fas fa-save me-2"></i>Update User
                                                </button>
                                                <a href="{{ route('users.index') }}"
                                                    class="btn-modern btn-secondary-modern">
                                                    <i class="fas fa-times me-2"></i>Batal
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Action Bar -->
            <div class="action-bar mb-4">
                <div class="action-left">
                    <h4 class="mb-0 fw-bold text-dark">
                        <i class="fas fa-users me-2 text-primary"></i>
                        Daftar User Portal
                    </h4>
                    <p class="text-muted mb-0 mt-1">Total {{ $users->total() }} user</p>
                </div>
                <div class="action-right">
                    <a href="{{ route('users.create') }}" class="btn-modern btn-primary-modern">
                        <i class="fas fa-plus me-2"></i>Tambah User Baru
                    </a>
                </div>
            </div>

            <!-- Search Modern -->
            <form method="GET" action="{{ route('users.index') }}" class="mb-4">
                <div class="row g-3">

                    <!-- Input Search -->
                    <div class="col-md-4">
                        <label class="form-label-modern">Cari User</label>
                        <div class="input-group-modern">
                            <span class="input-icon"><i class="fas fa-search"></i></span>
                            <input type="text" name="search" class="form-control-modern"
                                placeholder="Cari nama atau email..." value="{{ request('search') }}">
                        </div>
                    </div>

                    <!-- Tombol Cari -->
                    <div class="col-md-2 d-flex align-items-end">
                        <button class="btn-modern btn-primary-modern w-100">
                            <i class="fas fa-search me-2"></i>Cari
                        </button>
                    </div>

                    <!-- Tombol Clear (muncul jika filter aktif) -->
                    @if (request('search'))
                        <div class="col-md-2 d-flex align-items-end">
                            <a href="{{ route('users.index') }}" class="btn-modern btn-secondary-modern w-100">
                                <i class="fas fa-times me-2"></i>Clear
                            </a>
                        </div>
                    @endif

                </div>
            </form>


            <!-- Card Grid -->
            @if ($users->count() > 0)
                <div class="row g-4">
                    @foreach ($users as $user)
                        <div class="col-lg-6 col-xl-4">
                            <div class="card-warga">

                                <div class="card-warga-header">
                                    <div class="user-avatar-modern">
                                        @if ($user->media && $user->media->first())
                                            <img src="{{ asset('storage/' . $user->media->first()->file_path) }}" alt="Foto User"
                                                style="width: 70px; height: 70px; object-fit: cover; border-radius: 50%;">
                                        @else
                                            <i class="fas fa-user-cog"></i>
                                        @endif

                                    </div>

                                    <div class="user-info">
                                        <h6 class="user-name">{{ $user->name }}</h6>
                                        <span class="badge-gender badge-male">
                                            <i class="fas fa-user-tie me-1"></i>
                                            Administrator
                                        </span>
                                    </div>
                                </div>

                                <div class="card-warga-body">
                                    <div class="info-item">
                                        <div class="info-icon bg-primary">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Email</span>
                                            <span class="info-value">{{ $user->email }}</span>
                                        </div>
                                    </div>

                                    <div class="info-item">
                                        <div class="info-icon bg-success">
                                            <i class="fas fa-calendar-plus"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Dibuat</span>
                                            <span class="info-value">{{ $user->created_at->format('d M Y') }}</span>
                                        </div>
                                    </div>

                                    <div class="info-item">
                                        <div class="info-icon bg-warning">
                                            <i class="fas fa-sync"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Diupdate</span>
                                            <span class="info-value">{{ $user->updated_at->format('d M Y') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-warga-footer">
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn-action btn-action-edit">
                                        <i class="fas fa-edit"></i>
                                        <span>Edit</span>
                                    </a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-action-delete"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                            <i class="fas fa-trash"></i>
                                            <span>Hapus</span>
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $users->links('pagination::bootstrap-5') }}
                </div>
            @else
                <div class="empty-state-modern">
                    <div class="empty-icon"><i class="fas fa-users"></i></div>
                    <h4 class="empty-title">Belum Ada Data User</h4>
                    <p class="empty-text">Mulai tambahkan user pertama Anda untuk mengelola sistem portal desa</p>
                    <a href="{{ route('users.create') }}" class="btn-modern btn-primary-modern">
                        <i class="fas fa-plus me-2"></i>Tambah User Pertama
                    </a>
                </div>
            @endif

        </div>
    </div>
@endsection
