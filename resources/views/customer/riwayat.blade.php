@extends('template.layout')
@section('title', 'Riwayat Transaksi')
@section('content')
<div class="page-wrap">
    <div class="page-heading"><div><div class="eyebrow">Order history</div><h1 class="page-title">Riwayat Transaksi</h1><p class="page-subtitle">Semua pesanan yang pernah kamu buat.</p></div></div>
    @forelse ($transaksi as $item)
        <article class="panel mb-3">
            <div class="d-flex justify-content-between align-items-start gap-3 flex-wrap mb-3">
                <div><div class="small text-muted mb-1">Nomor invoice</div><h2 class="h6 fw-bold mb-0">{{ $item->invoice }}</h2></div>
                @if ($item->pembayaran == 'belumbayar')<span class="status-pill status-pending">Belum Bayar</span>@else<span class="status-pill status-paid">Lunas</span>@endif
            </div>
            <hr style="border-color:var(--line);opacity:1">
            @foreach ($item->detailtransaksi as $d)
                <div class="d-flex justify-content-between gap-3 mb-2"><span>{{ $d->qty }} × {{ $d->menu->name ?? 'Menu dihapus' }}</span><strong>Rp {{ number_format($d->totalharga, 0, ',', '.') }}</strong></div>
            @endforeach
            <hr style="border-color:var(--line);opacity:1">
            <div class="d-flex justify-content-between align-items-center"><strong>Total Pembayaran</strong><strong class="summary-total" style="font-size:1.3rem">Rp {{ number_format($item->totalharga, 0, ',', '.') }}</strong></div>
        </article>
    @empty
        <div class="panel empty-state"><div class="empty-icon">🧾</div><h3>Belum ada transaksi</h3><p>Pesanan yang kamu buat akan muncul di sini.</p><a href="{{ route('menu') }}" class="btn btn-sangria mt-2">Lihat Menu</a></div>
    @endforelse
</div>
@endsection