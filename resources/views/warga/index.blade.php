@extends('guest')

@section('title', 'Data Warga')
@section('page-title', 'Data Warga')

@section('content')
    <!-- ===== ALERT NOTIFICATION ===== -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-triangle me-2"></i>
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <!-- ===== FORM INPUT DATA ===== -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        <i class="fas {{ isset($editData) ? 'fa-edit' : 'fa-user-plus' }} me-2"></i>
                        {{ isset($editData) ? 'Edit Data Warga' : 'Tambah Data Warga' }}
                    </h4>
                </div>
                <div class="card-body">
                    @if(isset($editData))
                    <form method="POST" action="{{ route('warga.update', $editData->warga_id) }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $editData->warga_id }}">
                    @else
                    <form method="POST" action="{{ route('warga.store') }}">
                        @csrf
                    @endif

                        <!-- Input Nama Depan -->
                        <div class="form-group mb-3">
                            <label for="nama_depan" class="form-label">Nama Depan *</label>
                            <input type="text" name="nama_depan" class="form-control @error('nama_depan') is-invalid @enderror"
                                   value="{{ old('nama_depan', $editData->nama_depan ?? '') }}"
                                   placeholder="Masukkan nama depan" required>
                            @error('nama_depan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Input Nama Belakang -->
                        <div class="form-group mb-3">
                            <label for="nama_belakang" class="form-label">Nama Belakang *</label>
                            <input type="text" name="nama_belakang" class="form-control @error('nama_belakang') is-invalid @enderror"
                                   value="{{ old('nama_belakang', $editData->nama_belakang ?? '') }}"
                                   placeholder="Masukkan nama belakang" required>
                            @error('nama_belakang')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Input Tanggal Lahir -->
                        <div class="form-group mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir *</label>
                            <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                   value="{{ old('tanggal_lahir', $editData->tanggal_lahir ?? '') }}" required>
                            @error('tanggal_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Input Jenis Kelamin -->
                        <div class="form-group mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin *</label>
                            <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki" {{ old('jenis_kelamin', $editData->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki
                                </option>
                                <option value="Perempuan" {{ old('jenis_kelamin', $editData->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan
                                </option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Input Email -->
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email', $editData->email ?? '') }}"
                                   placeholder="contoh@email.com" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Input No Telepon -->
                        <div class="form-group mb-4">
                            <label for="no_telepon" class="form-label">No Telepon *</label>
                            <input type="number" name="no_telepon" class="form-control @error('no_telepon') is-invalid @enderror"
                                   value="{{ old('no_telepon', $editData->no_telepon ?? '') }}"
                                   placeholder="08123456789" required>
                            @error('no_telepon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tombol Action -->
                        <div class="form-group d-grid gap-2">
                            @if(isset($editData))
                                <!-- Tombol Update -->
                                <button type="submit" class="btn btn-warning">
                                    <i class="fas fa-save me-1"></i>Update Data
                                </button>
                                <!-- Tombol Batal -->
                                <a href="{{ route('warga.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-times me-1"></i>Batal Edit
                                </a>
                            @else
                                <!-- Tombol Simpan -->
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-1"></i>Simpan Data
                                </button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ===== TABEL DATA WARGA ===== -->
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><i class="fas fa-users me-2"></i>Daftar Warga</h4>
                    <span class="badge bg-light text-primary fs-6">{{ $dataWarga->count() }} Data</span>
                </div>
                <div class="card-body">
                    @if($dataWarga->count() > 0)
                        <!-- Jika ada data -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Email</th>
                                        <th>No Telepon</th>
                                        <th width="120">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dataWarga as $index => $warga)
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td>{{ $warga->nama_depan }} {{ $warga->nama_belakang }}</td>
                                            <td>{{ \Carbon\Carbon::parse($warga->tanggal_lahir)->format('d/m/Y') }}</td>
                                            <td>
                                                <span class="badge {{ $warga->jenis_kelamin == 'Laki-laki' ? 'bg-primary' : 'bg-success' }}">
                                                    {{ $warga->jenis_kelamin }}
                                                </span>
                                            </td>
                                            <td>{{ $warga->email }}</td>
                                            <td>{{ $warga->no_telepon }}</td>
                                            <td class="table-actions">
                                                <div class="btn-group btn-group-sm" role="group">
                                                    <!-- Tombol Edit -->
                                                    <a href="{{ route('warga.edit', $warga->warga_id) }}"
                                                       class="btn btn-warning" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <!-- Tombol Hapus -->
                                                    <form method="POST" action="{{ route('warga.destroy', $warga->warga_id) }}" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                                onclick="return confirm('Yakin ingin menghapus data {{ $warga->nama_depan }}?')"
                                                                title="Hapus">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <!-- Jika tidak ada data -->
                        <div class="text-center py-4">
                            <i class="fas fa-users fa-3x text-muted mb-3"></i>
                            <p class="text-muted mb-0">Belum ada data warga</p>
                            <p class="text-muted">Silahkan tambah data warga menggunakan form di samping</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
