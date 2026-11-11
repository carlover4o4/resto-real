<div class="card shadow-sm p-4">
    <h4 class="fw-bold mb-3">Ringkasan Pesanan</h4>
    <div class="d-flex justify-content-between ">
        <p>Total Pembayaran</p>
        <h3 class="text-warning fw-bold">Rp {{ number_format($totalharga ?? 0, 0, ',', '.') }}</h3>
    </div>
    <hr>
    <form action="{{ route('postbayar') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Bukti Pembayaran</label>
            <input type="file" name="bukti_pembayaran" class="form-control" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-success w-100">Lanjut ke Pembayaran</button>
    </form>
</div>