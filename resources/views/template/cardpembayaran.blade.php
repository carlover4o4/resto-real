<section class="card border-0">
    <div class="card-body p-3 p-sm-4">
        <div class="eyebrow mb-1">Order summary</div>
        <h2 class="h5 fw-bold mb-3">Ringkasan Pesanan</h2>

        <div class="rounded-3 p-3 mb-3" style="background: var(--resto-cream, #FFF8E7);">
            <div class="small text-muted mb-1">Total pembayaran</div>
            <div class="h4 fw-bold mb-0" style="color: var(--sangria, #8b2635);">
                Rp {{ number_format($totalharga ?? 0, 0, ',', '.') }}
            </div>
        </div>

        @if (($detailtransaksi ?? collect())->isNotEmpty())
            <form action="{{ route('postbayar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold" for="bukti">Unggah bukti pembayaran</label>
                    <input id="bukti" type="file" name="bukti_pembayaran" class="form-control" accept="image/*" required>
                    <div class="form-text">Format gambar, misalnya JPG atau PNG.</div>
                </div>
                <button type="submit" class="btn btn-sangria w-100">
                    <i class="bi bi-shield-check"></i> Konfirmasi Pembayaran
                </button>
            </form>
        @else
            <a href="{{ route('menu') }}" class="btn btn-soft w-100">Kembali ke Menu</a>
        @endif
    </div>
</section>