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
    @include('template.navbar')
    <div class="container">
        <h1 class="text-center" style="font-weight: bold; font-style: italic;">Our Menu</h1>
        <div class="row">
            @foreach ($menu as $m)
                <div class="col-3">
                    <div class="card p-3 mt-5 shadow">
                        <img src="{{ asset('storage/'.$m->foto) }}" style="height: 300px" class="card-img-top">
                        <div class="card-body">
                            <h4 class="card-title">{{ $m->name }}</h4>
                            <small class="card-text">{{ number_format($m->harga) }}</small>
                            <form action="{{ route('postkeranjang',$m->id) }}" method="POST">
                                @csrf
                                <div class="row g-2 align-items-end ">
                                    <div class="col-4">
                                        <label>Quantity</label>
                                        <input type="number" class="form-control" name="qty" min="1" required>
                                    </div>
                                    <div class="col-8">
                                        <button type="submit" class="btn btn-success w-100 grow">Tambah</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>