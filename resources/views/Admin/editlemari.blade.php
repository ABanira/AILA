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
                    <h2>You are a {{ auth()->user()->name ?? 'Tamu' }}.</h2>
                    <a href="/logout">logout</a>
                    <hr class="my-4">
                        <div class="col-3">
                            <a href="/lemari" class="btn btn-warning btn-block shadow-lg p-3 mb-2">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                        </div>                        
                        @if ($errors->any()) 
                        <hr class="my-4">
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <svg>
                                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </symbol>
                                </svg>
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                <div>
                                    <ul> 
                                    @foreach ($errors->all() as $error) 
                                    <li>{{ $error }}</li> 
                                    @endforeach 
                                </ul> 
                                </div>
                            </div>
                        @endif
                    <hr class="my-4">
                    <section>
                        <div class="container">
                            <div class="row d-flex">
                                <div class="col-12">
                                    <div class="card-body">
                                        <form action="{{ route('updatelemari', $lemari->id) }}" method="POST" enctype="multipart/form-data"> 
                                            @csrf 
                                            @method('PUT')
                                            <div class="form-container">
                                                <div class="form-inputs">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-outline mb-4">
                                                                <input type="text" id="name-1" class="form-control form-control-sm shadow-sm p-3 bg-body rounded" name="nama_lemari" placeholder="Nama Lemari" value="{{  old('nama_lemari', $lemari->nama_lemari) }}"/>
                                                                <label class="form-label" for="name-1">Tittle</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-outline mb-4">
                                                                <input type="text" id="number-1" class="form-control form-control-sm shadow-sm p-3 bg-body rounded" name="ip_control" placeholder="192.xx.xx.xx" value="{{  old('ip_control', $lemari->ip_control) }}"/>
                                                                <label class="form-label" for="number-1">IP Contoler</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="mb-4">
                                                                <label class="form-label" for="lokasi_unit-1">Lokasi Unit Kerja</label>
                                                                <select name="lokasi_unit" id="lokasi_unit-1" class="form-control form-control-sm shadow-sm p-3 bg-body rounded" name="lokasi_unit" placeholder="Lokasi Unit Kerja">
                                                                    <option value="{{ old('lokasi_unit', $lemari->lokasi_unit) }}" selected>{{ old('lokasi_unit',  $lemari->lokasi_unit) }}</option>
                                                                    <option disabled>-----</option>
                                                                    <option value="Fasilitas">Fasilitas</option>
                                                                    <option value="Qc">Qc</option>
                                                                    <option value="Ac">Ac</option>
                                                                    <option value="Bubutan">Bubutan</option>
                                                                    <option value="Listrik">Listrik</option>
                                                                    <option value="Kereta1">Kereta1</option>
                                                                    <option value="Kereta2">Kereta2</option>
                                                                    <option value="Kereta3">Kereta3</option>
                                                                    <option value="Kereta4">Kereta4</option>
                                                                    <option value="Kereta5">Kereta5</option>
                                                                    <option value="Kereta6">Kereta6</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="divider align-items-center my-4">
                                                        <hr>
                                                        <p class="text-center fw-bold mx-3 mb-0 text-muted">KONDISI LACI</p>
                                                        <hr>
                                                    </div>
                                                    <div class="row">
                                                        <div class="row"> 
                                                            @for ($i = 1; $i <= 8; $i++) 
                                                            <div class="col-lg-2"> 
                                                                <div class="form-outline mb-4"> 
                                                                    <div class="form-check form-switch p-0"> 
                                                                        <div class="d-flex flex-column-reverse gap-1"> 
                                                                            <input class="form-check-input mx-2" type="checkbox" role="switch" id="laci_{{ $i }}_switch" name="laci_{{ $i }}_switch" style="transform: scale(1.8);" {{ $lemari->{'laci_'.$i} == 0 ? 'checked' : '' }}> 
                                                                            <label class="form-check-label" for="laci_{{ $i }}_switch" id="label_{{ $i }}">Laci : <b>{{ $i }}</b></label> 
                                                                            <input type="hidden" id="laci_{{ $i }}" name="laci_{{ $i }}" value="{{ $lemari->{'laci_'.$i} }}"> 
                                                                        </div> 
                                                                    </div> 
                                                                </div> 
                                                            </div> 
                                                            @endfor 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="my-5">
                                            <div class="col-6">
                                                <button type="submit" class="btn btn-success btn-block shadow-lg p-3 mb-2">
                                                        <i class="fas fa-save"></i>  Simpan
                                                    </button>
                                            </div>
                                        </form>
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
    <script> 
    @for ($i = 1; $i <= 8; $i++) 
    document.getElementById('laci_{{ $i }}_switch')
    .addEventListener('change', function() { 
        const label = document.getElementById('label_{{ $i }}'); 
        const hiddenInput = document.getElementById('laci_{{ $i }}'); 
        if (this.checked) { 
            label.innerHTML = 'Laci ({{ $i }}) : <b>Aktif</b>'; 
            hiddenInput.value = '0'; 
            } else {
                label.innerHTML = 'Laci ({{ $i }}) : <b>Tidak Aktif</b>'; 
                hiddenInput.value = '2'; 
                } 
                }); 
                @endfor 
                </script>
</body>
</html>