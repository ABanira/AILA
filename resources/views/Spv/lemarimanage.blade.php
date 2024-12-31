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
<script>
    function toggleLaci(lemariId, laciId, userId, currentStatus, event) {
        // Mencegah tindakan default (reload halaman)
        event.preventDefault();

        // Tentukan jenis aksi (buka/kunci)
        const actionText = currentStatus === 0 ? 'Buka' : 'Kunci';
        const confirmMessage = currentStatus === 0 
            ? 'Laci terbuka!!' 
            : 'Pastikan laci tertutup saat mengunci!!';

        if (confirm(confirmMessage)) {
            fetch(`/open_close/${lemariId}/${laciId}/${userId}`, {
                method: 'PUT', // Gunakan metode PUT
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    action_type: 'manual', // Jenis tindakan
                    laci_status: currentStatus === 0 ? 1 : 0, // Ubah status
                }),
            })
                .then((response) => {
                    if (response.ok) {
                        alert(`Operasi berhasil! Laci ${actionText.toLowerCase()}!`);
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
                    <p>Unit Kerja : {{ auth()->user()->unit_kerja ?? 'Tamu' }}.</p>
                    <a href="/logout">logout</a>
                    <hr class="my-4">
                    {{ $lemaris->links() }}
                    <div class="album py-5 bg-light"> 
                        <div class="container"> 
                           @foreach ($lemaris as $lemari) 
                           <div class="col-sm-6"> 
                            <div class="form-outline mb-4"> 
                                <input type="text" id="role-1" class="form-control form-control-sm shadow-sm p-3 bg-body rounded" value="{{ $lemari->nama_lemari }}" disabled="disable"> 
                                <label class="form-label" for="role-1">Lemari</label> 
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
                                        <p class="card-text">NAMA ALAT : {{ $catalog ? $catalog->nama_alat : 'KOSONG' }}</p>
                                        <p class="card-text">{{ $catalog ? $catalog->status : 'KOSONG' }}</p>
                                        <p class="card-text">KONDISI : {{ $catalog ? $catalog->kondisi_alat : 'KOSONG' }}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a href="{{ route('viewcatalog', ['lemari_id' => $lemari->id, 'laci_id' => $i]) }}" type="button" class="btn btn-sm btn-outline-primary">View</a>&nbsp;
                                                <a href="{{ route('editcatalog', ['lemari_id' => $lemari->id, 'laci_id' => $i]) }}" type="button" class="btn btn-sm btn-outline-primary">Edit</a>&nbsp;
                                                <a href="#" class="{{ $lemari->{'laci_'.$i} == 0 ? 'btn btn-sm btn-outline-success' : 'btn btn-sm btn-outline-danger' }}" onclick="toggleLaci({{ $lemari->id }}, {{ $i }}, {{ auth()->user()->id }}, {{ $lemari->{'laci_'.$i} }}, event)">
                                                {{ $lemari->{'laci_'.$i} == 0 ? 'Buka' : 'Kunci' }}
                                                </a>
                                            </div>
                                            <small class="text-muted">{{ $catalog ? $catalog->jumlah : 'KOSONG' }} UNIT</small>
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
        </div>
    </div>
</div>                                          
  <!-- MDB -->
  <script defer src={{asset('storage/js/mdb.min.js') }}></script>
</body>
</html>