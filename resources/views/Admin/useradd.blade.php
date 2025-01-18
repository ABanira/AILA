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
  <style>
      .form-container {
          display: flex;
          justify-content: space-between;
          align-items: flex-start;
      }
      .form-container .form-inputs {
          flex: 1;
          margin-right: 20px;
      }
      .form-container .image-preview {
          flex: 1;
          text-align: center;
      }
      .image-preview img {
          max-width: 100%;
          height: auto;
          display: none;
      }
  </style>
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
                            <a href="/user" class="btn btn-warning btn-block shadow-lg p-3 mb-2">
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
           <a href="/user" class="active">List User</a>
          </li>
          <li>
            <a href="/lemari">List Lemari</a>
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
                            <a href="/user" class="btn btn-warning btn-block shadow-lg p-3 mb-2">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                        </div>
>>>>>>> a68b19f (add tempalate boostrap for WebApp)
                    <hr class="my-4">
                    <section>
                        <div class="container">
                            <div class="row d-flex">
                                <div class="col-12">
                                    <div class="card-body">
                                        <form action="add_user" method="post" enctype="multipart/form-data">
                                        @csrf
                                            <div class="form-container">
                                                <div class="form-inputs">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-outline mb-4">
<<<<<<< HEAD
                                                                <input type="text" id="name-1" class="form-control form-control-sm shadow-sm p-3 bg-body rounded" name="name" placeholder="Nama Lengkap" value="{{old('name')}}"/>
                                                                <label class="form-label" for="name-1">Nama</label>
=======
                                                                <label class="form-label" id="name-1">Nama</label>
                                                                <input type="text" for="name-1" class="form-control form-control-sm shadow-sm p-3 bg-body rounded" name="name" placeholder="Nama Lengkap" value="{{old('name')}}"/>
>>>>>>> a68b19f (add tempalate boostrap for WebApp)
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-outline mb-4">
<<<<<<< HEAD
                                                                <input type="number" id="nipp-1" class="form-control form-control-sm shadow-sm p-3 bg-body rounded" name="nipp" placeholder="xxxxx" value="{{old('nipp')}}"/>
                                                                <label class="form-label" for="nipp-1">NIPP</label>
=======
                                                                <label class="form-label" for="nipp-1">NIPP</label>
                                                                <input type="number" id="nipp-1" class="form-control form-control-sm shadow-sm p-3 bg-body rounded" name="nipp" placeholder="xxxxx" value="{{old('nipp')}}"/>
>>>>>>> a68b19f (add tempalate boostrap for WebApp)
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-outline mb-4">
<<<<<<< HEAD
                                                                <input type="email" id="typeEmailX-1" class="form-control form-control-sm shadow-sm p-3 bg-body rounded" name="email" placeholder="xxxx@mail.id" value="{{old('email')}}"/>
                                                                <label class="form-label" for="typeEmailX-1">Email</label>
=======
                                                                <label class="form-label" for="typeEmailX-1">Email</label>
                                                                <input type="email" id="typeEmailX-1" class="form-control form-control-sm shadow-sm p-3 bg-body rounded" name="email" placeholder="xxxx@mail.id" value="{{old('email')}}"/>
>>>>>>> a68b19f (add tempalate boostrap for WebApp)
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-outline mb-4">
<<<<<<< HEAD
                                                                <input type="number" id="number-1" class="form-control form-control-sm shadow-sm p-3 bg-body rounded" name="tlpn" placeholder="085324xxxxxx" value="{{old('tlpn')}}"/>
                                                                <label class="form-label" for="number-1">No Tlpn.</label>
=======
                                                                <label class="form-label" for="number-1">No Tlpn.</label>
                                                                <input type="number" id="number-1" class="form-control form-control-sm shadow-sm p-3 bg-body rounded" name="tlpn" placeholder="085324xxxxxx" value="{{old('tlpn')}}"/>
>>>>>>> a68b19f (add tempalate boostrap for WebApp)
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="mb-4">
                                                                <label class="form-label" for="role-1">Role</label>
                                                                <select name="role" id="role-1" class="form-control form-control-sm shadow-sm p-3 bg-body rounded" name="role" placeholder="Hak Akses">
                                                                    <option value="{{old('role')}}">{{old('role')}}</option>
                                                                    <option value="Admin">Admin</option>
                                                                    <option value="Spv">Spv</option>
                                                                    <option value="Officer">Officer</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="mb-4">
                                                                <label class="form-label" for="unit_kerja-1">Unit Kerja</label>
                                                                <select name="unit_kerja" id="unit_kerja-1" class="form-control form-control-sm shadow-sm p-3 bg-body rounded" name="unit_kerja" placeholder="Unit Kerja">
                                                                    <option value="{{old('unit_kerja')}}">{{old('unit_kerja')}}</option>
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
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-outline mb-4">
<<<<<<< HEAD
                                                                <input type="password" id="password-1" class="form-control form-control-sm shadow-sm p-3 bg-body rounded" name="password" placeholder="Password"/>
                                                                <label class="form-label" for="password-1">Password</label>
=======
                                                                <label class="form-label" for="password-1">Password</label>
                                                                <input type="password" id="password-1" class="form-control form-control-sm shadow-sm p-3 bg-body rounded" name="password" placeholder="Password"/>
>>>>>>> a68b19f (add tempalate boostrap for WebApp)
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-outline mb-4">
<<<<<<< HEAD
                                                                <input type="file" id="img-1" accept=".jpg, .jpeg, .png" class="form-control form-control-sm shadow-sm p-3 bg-body rounded" name="id_img" placeholder="Foto Pengguna" onchange="previewImage(event)" capture="camera"/>
                                                                <label class="form-label" for="img-1">Foto</label>
=======
                                                                <label class="form-label" for="img-1">Foto</label>
                                                                <input type="file" id="img-1" accept=".jpg, .jpeg, .png" class="form-control form-control-sm shadow-sm p-3 bg-body rounded" name="id_img" placeholder="Foto Pengguna" onchange="previewImage(event)" capture="camera"/>
>>>>>>> a68b19f (add tempalate boostrap for WebApp)
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="image-preview">
<<<<<<< HEAD
                                                    <img id="preview" src="" alt="Pratinjau Gambar"/>
=======
                                                    <img id="preview" src="" alt="Pratinjau Gambar" style="width:200;"/>
>>>>>>> a68b19f (add tempalate boostrap for WebApp)
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
<<<<<<< HEAD
            </div>
        </div>
    </div>
</div>

  <!-- MDB -->
  <script defer src={{asset('storage/js/mdb.min.js') }}></script>
  <!-- PREVIEW IMG -->
  <script>
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
      
      <script>
>>>>>>> a68b19f (add tempalate boostrap for WebApp)
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview');
                output.src = reader.result;
                output.style.display = 'block';
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
<<<<<<< HEAD
</body>
</html>
=======

@extends('template.footer')
>>>>>>> a68b19f (add tempalate boostrap for WebApp)
