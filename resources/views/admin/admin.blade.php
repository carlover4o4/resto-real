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
        <a href="{{ route('tambah') }}" class="btn btn-success">Tambah</a>
        <table id="table">
            <thead>
                <th class="text-center">Nomor</th>
                <th class="text-center">Foto</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Aksi</th>
            </thead>
            <tbody>
                @foreach ($menu as $m)
                <tr> 
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center"><img src="{{ asset('storage/'.$m->foto) }}" style="height: 100px"></td>
                    <td class="text-center">{{ $m->name }}</td>
                    <td class="text-center">Rp {{ number_format($m->harga) }}</td>
                    <td class="text-center">
                        <a href="{{ route('edit',$m->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('hapus',$m->id) }}" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
<script>new DataTable('#table')</script>
</body>
</html>