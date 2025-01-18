@extends('template.header')
<script>
        function toggleLaci(lemariId, laciId, userId, catalogId, currentStatus, statusLaci, event) {
            // Mencegah tindakan default (reload halaman)
            event.preventDefault();

            // Tentukan jenis aksi (buka/kunci)
            const actionText = currentStatus == 0 ? 'Pinjam' : 'Kembalikan';
            const confirmMessage = currentStatus == userId
                ? 'Terimakasih, Silahkan simpan alat dan tutup kembali laci!!' 
                : 'Terimakasih, Silahkan ambil alat dan tutup kembali laci!!';

            if (confirm(confirmMessage)) {
                fetch(`/pinjam_kembali/${lemariId}/${laciId}/${userId}/${catalogId}`, {
                    method: 'PUT', // Gunakan metode PUT
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        action_type: currentStatus, // Jenis tindakan
                        laci_status: statusLaci === 1 ? 0 : 1, // Ubah status laci
                        catalogs_status: currentStatus === 0 ? userId : 0, // Ubah status catalog
                    }),
                })
                    .then((response) => {
                        if (response.ok) {
                            alert(`Berhasil! Laci ${actionText.toLowerCase()}!`);
                            location.reload(); // Muat ulang halaman setelah sukses
                        } else {
                            alert(`Terjadi kesalahan saat mencoba ${actionText.toLowerCase()} laci.`);
                        }
                    })
                    .catch((error) => {
                        alert(`Terjadi kesalahan saat mencoba ${actionText.toLowerCase()} laci.`);
                    });
            }
        }
    </script>
<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  
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
           <a href="#" class="active">Akun</a>
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
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <hr class="my-4">
                    {{ $lemaris->links() }}
                    <div class="album py-5 bg-light"> 
                        <div class="container">
                           @foreach ($lemaris as $lemari) 
                           <div class="col-sm-6"> 
                            <div class="form-outline mb-4"> 
                                <label class="form-label" for="role-1">Lemari</label> 
                                <input type="text" id="role-1" class="form-control form-control-sm shadow-sm p-3 bg-body rounded" value="{{ $lemari->nama_lemari }}" disabled="disable"> 
                            </div> 
                        </div> 
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                            @for ($i = 1; $i <= 8; $i++)
                            <div class="col">
                                <div class="card shadow-sm" style="{{ $lemari->{'laci_'.$i} == 2 ? 'display:none' : 'text-success' }}">
                                        @php
                                            // Ambil catalog dengan lokasi_laci yang sesuai
                                            $catalog = $lemari->catalogs->firstWhere('lokasi_laci', 'laci_'.$i);
                                        @endphp
                                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" role="img" aria-label="Placeholder: Foto Alat" preserveAspectRatio="xMidYMid slice" focusable="false">
                                        <title>Laci {{ $i }}</title>
                                        <rect width="100%" height="100%" fill="#55595c"/>
                                        <image href="{{ $catalog ? asset('storage/alats/'.$lemari->id.'/laci_'.$i.'.png')  :  asset('storage/img/default.jpg') }}" x="0" y="0" height="225" width="100%"/>
                                    </svg>
                                    <div class="card-body">
                                        <p class="card-text">NAMA : {{ $catalog ? $catalog->nama_alat : 'KOSONG' }}</p>
                                        <p class="card-text">
                                            KONDISI : 
                                            <span class="
                                                {{ $catalog ? ($catalog->kondisi_alat == 'Baik' ? 'badge rounded-pill bg-primary' : ($catalog->kondisi_alat == 'Rusak' ? 'badge rounded-pill bg-danger' : ($catalog->kondisi_alat == 'Tidak Lengkap' ? 'badge rounded-pill bg-warning' : 'text-muted'))) : 'text-muted' }}">
                                                {{ $catalog ? $catalog->kondisi_alat : 'KOSONG' }}
                                            </span>
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                           @if ($catalog && $catalog->status != 0 && $catalog->status != auth()->user()->id)
    <!-- Tombol akan hilang jika status adalah 0 atau jika peminjam bukan user yang sedang login -->
@else
    <a href="#" class="{{ $catalog && $catalog->status == auth()->user()->id ? 'btn btn-sm btn-warning' : 'btn btn-sm btn-primary' }}" onclick="toggleLaci({{ $lemari->id }}, {{ $i }}, {{ auth()->user()->id }}, {{ optional($catalog)->id }}, {{ optional($catalog)->status }}, {{ $lemari->{'laci_'.$i} }}, event)">
        {{$catalog && $catalog->status == auth()->user()->id ? 'Kembalikan' : 'Pinjam'}}
    </a>
@endif

                                            </div>
                                            <p class="card-text">
                                            @if($catalog && $catalog->status == 0)
                                            <small class="text-muted">{{ $catalog ? 'TERSEDIA' : 'KOSONG' }}</small>        
                                            @else
                                            <small class="text-muted">
                                                {{ $catalog && $catalog->user ? 'dipinjam oleh ' . $catalog->user->name : 'Kosong' }}
                                            </small>
                                            @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endfor
                        </div>
                         @endforeach
                        </div> 
                    </div>
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

@extends('template.footer')