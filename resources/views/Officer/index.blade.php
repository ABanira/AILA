<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Officer</title>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>You are a User :   {{ session('status') }}</h2>
                    <div class="user-info">
                        <p>Halo, {{ auth()->user()->name ?? 'Tamu' }}</p>
                        <p>NIPP : {{ auth()->user()->nipp ?? 'Tamu' }}</p>
                        <p>Role : {{ auth()->user()->role ?? 'Tidak diketahui' }}</p>
                    </div>
                    <a href="/logout">logout</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>