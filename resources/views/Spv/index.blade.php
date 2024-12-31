<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>{{ $title }}</title>
  <!-- MDB icon -->
  <link rel="icon" href={{asset('storage/img/logo.png') }} type="image/x-icon" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href={{asset('storage/css/bootstrap-login-form.min.css') }} />
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
 
                    <h2>You are a {{ auth()->user()->role }} User.</h2>
                    <div class="user-info">
                        <p>Halo, {{ auth()->user()->name ?? 'Tamu' }}</p>
                        <p>NIPP : {{ auth()->user()->nipp ?? 'Tamu' }}</p>
                        <p>Role : {{ auth()->user()->role ?? 'Tidak diketahui' }}</p>
                    </div>
                    <hr>
                    <a href="/catalog">List Lemari alat</a>
                    <hr>
                    <a href="/logpinjam">Riwayat Pinjam Alat</a>
                    <hr>
                    <a href="/logout">logout</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>