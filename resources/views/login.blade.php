<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Document</title>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow" style="width: 350px">
            <form action="{{ route('postlogin') }}" method="POST">
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="mb-3 d-grid">
                    <button type="submit" class="btn btn-primary">Login</button>
                    <small>Sudah Punya Akun?<a href="{{ route('register') }}">Register</a></small>
                </div>
            </form>
        </div>
    </div>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>