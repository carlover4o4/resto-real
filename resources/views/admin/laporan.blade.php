<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/dataTables.dataTables.min.css') }}">
    <script src="https://cdn.datatables.net/3.1.5/js/dataTables.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/resto-theme.css') }}">
    <title>Document</title>
</head>
<body>
    @include('template.navbar')
    <div class="container mt-5">
        <table id="table">
            <thead>
                <th class="text-center">Nomor</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Bukti Transaksi</th>
                <th class="text-center">Total Harga</th>
                <th class="text-center">Pembayaran</th>
                <th class="text-center">Aksi</th>
            </thead>
            <tbody>
                @foreach ($transaksi as $d)
                <tr> 
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $d->user->name }}</td>
                    <td class="text-center"><img src="{{ asset('storage/'.$d->bukti_pembayaran) }}" style="height: 100px"></td>
                    <td class="text-center">Rp {{ number_format($d->totalharga) }}</td>
                    <td class="text-center">
                        @if ($d->pembayaran == 'lunas')
                            <p class="badge btn-info">Lunas</p>
                        @else
                            <p class="badge btn-secondary">Belum Bayar</p>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ route('lunas',$d->id) }}" class="btn btn-primary">Lunas</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
<script>new DataTable('#table')</script>
</body>
</html>