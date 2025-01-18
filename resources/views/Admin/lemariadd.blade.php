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
                    <h2>You are a {{ auth()->user()->name ?? 'Tamu' }}.</h2>
                    <a href="/logout">logout</a>
                    <hr class="my-4">
                        <div class="col-3">
                            <a href="/lemari" class="btn btn-warning btn-block shadow-lg p-3 mb-2">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                        </div>                        
                        @if ($errors->any()) 
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
            <a href="/lemari" class="active">List Lemari</a>
          </li>
          <li>
            <a href="/loglemari">Riwayat Buka Laci</a>
          </li>
          <li>
            <a href="/kondisialat">Kondisi Item</a>
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
                    @if ($errors->any()) 
>>>>>>> a68b19f (add tempalate boostrap for WebApp)
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
<<<<<<< HEAD
                        @endif
=======
                            <hr class="my-4">
                        @endif
                        <div class="col-3">
                            <a href="/lemari" class="btn btn-warning">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                        </div>
>>>>>>> a68b19f (add tempalate boostrap for WebApp)
                    <hr class="my-4">
                    <section>
                        <div class="container">
                            <div class="row d-flex">
                                <div class="col-12">
                                    <div class="card-body">
                                        <form action="add_lemari" method="post" enctype="multipart/form-data">
                                        @csrf
                                            <div class="form-container">
                                                <div class="form-inputs">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-outline mb-4">
                                                                <input type="text" id="name-1" class="form-control form-control-sm shadow-sm p-3 bg-body rounded" name="nama_lemari" placeholder="Nama Lemari" value="{{old('nama_lemari')}}"/>
                                                                <label class="form-label" for="name-1">Tittle</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-outline mb-4">
                                                                <input type="text" id="number-1" class="form-control form-control-sm shadow-sm p-3 bg-body rounded" name="ip_control" placeholder="192.xx.xx.xx" value="{{old('ip_control')}}"/>
                                                                <label class="form-label" for="number-1">IP Contoler</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="mb-4">
                                                                <label class="form-label" for="lokasi_unit-1">Lokasi Unit Kerja</label>
                                                                <select name="lokasi_unit" id="lokasi_unit-1" class="form-control form-control-sm shadow-sm p-3 bg-body rounded" name="lokasi_unit" placeholder="Lokasi Unit Kerja">
                                                                    <option value="{{old('lokasi_unit')}}">{{old('lokasi_unit')}}</option>
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
                                                        <div class="col-lg-2">
                                                            <div class="form-outline mb-4">
                                                                <div class="form-check form-switch p-0">
                                                                    <div class="d-flex flex-column-reverse gap-1">
                                                                        <input class="form-check-input mx-2" type="checkbox" role="switch" id="satu" name="laci_1_switch" style="transform: scale(1.8);">
                                                                        <label class="form-check-label" for="satu" id="label_1">Laci : <b>Satu (1)</b></label>
                                                                        <input type="hidden" id="laci_1" name="laci_1" value="2">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="form-outline mb-4">
                                                                <div class="form-check form-switch p-0">
                                                                    <div class="d-flex flex-column-reverse gap-1">
                                                                        <input class="form-check-input mx-2" type="checkbox" role="switch" id="dua" name="laci_2_switch" style="transform: scale(1.8);">
                                                                        <label class="form-check-label" for="dua" id="label_2">Laci : <b>Dua (2)</b></label>
                                                                        <input type="hidden" id="laci_2" name="laci_2" value="2">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="form-outline mb-4">
                                                                <div class="form-check form-switch p-0">
                                                                    <div class="d-flex flex-column-reverse gap-1">
                                                                        <input class="form-check-input mx-2" type="checkbox" role="switch" id="tiga" name="laci_3_switch" style="transform: scale(1.8);">
                                                                        <label class="form-check-label" for="tiga" id="label_3">Laci : <b>Tiga (3)</b></label>
                                                                        <input type="hidden" id="laci_3" name="laci_3" value="2">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="form-outline mb-4">
                                                                <div class="form-check form-switch p-0">
                                                                    <div class="d-flex flex-column-reverse gap-1">
                                                                        <input class="form-check-input mx-2" type="checkbox" role="switch" id="empat" name="laci_4_switch" style="transform: scale(1.8);">
                                                                        <label class="form-check-label" for="empat" id="label_4">Laci : <b>Empat (4)</b></label>
                                                                        <input type="hidden" id="laci_4" name="laci_4" value="2">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="form-outline mb-4">
                                                                <div class="form-check form-switch p-0">
                                                                    <div class="d-flex flex-column-reverse gap-1">
                                                                        <input class="form-check-input mx-2" type="checkbox" role="switch" id="lima" name="laci_5_switch" style="transform: scale(1.8);">
                                                                        <label class="form-check-label" for="lima" id="label_5">Laci : <b>Lima (5)</b></label>
                                                                        <input type="hidden" id="laci_5" name="laci_5" value="2">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="form-outline mb-4">
                                                                <div class="form-check form-switch p-0">
                                                                    <div class="d-flex flex-column-reverse gap-1">
                                                                        <input class="form-check-input mx-2" type="checkbox" role="switch" id="enam" name="laci_6_switch" style="transform: scale(1.8);">
                                                                        <label class="form-check-label" for="enam" id="label_6">Laci : <b>Enam (6)</b></label>
                                                                        <input type="hidden" id="laci_6" name="laci_6" value="2">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="form-outline mb-4">
                                                                <div class="form-check form-switch p-0">
                                                                    <div class="d-flex flex-column-reverse gap-1">
                                                                        <input class="form-check-input mx-2" type="checkbox" role="switch" id="tujuh" name="laci_7_switch" style="transform: scale(1.8);">
                                                                        <label class="form-check-label" for="tujuh" id="label_7">Laci : <b>Tujuh (7)</b></label>
                                                                        <input type="hidden" id="laci_7" name="laci_7" value="2">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="form-outline mb-4">
                                                                <div class="form-check form-switch p-0">
                                                                    <div class="d-flex flex-column-reverse gap-1">
                                                                        <input class="form-check-input mx-2" type="checkbox" role="switch" id="delapan" name="laci_8_switch" style="transform: scale(1.8);">
                                                                        <label class="form-check-label" for="delapan" id="label_8">Laci : <b>Delapan (8)</b></label>
                                                                        <input type="hidden" id="laci_8" name="laci_8" value="2">
                                                                    </div>
                                                                </div>
                                                            </div>
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
<<<<<<< HEAD
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- MDB -->
  <script defer src={{asset('storage/js/mdb.min.js') }}></script>
  <script>
