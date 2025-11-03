@extends('layouts.guest.app')

@section('content')
    {{-- start main content --}}
    <!-- Navbar start -->
    @include('layouts.guest.navbar', ['activePage' => 'users'])
    <!-- Navbar End -->

    <!-- Content Start -->
    <div class="container-fluid content-section">
        <div class="container py-5">

            <!-- Page Header Start -->
            <div class="page-header-modern text-center mb-5">
                <div class="header-icon">
                    <i class="fas fa-user-edit"></i>
                </div>
                <h5 class="text-primary fw-bold text-uppercase mb-2">Edit User</h5>
                <h1 class="display-4 fw-bold mb-3">Perbarui Data User</h1>
                <p class="text-muted fs-5 mb-0">Update informasi user dengan data terbaru</p>
            </div>
            <!-- Page Header End -->

            <!-- Action Bar -->
            <div class="action-bar mb-4">
                <div class="action-left">
                    <h4 class="mb-0 fw-bold text-dark">
                        <i class="fas fa-user-edit me-2 text-primary"></i>
                        Edit Data User
                    </h4>
                    <p class="text-muted mb-0 mt-1">Perbarui informasi user {{ $user->name }}</p>
                </div>
                <div class="action-right">
                    <a href="{{ route('users.index') }}" class="btn-modern btn-secondary-modern">
                        <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar
                    </a>
                </div>
            </div>

            <!-- Notifikasi Error -->
            @if ($errors->any())
                <div class="alert alert-modern alert-danger alert-dismissible fade show mb-4" role="alert">
                    <div class="alert-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="alert-content">
                        <strong>Terjadi Kesalahan!</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Card Edit -->
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card-modern card-edit">
                        <div class="card-header-modern">
                            <div class="header-content">
                                <i class="fas fa-edit"></i>
                                <h5>Form Edit Data User</h5>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <form action="{{ route('users.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row g-4">
                                    <!-- NAMA USER -->
                                    <div class="col-12">
                                        <label for="name" class="form-label-modern">Nama User <span class="text-danger">*</span></label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-user"></i>
                                            </span>
                                            <input type="text" class="form-control-modern @error('name') is-invalid @enderror"
                                                id="name" name="name" value="{{ old('name', $user->name) }}"
                                                placeholder="Masukkan nama user" required>
                                        </div>
                                        @error('name')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- EMAIL -->
                                    <div class="col-md-6">
                                        <label for="email" class="form-label-modern">Email <span class="text-danger">*</span></label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-envelope"></i>
                                            </span>
                                            <input type="email" class="form-control-modern @error('email') is-invalid @enderror"
                                                id="email" name="email" value="{{ old('email', $user->email) }}"
                                                placeholder="Masukkan email" required>
                                        </div>
                                        @error('email')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- PASSWORD BARU -->
                                    <div class="col-md-6">
                                        <label for="password" class="form-label-modern">Password Baru</label>
                                        <div class="input-group-modern">
                                            <span class="input-icon">
                                                <i class="fas fa-lock"></i>
                                            </span>
                                            <input type="password" class="form-control-modern @error('password') is-invalid @enderror"
                                                id="password" name="password"
                                                placeholder="Masukkan password baru">
                                        </div>
                                        @error('password')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                        <small class="text-muted">* Kosongkan jika tidak ingin mengubah password</small>
                                    </div>

                                    <!-- TOMBOL ACTION -->
                                    <div class="col-12 mt-4">
                                        <div class="d-flex gap-3 justify-content-end">
                                            <button type="submit" class="btn-modern btn-primary-modern">
                                                <i class="fas fa-save me-2"></i>Update User
                                            </button>
                                            <a href="{{ route('users.index') }}" class="btn-modern btn-secondary-modern">
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
        </div>
    </div>
    <!-- Content End -->
    {{-- end main content --}}
@endsection
