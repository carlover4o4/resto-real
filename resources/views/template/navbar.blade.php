<header class="site-nav">
    <div class="nav-inner">
        <a class="brand" href="{{ auth()->user()->role === 'admin' ? route('admin') : route('menu') }}">
            <span class="brand-mark">M</span><span>Maison Resto</span>
        </a>
        <nav class="nav-links" aria-label="Navigasi utama">
            @if (auth()->user()->role === 'admin')
                <a href="{{ route('admin') }}" class="nav-link-item {{ request()->routeIs('admin','edit','tambah') ? 'active' : '' }}"><i class="bi bi-grid"></i> Data Menu</a>
                <a href="{{ route('laporan') }}" class="nav-link-item {{ request()->routeIs('laporan') ? 'active' : '' }}"><i class="bi bi-receipt"></i> Laporan</a>
            @else
                <a href="{{ route('menu') }}" class="nav-link-item {{ request()->routeIs('menu') ? 'active' : '' }}"><i class="bi bi-grid"></i> Menu</a>
                <a href="{{ route('keranjang') }}" class="nav-link-item {{ request()->routeIs('keranjang') ? 'active' : '' }}"><i class="bi bi-bag"></i> Keranjang</a>
                <a href="{{ route('riwayat') }}" class="nav-link-item {{ request()->routeIs('riwayat') ? 'active' : '' }}"><i class="bi bi-clock-history"></i> Riwayat</a>
            @endif
            <a href="{{ route('logout') }}" class="nav-link-item nav-logout"><i class="bi bi-box-arrow-right"></i> Keluar</a>
        </nav>
    </div>
</header>