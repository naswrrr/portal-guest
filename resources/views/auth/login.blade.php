@extends('guest')

@section('title', 'Login')

@section('content')
<div class="container py-5" style="max-width: 550px;">
    <h3 class="text-center mb-4 text-primary">Login</h3>

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger text-center">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('auth.login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100 py-2">Login</button>
    </form>

    <div class="text-center mt-3">
        <a href="{{ route('auth.register') }}" class="btn btn-link text-decoration-none">Belum punya akun? Daftar di sini</a>
    </div>
</div>
@endsection
