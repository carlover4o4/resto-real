<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/resto-theme.css') }}">
    <title>Document</title>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow" style="width: 350px">
            <form action="{{ route('posttambah') }}" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" name="harga" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Foto</label>
                    <input type="file" accept="image/*" name="foto" class="form-control">
                </div>
                <div class="mb-3">
                    <select name="kategori_id">
                        @foreach ($kategori as $k)
                            <option value="{{ $k->id }}">{{ $k->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 d-flex justify-content-between">
                    <button class="btn btn-primary" type="submit">Tambah</button>
                    <a href="{{ route('admin') }}">Batalkan</a>
                </div>
            </form>
        </div>
    </div>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>

