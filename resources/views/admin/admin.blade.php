@extends('template.layout')
@section('title', 'Data Menu')
@section('content')
<div class="page-wrap">
    <div class="page-heading">
        <div><div class="eyebrow">Restaurant management</div><h1 class="page-title">Kelola Menu</h1><p class="page-subtitle">Atur daftar hidangan dan harga yang tersedia.</p></div>
        <a href="{{ route('tambah') }}" class="btn btn-sangria"><i class="bi bi-plus-lg"></i> Tambah Menu</a>
    </div>
    <div class="table-wrap">
        <table class="table">
            <thead><tr><th class="text-center">No.</th><th>Foto</th><th>Nama Menu</th><th>Harga</th><th>Kategori</th><th class="text-end">Aksi</th></tr></thead>
            <tbody>
            @forelse ($menu as $m)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td><img class="table-photo" src="{{ asset('storage/'.$m->foto) }}" alt="{{ $m->name }}"></td>
                    <td class="fw-bold">{{ $m->name }}</td><td>Rp {{ number_format($m->harga,0,',','.') }}</td><td>{{ $m->kategori->name ?? '—' }}</td>
                    <td class="text-end text-nowrap"><a href="{{ route('edit',$m->id) }}" class="btn btn-soft btn-sm">Edit</a><a href="{{ route('hapus',$m->id) }}" class="btn btn-outline-danger btn-sm ms-1" onclick="return confirm('Hapus menu ini?')">Hapus</a></td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center py-5 text-muted">Belum ada menu. Tambahkan menu pertama kamu.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection