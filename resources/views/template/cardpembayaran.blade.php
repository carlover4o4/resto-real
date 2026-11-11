<section class="panel">
    <div class="eyebrow">Order summary</div>
    <h2 class="h5 fw-bold mb-4">Ringkasan Pesanan</h2>
    <div class="d-flex justify-content-between align-items-center mb-3"><span class="text-muted">Total pembayaran</span></div>
    <div class="summary-total mb-3">Rp {{ number_format($totalharga ?? 0, 0, ',', '.') }}</div>
    <hr style="border-color:var(--line);opacity:1">
    @if (($detailtransaksi ?? collect())->isNotEmpty())
        <form action="{{ route('postbayar') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3"><label class="form-label" for="bukti">Unggah bukti pembayaran</label><input id="bukti" type="file" name="bukti_pembayaran" class="form-control" accept="image/*" required><div class="form-text">Format gambar, misalnya JPG atau PNG.</div></div>
            <button type="submit" class="btn btn-sangria w-100"><i class="bi bi-shield-check"></i> Konfirmasi Pembayaran</button>
        </form>
    @else
        <a href="{{ route('menu') }}" class="btn btn-soft w-100">Kembali ke Menu</a>
    @endif
</section>