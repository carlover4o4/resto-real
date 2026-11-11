@extends('template.layout')
@section('title', 'Register')
@section('content')
<div class="auth-shell">
    <section class="auth-card">
        <div class="auth-brand"><a class="brand" href="{{ route('register') }}"><span class="brand-mark">M</span><span>Maison Resto</span></a><p class="text-muted mt-3 mb-0">Buat akun untuk mulai memesan.</p></div>
        <form action="{{ route('postregister') }}" method="POST">
            @csrf
            <div class="mb-3"><label class="form-label">Nama</label><input type="text" name="name" class="form-control" value="{{ old('name') }}" autocomplete="name" required></div>
            <div class="mb-3"><label class="form-label">Email</label><input type="email" name="email" class="form-control" value="{{ old('email') }}" autocomplete="email" required></div>
            <div class="mb-4"><label class="form-label">Password</label><input type="password" name="password" class="form-control" autocomplete="new-password" required></div>
            <button type="submit" class="btn btn-sangria w-100">Buat Akun</button>
        </form>
        <p class="text-center text-muted small mt-4 mb-0">Sudah punya akun? <a href="{{ route('login') }}" class="fw-bold">Masuk</a></p>
    </section>
</div>
@endsection