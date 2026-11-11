@extends('template.layout')
@section('title', 'Login')
@section('content')
<div class="auth-shell">
    <section class="auth-card">
        <div class="auth-brand"><a class="brand" href="{{ route('login') }}"><span class="brand-mark">M</span><span>Maison Resto</span></a><p class="text-muted mt-3 mb-0">Selamat datang kembali. Silakan masuk.</p></div>
        <form action="{{ route('postlogin') }}" method="POST">
            @csrf
            <div class="mb-3"><label class="form-label">Email</label><input type="email" name="email" class="form-control" value="{{ old('email') }}" autocomplete="email" required></div>
            <div class="mb-4"><label class="form-label">Password</label><input type="password" name="password" class="form-control" autocomplete="current-password" required></div>
            <button type="submit" class="btn btn-sangria w-100">Masuk</button>
        </form>
        <p class="text-center text-muted small mt-4 mb-0">Belum punya akun? <a href="{{ route('register') }}" class="fw-bold">Daftar sekarang</a></p>
    </section>
</div>
@endsection