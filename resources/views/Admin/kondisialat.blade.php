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
                    <!-- Form Pencarian -->
                    <form action="{{ route('kondisialatadmin') }}" method="GET" class="mb-4">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="condition" class="form-label">Kondisi Alat</label>
                                <select name="condition" class="form-control">
                                    <option value="">-- Pilih Kondisi --</option>
                                    <option value="Baik" {{ request('condition') === 'Baik' ? 'selected' : '' }}>Baik</option>
                                    <option value="Rusak" {{ request('condition') === 'Rusak' ? 'selected' : '' }}>Rusak</option>
                                    <option value="Tidak Lengkap" {{ request('condition') === 'Tidak Lengkap' ? 'selected' : '' }}>Tidak Lengkap</option>
                                </select>
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
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lemari</th>
                                    <th>Nama Alat</th>
                                    <th>Kondisi</th>
                                    <th>Lokasi Unit</th>
                                    <th>Lokasi Laci</th>
                                    <th>Terakhir Diperbarui</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($catalogs as $index => $catalog)
                                    <tr>
                                        <td>{{ $index + $catalogs->firstItem() }}</td>
                                        <td>{{ $catalog->lemari->nama_lemari ?? 'Tidak Diketahui' }}</td>
                                        <td>{{ $catalog->nama_alat }}</td>
                                        <td>
                                            @if ($catalog->kondisi_alat === 'Baik')
                                                <span class="badge bg-success">Baik</span>
                                            @elseif ($catalog->kondisi_alat === 'Rusak')
                                                <span class="badge bg-danger">Rusak</span>
                                            @else
                                                <span class="badge bg-warning">Tidak Lengkap</span>
                                            @endif
                                        </td>
                                        <td>{{ $catalog->lemari->lokasi_unit ?? 'Tidak Diketahui' }}</td>
                                        <td>{{ $catalog->lokasi_laci ?? 'Tidak Diketahui' }}</td>
                                        <td>{{ $catalog->updated_at->format('d-m-Y H:i') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Tidak ada data alat ditemukan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $catalogs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>