@extends('guest')

@section('title', 'Register')

@section('content')
<div class="container py-5" style="max-width: 550px;">
    <h3 class="text-center mb-4 text-primary">Form Registrasi</h3>

    {{-- Flash data success --}}
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    {{-- Flash data error --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- ✅ Action form ke route bernama auth.register --}}
    <form action="{{ route('auth.register') }}" method="POST">
        @csrf

        {{-- ✅ Input: Nama --}}
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
            <small class="text-muted">Tidak boleh mengandung angka</small>
        </div>

        {{-- ✅ Input: Alamat --}}
        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" rows="3" maxlength="300" required>{{ old('alamat') }}</textarea>
            <small class="text-muted">Maksimal 300 karakter</small>
        </div>

        {{-- ✅ Input: Tanggal Lahir --}}
        <div class="mb-3">
            <label class="form-label">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') }}" required>
        </div>

        {{-- ✅ Input: Username --}}
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" value="{{ old('username') }}" required>
        </div>

        {{-- ✅ Input: Password --}}
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
            <small class="text-muted">Harus mengandung huruf kapital dan angka</small>
        </div>

        {{-- ✅ Input: Confirm Password --}}
        <div class="mb-4">
            <label class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        {{-- ✅ Tombol Daftar --}}
        <button type="submit" class="btn btn-primary w-100 py-2">Daftar</button>
    </form>

    {{-- ✅ Jika tombol Registrasi di klik maka akan menuju halaman register --}}
    <div class="text-center mt-3">
        <a href="{{ route('auth.index') }}" class="btn btn-link text-decoration-none">Sudah punya akun? Login</a>
    </div>
</div>
@endsection
