@extends('template.layout')
@section('title', 'Menu')
@section('content')
<div class="page-wrap">
    <div class="page-heading">
        <div><div class="eyebrow">Fresh from our kitchen</div><h1 class="page-title">Temukan Menu Favoritmu</h1><p class="page-subtitle">Pilihan hidangan lezat untuk menemani harimu.</p></div>
    </div>
    @if ($menu->isEmpty())
        <div class="panel empty-state"><div class="empty-icon">🍽️</div><h3>Menu belum tersedia</h3><p>Silakan kembali lagi nanti.</p></div>
    @else
        <div class="menu-grid">
            @foreach ($menu as $m)
                <article class="menu-card">
                    <img class="menu-photo" src="{{ asset('storage/'.$m->foto) }}" alt="{{ $m->name }}">
                    <div class="menu-card-body">
                        <span class="menu-category">{{ $m->kategori->name ?? 'Pilihan Chef' }}</span>
                        <h2 class="menu-name">{{ $m->name }}</h2>
                        <div class="menu-price">Rp {{ number_format($m->harga, 0, ',', '.') }}</div>
                        <form action="{{ route('postkeranjang',$m->id) }}" method="POST">
                            @csrf
                            <label class="form-label" for="qty-{{ $m->id }}">Jumlah pesanan</label>
                            <div class="d-flex gap-2">
                                <input id="qty-{{ $m->id }}" type="number" class="form-control" name="qty" min="1" value="1" required>
                                <button type="submit" class="btn btn-sangria text-nowrap"><i class="bi bi-plus-lg"></i> Tambah</button>
                            </div>
                        </form>
                    </div>
                </article>
            @endforeach
        </div>
    @endif
</div>
@endsection