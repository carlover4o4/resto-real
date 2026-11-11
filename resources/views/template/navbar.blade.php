<nav class="nav bg-dark">
    @if (auth()->user()->role == 'admin')
        <a href="{{ route('admin') }}" class="nav-link text-center">Data</a>
        <a href="{{ route('laporan') }}" class="nav-link text-center">Laporan</a>
    @else
        <a href="{{ route('menu') }}" class="nav-link text-center">Menu</a>
        <a href="{{ route('keranjang') }}" class="nav-link text-center">Keranjang</a>
        <a href="{{ route('riwayat') }}" class="nav-link text-center">Riwayat Transaksi</a>
    @endif
        <a href="{{ route('logout') }}" class="nav-link text-center">Logout</a>

</nav>