=======
                   <!-- /Hero Section -->
    </main>

    <!-- Scroll Top -->
    <a
      href="#"
      id="scroll-top"
      class="scroll-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i></a>
        <script>
>>>>>>> a68b19f (add tempalate boostrap for WebApp)
    document.getElementById('satu').addEventListener('change', function() { 
        const label = document.getElementById('label_1');
        const hiddenInput = document.getElementById('laci_1');
        if (this.checked) { 
            label.innerHTML = 'Laci (1) : <b>Aktif</b>';
            hiddenInput.value = '0';
        } else { 
            label.innerHTML = 'Laci (1) : <b>Tidak Aktif</b>'; 
            hiddenInput.value = '2';
        } });
    document.getElementById('dua').addEventListener('change', function() { 
        const label = document.getElementById('label_2'); 
        const hiddenInput = document.getElementById('laci_2');
        if (this.checked) {
             label.innerHTML = 'Laci (2) : <b>Aktif</b>';
             hiddenInput.value = '0';
            } else { 
                label.innerHTML = 'Laci (2) : <b>Tidak Aktif</b>'; 
                hiddenInput.value = '2';
            } });
    document.getElementById('tiga').addEventListener('change', function() { 
        const label = document.getElementById('label_3'); 
        const hiddenInput = document.getElementById('laci_3');
        if (this.checked) {
             label.innerHTML = 'Laci (3) : <b>Aktif</b>';
             hiddenInput.value = '0';
            } else { 
                label.innerHTML = 'Laci (3) : <b>Tidak Aktif</b>'; 
                hiddenInput.value = '2';
            } });
    document.getElementById('empat').addEventListener('change', function() { 
        const label = document.getElementById('label_4'); 
        const hiddenInput = document.getElementById('laci_4');
        if (this.checked) {
             label.innerHTML = 'Laci (4) : <b>Aktif</b>';
             hiddenInput.value = '0';
            } else { 
                label.innerHTML = 'Laci (4) : <b>Tidak Aktif</b>'; 
                hiddenInput.value = '2';
            } });
    document.getElementById('lima').addEventListener('change', function() { 
        const label = document.getElementById('label_5'); 
        const hiddenInput = document.getElementById('laci_5');
        if (this.checked) {
             label.innerHTML = 'Laci (5) : <b>Aktif</b>';
             hiddenInput.value = '0';
            } else { 
                label.innerHTML = 'Laci (5) : <b>Tidak Aktif</b>'; 
                hiddenInput.value = '2';
            } });
    document.getElementById('enam').addEventListener('change', function() { 
        const label = document.getElementById('label_6'); 
        const hiddenInput = document.getElementById('laci_6');
        if (this.checked) {
             label.innerHTML = 'Laci (6) : <b>Aktif</b>';
             hiddenInput.value = '0';
            } else { 
                label.innerHTML = 'Laci (6) : <b>Tidak Aktif</b>'; 
                hiddenInput.value = '2';
            } });
    document.getElementById('tujuh').addEventListener('change', function() { 
        const label = document.getElementById('label_7'); 
        const hiddenInput = document.getElementById('laci_7');
        if (this.checked) {
             label.innerHTML = 'Laci (7) : <b>Aktif</b>';
             hiddenInput.value = '0';
            } else { 
                label.innerHTML = 'Laci (7) : <b>Tidak Aktif</b>'; 
                hiddenInput.value = '2';
            } });
    document.getElementById('delapan').addEventListener('change', function() { 
        const label = document.getElementById('label_8'); 
        const hiddenInput = document.getElementById('laci_8');
        if (this.checked) {
             label.innerHTML = 'Laci (8) : <b>Aktif</b>';
             hiddenInput.value = '0';
            } else { 
                label.innerHTML = 'Laci (8) : <b>Tidak Aktif</b>'; 
                hiddenInput.value = '2';
            } });
    </script>
<<<<<<< HEAD
</body>
</html>
=======


@extends('template.footer')
>>>>>>> a68b19f (add tempalate boostrap for WebApp)
