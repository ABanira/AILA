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
  <style> .status-aktif { color: green; } .status-tidak-aktif { color: red; } </style>
</head>
<body>
  
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">{{ $title }}</div>
                <div class="card-body">
                    <h2>You are a {{ auth()->user()->name ?? 'Tamu' }}.</h2>
                    <a href="/logout">logout</a>
                    <hr class="my-4">
                        <div class="col-3">
                            <a href="/lemari" class="btn btn-warning btn-block shadow-lg p-3 mb-2">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                        </div>
                    <hr class="my-4">
                    <section>
                        <div class="container">
                            <div class="row d-flex">
                                <div class="col-12">
                                    <div class="card-body">
                                            <div class="form-container">
                                                <div class="form-inputs">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-outline mb-4">
                                                                <input type="text" id="name-1" class="form-control form-control-sm shadow-sm p-3 bg-body rounded" name="nama_lemari" placeholder="Nama Lemari" value="{{ $lemari->nama_lemari }}" disabled="disable">
                                                                <label class="form-label" for="name-1">Tittle</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-outline mb-4">
                                                                <input type="text" id="number-1" class="form-control form-control-sm shadow-sm p-3 bg-body rounded" name="ip_control" placeholder="192.xx.xx.xx" value="{{ $lemari->ip_control }}" disabled="disable">
                                                                <label class="form-label" for="number-1">IP Contoler</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-outline mb-4">
                                                                <input type="text" name="lokasi_unit" id="lokasi_unit-1" class="form-control form-control-sm shadow-sm p-3 bg-body rounded" name="lokasi_unit" placeholder="Lokasi Unit Kerja" value="{{ $lemari->lokasi_unit }}" disabled="disable">
                                                                <label class="form-label" for="lokasi_unit-1">Lokasi Unit Kerja</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="divider align-items-center my-4">
                                                        <hr>
                                                        <p class="text-center fw-bold mx-3 mb-0 text-muted">KONDISI LACI</p>
                                                        <hr>
                                                    </div>
                                                    <div class="row"> 
                                                        @for ($i = 1; $i <= 8; $i++) 
                                                        <div class="col-lg-2"> 
                                                            <div class="form-outline mb-4"> 
                                                                <div class="form-check form-switch p-0"> 
                                                                    <div class="d-flex flex-column-reverse gap-1"> 
                                                                        <label class="form-control form-control-sm shadow-sm p-3 bg-body rounded" for="laci_{{ $i }}" id="label_{{ $i }}"> Laci {{ $i }}: <b class="{{ $lemari->{'laci_'.$i} == 2 ? 'status-tidak-aktif' : 'status-aktif' }}">{{ $lemari->{'laci_'.$i} == 2 ? 'Tidak Aktif' : 'Aktif' }}</b> </label>
                                                                    </div>
                                                                </div> 
                                                            </div> 
                                                        </div> 
                                                        @endfor
                                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>                                                      
  <!-- MDB -->
  <script defer src={{asset('storage/js/mdb.min.js') }}></script>
</body>
</html>