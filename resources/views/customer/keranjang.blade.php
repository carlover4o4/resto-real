<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/resto-theme.css') }}">
    <title>Keranjang Belanja | Aliya's Delish App</title>
</head>
<body>
    @include('template.navbar')

    <main class="container">
        <div class="mb-4">
            <p class="text-uppercase small fw-bold mb-2" style="letter-spacing: .12em; color: var(--sangria, #8b2635);">
                Your order
            </p>
            <h1 class="fw-bold mb-2">Keranjang Belanja</h1>
            <p class="text-muted mb-0">Periksa kembali pesananmu sebelum melanjutkan pembayaran.</p>
        </div>

        <div class="row g-4 align-items-start">
            <section class="col-lg-8" aria-label="Daftar pesanan">
                @include('template.cardkeranjang')
            </section>

            <aside class="col-lg-4" aria-label="Ringkasan pembayaran">
                @include('template.cardpembayaran')
            </aside>
        </div>
    </main>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
