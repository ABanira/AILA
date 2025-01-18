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
           <a href="/catalog" class="active">Catalog</a>
          </li>
          <li>
            <a href="/logpinjam">Riwayat Buka Lemari</a>
          </li>
          <li>
            <a href="/logout">logout</a>
          </li>
        </ul>
      </nav>
    </header>
     <main class="main">
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
                        @endif
                    <hr class="my-4">
                        <div class="col-3">
                            <a href="/catalog" class="btn btn-warning">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                        </div>   
                    <section>
                        <div class="container">
                            <div class="row d-flex">
                                <div class="col-12">
                                    <div class="card-body">
                                        <form action="{{ route('updateOrCreateCatalog') }}"  method="POST" enctype="multipart/form-data">
                                        @csrf
                                            <div class="form-container">
                                                <div class="form-inputs">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-outline mb-4">
                                                                <input type="text" class="text-danger form-control form-control-sm shadow-sm p-3 bg-body rounded" placeholder="Tittle Lemari" value="{{ $lemaris->nama_lemari}}" disabled="disabled"/>
                                                                  <input type="hidden" name="lemari_id" value="{{ $lemari_id }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-outline mb-4">
                                                                <input type="text" class="text-danger form-control form-control-sm shadow-sm p-3 bg-body rounded" placeholder="Tittle Lemari" value="Laci {{ $laci_id}}" disabled="disabled"/>
                                                                <input type="hidden" name="lokasi_laci" value="laci_{{ $laci_id }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="my-4">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-outline mb-4">
                                                                <label class="form-label" for="namaalat-1">Nama Item</label>
                                                                <input type="text" id="namaalat-1" class="form-control form-control-sm shadow-sm p-3 bg-body rounded" name="nama_alat" placeholder="Nama Item" value="{{ old('nama_alat', $catalog ? $catalog->nama_alat : '') }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-outline mb-4">
                                                                <label class="form-label" for="jumlahalat-1">Jumlah</label>
                                                                <input type="text" id="jumlahalat-1" class="text-danger form-control form-control-sm shadow-sm p-3 bg-body rounded" placeholder="Jumlah" value="1" disabled="disabled"/>
                                                                <input type="hidden" name="jumlah" value="1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="mb-4">
                                                                <label class="form-label" for="kondisi_alat-1">Kondisi Item</label>
                                                                <select name="kondisi_alat" id="kondisi_alat-1" class="form-control form-control-sm shadow-sm p-3 bg-body rounded" name="kondisi_alat" placeholder="Unit Kerja">
                                                                    <option value="{{ old('kondisi_alat', $catalog ? $catalog->kondisi_alat : '') }}">{{ old('kondisi_alat', $catalog ? $catalog->kondisi_alat : '') }}</option>
                                                                    <option value="Baik">Baik</option>
                                                                    <option value="Tidak Lengkap">Tidak Lengkap</option>
                                                                    <option value="Rusak">Rusak</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="mb-4">
                                                                <label class="form-label" for="img-1">Foto</label>
                                                                <input type="file" id="img-1" accept=".jpg, .jpeg, .png" class="form-control form-control-sm shadow-sm p-3 bg-body rounded" name="img_alat" placeholder="Foto alat" onchange="previewImage(event)" capture="camera"/>
                                                                @if ($catalog && $catalog->img_alat)
                                                                    <div class="mt-2">
                                                                        <p>Gambar Saat Ini:</p>
                                                                        <img src="{{ asset('storage/'.$catalog->img_alat) }}" alt="Gambar Alat" style="max-width: 200px; max-height: 200px;" />
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="image-preview">
                                                    <img id="preview" src="" alt="Pratinjau Gambar" style="max-width: 200px; max-height: 200px;" />
                                                </div>
                                            </div>
                                            <hr class="my-5">
                                            <div class="col-6">
                                                <button type="submit" class="btn btn-success">
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
        </main>      
                    
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
       <!-- Scroll Top -->
    <a
      href="#"
      id="scroll-top"
      class="scroll-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i></a>

@extends('template.footer')