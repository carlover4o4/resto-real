<nav class="navbar navbar-expand-lg navbar-light bg-light px-4 border-bottom">
    <a class="navbar-brand font-weight-bold"
        href="{{ auth()->user()->role == 'admin' ? route('admin') : route('menu') }}">
        <span class="resto-brand-mark">A</span>
        <span>Aliya's Delish App</span>
    </a>

    <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav align-items-center">
            @if (auth()->user()->role == 'admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin') }}">Menu Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('laporan') }}">Reports</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('menu') }}">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('keranjang') }}">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('riwayat') }}">Transaction History</a>
                </li>
            @endif
            <li class="nav-item ml-2">
                <a class="nav-link text-danger" href="{{ route('logout') }}">Logout</a>
            </li>
        </ul>
    </div>
</nav>
