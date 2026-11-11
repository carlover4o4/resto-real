@foreach($detailtransaksi as $item)
    <div class="card mb-3 shadow-sm p-3">
        <div class="row align-items-center">
            <div class="col-md-3 text-center">
                <img src="{{ asset('storage/' . ($item->menu->foto ?? '')) }}" style="max-height: 100px; object-fit: cover;">
            </div>
            <div class="col-md-9">
                <div class="card-body">
                    <h5 class="card-title fw-bold ">{{ $item->menu->name ?? 'Menu Tidak Ditemukan' }}</h5>
                    <p class="text-muted small">Jumlah: {{ $item->qty }} | Subtotal: Rp {{ number_format($item->totalharga, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach