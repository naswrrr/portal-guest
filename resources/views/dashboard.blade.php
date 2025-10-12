@extends('guest')

@section('title', $title ?? 'Dashboard')

@section('content')
<div class="container text-center py-5">
    <h1 class="text-success mb-4">{{ $title ?? 'Dashboard' }}</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <p>Selamat datang di halaman Dashboard Admin!</p>
</div>
@endsection
