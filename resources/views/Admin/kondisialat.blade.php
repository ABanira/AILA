<<<<<<< HEAD
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
=======
@extends('template.header')
  <body class="starter-page-page">
    <header
      id="header"
      class="header dark-background d-flex flex-column">
      <i class="header-toggle d-xl-none bi bi-list"></i>

      <div class="profile-img">
        <img
          src="{{asset('storage/img/logo.png') }}"
          class="img-fluid rounded-circle"  style="background-color: #fff;"/>
      </div>
      <nav
        id="navmenu"
        class="navmenu">
        <ul>
          <li>
           <a href="/user">List User</a>
          </li>
          <li>
            <a href="/lemari">List Lemari</a>
          </li>
          <li>
            <a href="/loglemari">Riwayat Buka Laci</a>
          </li>
          <li>
            <a href="/kondisialat" class="active">Kondisi Item</a>
          </li>
          <li>
            <a href="/logout">logout</a>
          </li>
        </ul>
      </nav>
    </header>
     <main class="main">
      <!-- Page Title -->
      <section>
        <div class="container"
          data-aos="fade-up"
          data-aos-delay="100">
          <div class="card-body">
                    <hr class="my-4">
                    <form action="{{ route('kondisialatadmin') }}" method="GET" class="mb-4">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="condition" class="form-label">Kondisi Item</label>
>>>>>>> a68b19f (add tempalate boostrap for WebApp)
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
<<<<<<< HEAD
                    <div class="table">
                        <table class="table table-striped table-hover table-border">
=======
                    <div class="table-responsive">
                      <table class="table table-striped table-hover table-border">
>>>>>>> a68b19f (add tempalate boostrap for WebApp)
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lemari</th>
<<<<<<< HEAD
                                    <th>Nama Alat</th>
=======
                                    <th>Nama Item</th>
>>>>>>> a68b19f (add tempalate boostrap for WebApp)
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
<<<<<<< HEAD
                                        <td colspan="7" class="text-center">Tidak ada data alat ditemukan.</td>
=======
                                        <td colspan="7" class="text-center">Tidak ada data item ditemukan.</td>
>>>>>>> a68b19f (add tempalate boostrap for WebApp)
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $catalogs->links() }}
                    </div>
                </div>
<<<<<<< HEAD
            </div>
        </div>
    </div>
</div>
</body>
</html>
=======
        </div>
      </section>
      <!-- /Hero Section -->
    </main>

    <!-- Scroll Top -->
    <a
      href="#"
      id="scroll-top"
      class="scroll-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i></a>

@extends('template.footer')
>>>>>>> a68b19f (add tempalate boostrap for WebApp)
