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
    function deletelemari(lemariId) {
        if (confirm('Apakah Anda yakin ingin menghapus lemari ini?')) {
            fetch(`/delete_lemari/${lemariId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                if (response.ok) {
                    alert('lemari berhasil dihapus!');
                    location.reload();
                } else {
                    alert('Terjadi kesalahan saat menghapus lemari.');
                }
            })
            .catch(error => {
                alert('Terjadi kesalahan saat menghapus lemari.');
            });
        }
    }
</script>

</head>
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
                        <div class="col-3">
                            <a href="/tambah_lemari" class="btn btn-primary btn-block shadow-lg p-3 mb-2">
                            <i class="fa fa-plus"></i> Tambah</a>
                        </div>
                    <hr class="my-4">
                    <div class="table">
                        <table class="table table-striped table-hover table-border">
                            <thead>
                                <th>NO</th>
                                <th>TITTLE</th>
                                <th>UNIT KERJA</th>
                                <th>CONTROLER</th>
                                <th>ACTION</th>
                            </thead>
                            <tbody>
                                @foreach ($lemaris as $index => $lemari) 
                                <tr> 
                                    <td>{{ $lemaris->firstItem() + $index }}</td>
                                    <td>{{ $lemari->nama_lemari }}</td>
                                    <td>{{ $lemari->lokasi_unit }}</td>
                                    <td>{{ $lemari->ip_control }}</td>
                                    <td>
                                        <a href="/{{ $lemari->id }}/viewlemari" class="btn btn-info btn-sm"> <i class="fa fa-eye" aria-hidden="true"></i> LIHAT</a> |
                                        <a href="/{{ $lemari->id }}/editlemari" class="btn btn-warning btn-sm"> <i class="fa fa-edit" aria-hidden="true"></i> UBAH</a> | 
                                        <a href="#" onclick="deletelemari({{ $lemari->id }})" class="btn btn-danger btn-sm"> <i class="fa fa-trash" aria-hidden="true"></i> Hapus </a>
                                    </td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                        {{ $lemaris->links() }}   
                    </div>
                </div>
        </div>
    </div>
</div>  
</body>
</html>