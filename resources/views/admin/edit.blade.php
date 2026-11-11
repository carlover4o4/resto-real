@extends('template.layout')
@section('title', 'Edit Menu')
@section('content')
<div class="page-wrap">
    <div class="page-heading"><div><div class="eyebrow">Menu management</div><h1 class="page-title">Edit Menu</h1><p class="page-subtitle">Perbarui informasi hidangan yang dipilih.</p></div></div>
    <div class="panel" style="max-width:720px">
        <form action="{{ route('postedit',$menu->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3"><label class="form-label">Nama Menu</label><input type="text" name="name" class="form-control" value="{{ old('name',$menu->name) }}" required></div>
            <div class="mb-3"><label class="form-label">Harga (Rp)</label><input type="number" name="harga" class="form-control" min="0" value="{{ old('harga',$menu->harga) }}" required></div>
            <div class="mb-3"><label class="form-label">Foto Saat Ini</label><div class="mb-2"><img src="{{ asset('storage/'.$menu->foto) }}" alt="{{ $menu->name }}" style="width:130px;height:100px;object-fit:cover;border-radius:12px"></div><input type="file" accept="image/*" name="foto" class="form-control" required><div class="form-text">Controller saat ini mewajibkan unggah foto baru saat menyimpan edit.</div></div>
            <div class="mb-4"><label class="form-label">Kategori</label><select name="kategori_id" class="form-select" required>@foreach ($kategori as $k)<option value="{{ $k->id }}" {{ $menu->kategori_id == $k->id ? 'selected' : '' }}>{{ $k->name }}</option>@endforeach</select></div>
            <div class="d-flex gap-2"><button class="btn btn-sangria" type="submit">Simpan Perubahan</button><a href="{{ route('admin') }}" class="btn btn-soft">Batalkan</a></div>
        </form>
    </div>
</div>
@endsection