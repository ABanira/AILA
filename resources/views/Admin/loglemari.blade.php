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
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">{{ $title }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
 
                    <h2>You are a {{ auth()->user()->name ?? 'Tamu' }}.</h2>
                    <a href="/logout">logout</a>
                    <hr class="my-4">
                    <!-- Form Filter -->
                    <form method="GET" action="{{ route('loglemariadmin') }}">
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="start_date" class="form-label">Tanggal Mulai</label>
                                <input type="date" id="start_date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                            </div>
                            <div class="col-md-3">
                                <label for="end_date" class="form-label">Tanggal Akhir</label>
                                <input type="date" id="end_date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                            </div>
                            <div class="col-md-3">
                                <label for="unit_kerja" class="form-label">Unit Kerja</label>
                                <input type="text" id="unit_kerja" name="unit_kerja" class="form-control" value="{{ request('unit_kerja') }}">
                            </div>
                            <div class="col-md-3">
                                 <label for="end_date" class="form-label">''</label>
                                <button type="submit" class="form-control btn btn-primary">Cari</button>
                            </div>
                        </div>
                    </form>
                    <div class="table">
                        <table class="table table-striped table-hover table-border">
                            <thead>
                                <th>Tanggal</th>
                                <th>Unit Kerja</th>
                                <th>Aksi</th>
                                <th>User</th>
                            </thead>
                            <tbody>
                                @forelse ($actions as $action)
                                    <tr>
                                        <td>{{ $action->created_at }}</td>
                                        <td>{{ $action->user->unit_kerja ?? '-' }}</td>
                                        <td>{{ $action->action_detail }}</td>
                                        <td>{{ $action->user->name ?? '-' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada data ditemukan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                         {{ $actions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>