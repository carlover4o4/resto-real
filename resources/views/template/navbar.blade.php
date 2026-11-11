<header class="resto-navbar">
    <div class="container resto-nav-inner">
        <a class="resto-brand" href="{{ auth()->user()->role == 'admin' ? route('admin') : route('menu') }}">
            <span class="resto-brand-mark">R</span>
            <span>Resto</span>
        </a>

        <nav class="resto-nav-links" aria-label="Navigasi utama">
            @if (auth()->user()->role == 'admin')
                <a href="{{ route('admin') }}" class="resto-nav-link {{ request()->routeIs('admin','edit','tambah') ? 'active' : '' }}">Data Menu</a>
                <a href="{{ route('laporan') }}" class="resto-nav-link {{ request()->routeIs('laporan') ? 'active' : '' }}">Laporan</a>
            @else
                <a href="{{ route('menu') }}" class="resto-nav-link {{ request()->routeIs('menu') ? 'active' : '' }}">Menu</a>
                <a href="{{ route('keranjang') }}" class="resto-nav-link {{ request()->routeIs('keranjang') ? 'active' : '' }}">Keranjang</a>
                <a href="{{ route('riwayat') }}" class="resto-nav-link {{ request()->routeIs('riwayat') ? 'active' : '' }}">Riwayat Transaksi</a>
            @endif
            <a href="{{ route('logout') }}" class="resto-nav-link resto-logout">Logout</a>
        </nav>
    </div>
</header>