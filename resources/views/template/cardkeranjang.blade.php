@if ($detailtransaksi->isEmpty())
    <div class="panel empty-state">
        <div class="empty-icon">🛍️</div>
        <h3>Keranjang masih kosong</h3>
        <p>Yuk, pilih hidangan favoritmu terlebih dahulu.</p>
        <a href="{{ route('menu') }}" class="btn btn-sangria mt-2">Jelajahi Menu</a>
    </div>
@else
    <section class="panel">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h2 class="h5 fw-bold mb-0">Pesanan kamu</h2>
            <span class="badge rounded-pill text-bg-light">{{ $detailtransaksi->count() }} item</span>
        </div>

        <div class="d-flex flex-column gap-2">
            @foreach($detailtransaksi as $item)
                <article class="card border-0 bg-white">
                    <div class="card-body p-2 p-sm-3">
                        <div class="d-flex align-items-center gap-3">
                            <img
                                src="{{ asset('storage/'.($item->menu->foto ?? '')) }}"
                                alt="{{ $item->menu->name ?? 'Menu' }}"
                                class="rounded-3 flex-shrink-0"
                                style="width: 68px; height: 68px; object-fit: cover;"
                            >

                            <div class="flex-grow-1 min-width-0">
                                <h3 class="h6 fw-bold mb-1">{{ $item->menu->name ?? 'Menu Tidak Ditemukan' }}</h3>
                                <div class="small text-muted">{{ $item->qty }} item</div>
                                <div class="fw-bold mt-1" style="color: var(--sangria, #8b2635);">
                                    Rp {{ number_format($item->totalharga, 0, ',', '.') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
@endif