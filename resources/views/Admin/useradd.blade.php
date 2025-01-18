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
                            <hr class="my-4">
                        @endif
                        <div class="col-3">
                            <a href="/user" class="btn btn-warning btn-block shadow-lg p-3 mb-2">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                        </div>
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
                                                                <label class="form-label" id="name-1">Nama</label>
                                                                <input type="text" for="name-1" class="form-control form-control-sm shadow-sm p-3 bg-body rounded" name="name" placeholder="Nama Lengkap" value="{{old('name')}}"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-outline mb-4">
                                                                <label class="form-label" for="nipp-1">NIPP</label>
                                                                <input type="number" id="nipp-1" class="form-control form-control-sm shadow-sm p-3 bg-body rounded" name="nipp" placeholder="xxxxx" value="{{old('nipp')}}"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-outline mb-4">
                                                                <label class="form-label" for="typeEmailX-1">Email</label>
                                                                <input type="email" id="typeEmailX-1" class="form-control form-control-sm shadow-sm p-3 bg-body rounded" name="email" placeholder="xxxx@mail.id" value="{{old('email')}}"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-outline mb-4">
                                                                <label class="form-label" for="number-1">No Tlpn.</label>
                                                                <input type="number" id="number-1" class="form-control form-control-sm shadow-sm p-3 bg-body rounded" name="tlpn" placeholder="085324xxxxxx" value="{{old('tlpn')}}"/>
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
                                                                <label class="form-label" for="password-1">Password</label>
                                                                <input type="password" id="password-1" class="form-control form-control-sm shadow-sm p-3 bg-body rounded" name="password" placeholder="Password"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-outline mb-4">
                                                                <label class="form-label" for="img-1">Foto</label>
                                                                <input type="file" id="img-1" accept=".jpg, .jpeg, .png" class="form-control form-control-sm shadow-sm p-3 bg-body rounded" name="id_img" placeholder="Foto Pengguna" onchange="previewImage(event)" capture="camera"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="image-preview">
                                                    <img id="preview" src="" alt="Pratinjau Gambar" style="width:200;"/>
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

@extends('template.footer')