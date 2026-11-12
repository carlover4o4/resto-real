<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/resto-theme.css') }}">
    <title>Keranjang Belanja</title>
    </head>
<body class="bg-light">

    @include('template.navbar')

    <div class="container py-4">
        <h2 class="mb-4 fw-bold">Keranjang Belanja</h2>
        <div class="row">
            <div class="col-md-8">
                    @include('template.cardkeranjang')
            </div>

            <div class="col-md-4">
                @include('template.cardpembayaran')
            </div>
        </div>
    </div>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>