@extends('layouts.guest.app')

@section('content')
    @include('layouts.guest.navbar')

    <div class="container-fluid content-section">
        <div class="container py-5">

            <!-- Page Header -->
            <div class="page-header-modern text-center mb-5">
                <div class="header-icon">
                    <i class="fas fa-user-edit"></i>
                </div>
                <h5 class="text-primary fw-bold text-uppercase mb-2">Edit User</h5>
                <h1 class="display-4 fw-bold mb-3">Perbarui Data User</h1>
                <p class="text-muted fs-5 mb-0">Update informasi user dengan data terbaru</p>
            </div>

            <!-- Action Bar -->
            <div class="action-bar mb-4">
                <div class="action-left">
                    <h4 class="mb-0 fw-bold text-dark">
                        <i class="fas fa-user-edit me-2 text-primary"></i>
                        Edit Data User
                    </h4>
                    <p class="text-muted mb-0 mt-1">Perbarui informasi user {{ $editData->name }}</p>
                </div>
                <div class="action-right">
                    <a href="{{ route('users.index') }}" class="btn-modern btn-secondary-modern">
                        <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar
                    </a>
                </div>
            </div>

            <!-- Error Alert -->
            @if ($errors->any())
                <div class="alert alert-modern alert-danger alert-dismissible fade show mb-4">
                    <div class="alert-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="alert-content">
                        <strong>Terjadi Kesalahan!</strong>
                        <ul class="mt-2 mb-0">
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
                            <form action="{{ route('users.update', $editData->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row g-4">

                                    <!-- NAMA -->
                                    <div class="col-12">
                                        <label class="form-label-modern">Nama User <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group-modern">
                                            <span class="input-icon"><i class="fas fa-user"></i></span>
                                            <input type="text" name="name" value="{{ old('name', $editData->name) }}"
                                                class="form-control-modern" required>
                                        </div>
                                    </div>

                                    <!-- EMAIL -->
                                    <div class="col-md-6">
                                        <label class="form-label-modern">Email <span class="text-danger">*</span></label>
                                        <div class="input-group-modern">
                                            <span class="input-icon"><i class="fas fa-envelope"></i></span>
                                            <input type="email" name="email"
                                                value="{{ old('email', $editData->email) }}" class="form-control-modern"
                                                required>
                                        </div>
                                    </div>

                                    <!-- ROLE -->
                                    <div class="col-md-6">
                                        <label class="form-label-modern">Role <span class="text-danger">*</span></label>
                                        <div class="input-group-modern">
                                            <span class="input-icon"><i class="fas fa-user-tag"></i></span>
                                            <select name="role" class="form-control-modern" required>
                                                <option value="">-- Pilih Role --</option>
                                                <option value="admin"
                                                    {{ old('role', $editData->role) == 'admin' ? 'selected' : '' }}>Admin
                                                </option>
                                                <option value="editor"
                                                    {{ old('role', $editData->role) == 'editor' ? 'selected' : '' }}>Editor
                                                </option>
                                                <option value="user"
                                                    {{ old('role', $editData->role) == 'user' ? 'selected' : '' }}>User
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- PASSWORD BARU -->
                                    <div class="col-md-6">
                                        <label class="form-label-modern">Password Baru</label>
                                        <div class="input-group-modern">
                                            <span class="input-icon"><i class="fas fa-lock"></i></span>
                                            <input type="password" name="password" class="form-control-modern">
                                        </div>
                                        <small class="text-muted">Kosongkan jika tidak ingin mengubah password</small>
                                    </div>

                                    <!-- FOTO -->
                                    <div class="col-12">
                                        <label class="form-label-modern">Foto User</label>
                                        <div class="input-group-modern">
                                            <span class="input-icon"><i class="fas fa-image"></i></span>
                                            <input type="file" class="form-control-modern" name="foto"
                                                accept="image/*">
                                        </div>
                                        @if ($editData->media && $editData->media->first())
                                            <div class="mt-2">
                                                <img src="{{ asset('storage/' . $editData->media->first()->file_name) }}"
                                                    alt="Foto Lama"
                                                    style="width: 70px; height: 70px; object-fit: cover; border-radius: 50%;">
                                                <p class="text-muted small">Foto saat ini</p>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- ACTION BUTTON -->
                                    <div class="col-12 mt-4 d-flex gap-3 justify-content-end">
                                        <button type="submit" class="btn-modern btn-primary-modern">
                                            <i class="fas fa-save me-2"></i>Update User
                                        </button>
                                        <a href="{{ route('users.index') }}" class="btn-modern btn-secondary-modern">
                                            <i class="fas fa-times me-2"></i>Batal
                                        </a>
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
