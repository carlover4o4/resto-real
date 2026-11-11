<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Riwayat Transaksi</title>
</head>
<body>
    @include('template.navbar')
    <div class="container mt-5">
        <h4>Riwayat Transaksi</h4>
        @forelse ($transaksi as $item)
            <div class="card mb-3 shadow-sm">
                <div class="card-body">

                    <div class="d-flex justify-content-between mb-3">
                        <h6 class="fw-bold">{{ $item->invoice }}</h6>
                        @if ($item->pembayaran =='belumbayar')
                            <p class="badge bg-warning text-dark">Belum Bayar</p>
                        @else
                            <p class="badge bg-success text-dark">Lunas</p>
                        @endif
                    </div>
                    <hr>
                    @foreach ($item->detailtransaksi as $d)
                        <div class="d-flex justify-content-between mb-2">
                            <p class="mb-0">{{ $d->qty }}x {{ $d->menu->name }}</p>
                            <p class="mb-0 fw-bold">Rp {{ number_format($d->totalharga, 0, ',', '.') }}</p>
                        </div>
                    @endforeach
                    <hr>
                    <div class="d-flex justify-content-between">
                        <p class="fw-bold">Total Pembayaran</p>
                        <p class="fw-bold text-warning">Rp {{ number_format($item->totalharga, 0, ',', '.') }}</p>
                    </div>

                </div>
            </div>
        @empty
            <div class="alert alert-info">
                Belum ada riwayat transaksi.
            </div>
        @endforelse

    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
```