@if ($detailtransaksi->isEmpty())
    <div class="panel empty-state"><div class="empty-icon">🛍️</div><h3>Keranjang masih kosong</h3><p>Yuk, pilih hidangan favoritmu terlebih dahulu.</p><a href="{{ route('menu') }}" class="btn btn-sangria mt-2">Jelajahi Menu</a></div>
@else
    <section class="panel">
        <h2 class="h5 fw-bold mb-3">Pesanan kamu <span class="text-muted">({{ $detailtransaksi->count() }})</span></h2>
        @foreach($detailtransaksi as $item)
            <div class="cart-row">
                <img class="cart-photo" src="{{ asset('storage/'.($item->menu->foto ?? '')) }}" alt="{{ $item->menu->name ?? 'Menu' }}">
                <div class="flex-grow-1">
                    <h3 class="h6 fw-bold mb-1">{{ $item->menu->name ?? 'Menu Tidak Ditemukan' }}</h3>
                    <div class="small text-muted">{{ $item->qty }} item</div>
                    <div class="fw-bold mt-1" style="color:var(--sangria)">Rp {{ number_format($item->totalharga, 0, ',', '.') }}</div>
                </div>
            </div>
        @endforeach
    </section>
@endif