@extends('layouts.guest.app')

@section('content')
    {{-- start main content --}}
    <!-- Navbar start -->
    <div class="container-fluid fixed-top px-0">
        <div class="container px-0">
            <div class="topbar">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8">
                        <div class="topbar-info d-flex flex-wrap">
                            <a href="#" class="text-light me-4"><i
                                    class="fas fa-envelope text-white me-2"></i>BinaDesa@gmail.com</a>
                            <a href="#" class="text-light"><i
                                    class="fas fa-phone-alt text-white me-2"></i>+01234567890</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="topbar-icon d-flex align-items-center justify-content-end">
                            <a href="#" class="btn-square text-white me-2"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="btn-square text-white me-2"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="btn-square text-white me-2"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-light bg-light navbar-expand-xl">
                <a href="{{ url('/') }}" class="navbar-brand ms-3">
                    <h1 class="text-primary display-5">Portal Bina Desa</h1>
                </a>
                <button class="navbar-toggler py-2 px-3 me-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-light" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
                        <a href="{{ route('warga.index') }}" class="nav-item nav-link active">Data Warga</a>
                        <a href="{{ route('kategori_berita.index') }}" class="nav-item nav-link">Kategori Berita</a>
                        <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    {{-- navbar end --}}

    <!-- Content Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">

            <!-- Page Header Start -->
            <div class="container-fluid page-header py-5 mb-5">
                <div class="container py-5">
                    <div class="text-center mx-auto pb-5" style="max-width: 800px;">
                        <h5 class="text-uppercase text-primary">Data Warga</h5>
                        <h1 class="mb-4">Kelola Data Warga Desa</h1>
                        <p class="mb-0">Kelola informasi data warga desa dengan mudah dan efisien</p>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->

            <!-- Notifikasi -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Form Edit (Muncul saat edit) -->
            @if (isset($editData))
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="card border-warning shadow">
                            <div class="card-header bg-warning text-dark py-3">
                                <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Edit Data Warga</h5>
                            </div>
                            <div class="card-body p-4">
                                <form action="{{ route('warga.update', $editData->warga_id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <label for="nama" class="form-label fw-bold">Nama Lengkap</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-primary text-white">
                                                    <i class="fas fa-user"></i>
                                                </span>
                                                <input type="text" class="form-control" id="nama" name="nama"
                                                    value="{{ old('nama', $editData->nama) }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="nik" class="form-label fw-bold">NIK</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-primary text-white">
                                                    <i class="fas fa-id-card"></i>
                                                </span>
                                                <input type="text" class="form-control" id="nik"
                                                    name="nik" value="{{ old('nik', $editData->nik) }}"
                                                    maxlength="16" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="no_kk" class="form-label fw-bold">No. KK</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-primary text-white">
                                                    <i class="fas fa-house-user"></i>
                                                </span>
                                                <input type="text" class="form-control" id="no_kk"
                                                    name="no_kk" value="{{ old('no_kk', $editData->no_kk) }}"
                                                    maxlength="16" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="jenis_kelamin" class="form-label fw-bold">Jenis
                                                Kelamin</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-primary text-white">
                                                    <i class="fas fa-venus-mars"></i>
                                                </span>
                                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin"
                                                    required>
                                                    <option value="">Pilih Jenis Kelamin</option>
                                                    <option value="Laki-laki"
                                                        {{ old('jenis_kelamin', $editData->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                                                        Laki-laki</option>
                                                    <option value="Perempuan"
                                                        {{ old('jenis_kelamin', $editData->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                                        Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <label for="alamat" class="form-label fw-bold">Alamat</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-primary text-white align-items-start">
                                                    <i class="fas fa-map-marker-alt mt-2"></i>
                                                </span>
                                                <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ old('alamat', $editData->alamat) }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit"
                                                class="btn-hover-bg btn btn-primary text-white py-2 px-4">
                                                <i class="fas fa-save me-2"></i>Update Data
                                            </button>
                                            <a href="{{ route('warga.index') }}"
                                                class="btn-hover-bg btn btn-secondary text-white py-2 px-4">
                                                <i class="fas fa-times me-2"></i>Batal
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Card Utama -->
            <div class="card border-0 shadow">
                <div class="card-header bg-primary text-white py-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0"><i class="fas fa-users me-2"></i>Daftar Warga</h4>
                        <a href="{{ route('warga.create') }}"
                            class="btn-hover-bg btn btn-light text-primary py-2 px-4">
                            <i class="fas fa-plus me-2"></i>Tambah Warga
                        </a>
                    </div>
                </div>
                <div class="card-body p-4">
                    <!-- Tabel -->
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th class="text-center" style="width: 60px;">No</th>
                                    <th>Nama Lengkap</th>
                                    <th>NIK</th>
                                    <th>No KK</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th class="text-center" style="width: 120px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($dataWarga as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                                    style="width: 40px; height: 40px;">
                                                    <i class="fas fa-user text-white"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">{{ $item->nama }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $item->nik }}</td>
                                        <td>{{ $item->no_kk }}</td>
                                        <td>
                                            <span
                                                class="badge @if ($item->jenis_kelamin == 'Laki-laki') bg-primary @else bg-success @endif">
                                                {{ $item->jenis_kelamin }}
                                            </span>
                                        </td>
                                        <td>{{ Str::limit($item->alamat, 50) }}</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('warga.edit', $item->warga_id) }}"
                                                    class="btn-hover-bg btn btn-warning btn-sm text-white"
                                                    title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('warga.destroy', $item->warga_id) }}"
                                                    method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-hover-bg btn btn-danger btn-sm"
                                                        onclick="return confirm('Yakin hapus data warga?')"
                                                        title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted py-4">
                                            <i class="fas fa-inbox fa-2x mb-3"></i><br>
                                            Belum ada data warga
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content End -->
    {{-- end main content --}}
@endsection
