@extends('template.layout')
@section('title', 'Tambah Menu')
@section('content')
<div class="page-wrap">
    <div class="page-heading"><div><div class="eyebrow">Menu management</div><h1 class="page-title">Tambah Menu Baru</h1><p class="page-subtitle">Masukkan detail hidangan yang ingin ditampilkan.</p></div></div>
    <div class="panel" style="max-width:720px">
        <form action="{{ route('posttambah') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3"><label class="form-label">Nama Menu</label><input type="text" name="name" class="form-control" value="{{ old('name') }}" required></div>
            <div class="mb-3"><label class="form-label">Harga (Rp)</label><input type="number" name="harga" class="form-control" min="0" value="{{ old('harga') }}" required></div>
            <div class="mb-3"><label class="form-label">Foto Menu</label><input type="file" accept="image/*" name="foto" class="form-control" required></div>
            <div class="mb-4"><label class="form-label">Kategori</label><select name="kategori_id" class="form-select" required>@foreach ($kategori as $k)<option value="{{ $k->id }}">{{ $k->name }}</option>@endforeach</select></div>
            <div class="d-flex gap-2"><button class="btn btn-sangria" type="submit">Simpan Menu</button><a href="{{ route('admin') }}" class="btn btn-soft">Batalkan</a></div>
        </form>
    </div>
</div>
@endsection