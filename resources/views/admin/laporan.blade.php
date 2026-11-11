@extends('template.layout')
@section('title', 'Laporan Transaksi')
@section('content')
<div class="page-wrap">
    <div class="page-heading"><div><div class="eyebrow">Restaurant management</div><h1 class="page-title">Laporan Transaksi</h1><p class="page-subtitle">Pantau pembayaran dan pesanan pelanggan.</p></div></div>
    <div class="table-wrap">
        <table class="table">
            <thead><tr><th>No.</th><th>Pelanggan</th><th>Bukti Pembayaran</th><th>Total</th><th>Status</th><th class="text-end">Aksi</th></tr></thead>
            <tbody>
            @forelse ($transaksi as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td><td class="fw-bold">{{ $d->user->name }}</td>
                    <td><a href="{{ asset('storage/'.$d->bukti_pembayaran) }}" target="_blank" rel="noopener"><img class="table-photo" src="{{ asset('storage/'.$d->bukti_pembayaran) }}" alt="Bukti pembayaran"></a></td>
                    <td class="fw-bold">Rp {{ number_format($d->totalharga,0,',','.') }}</td>
                    <td>@if ($d->pembayaran == 'lunas')<span class="status-pill status-paid">Lunas</span>@else<span class="status-pill status-pending">Belum Bayar</span>@endif</td>
                    <td class="text-end">@if ($d->pembayaran !== 'lunas')<a href="{{ route('lunas',$d->id) }}" class="btn btn-sangria btn-sm" onclick="return confirm('Tandai transaksi ini sebagai lunas?')">Tandai Lunas</a>@else<span class="text-muted small">Selesai</span>@endif</td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center py-5 text-muted">Belum ada transaksi.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection