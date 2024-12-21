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
    function deleteUser(userId) {
        if (confirm('Apakah Anda yakin ingin menghapus pengguna ini?')) {
            fetch(`/delete_user/${userId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                if (response.ok) {
                    alert('User berhasil dihapus!');
                    location.reload();
                } else {
                    alert('Terjadi kesalahan saat menghapus user.');
                }
            })
            .catch(error => {
                alert('Terjadi kesalahan saat menghapus user.');
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
                            <a href="/tambah_user" class="btn btn-primary btn-block shadow-lg p-3 mb-2">
                            <i class="fa fa-plus"></i> Tambah</a>
                        </div>
                    <hr class="my-4">
                    <div class="table">
                        <table class="table table-striped table-hover table-border">
                            <thead>
                                <th>NO</th>
                                <th>NAMA</th>
                                <th>NIPP</th>
                                <th>ROLE</th>
                                <th>UNIT KERJA</th>
                                <th>ACTION</th>
                            </thead>
                            <tbody>
                                @foreach ($users as $index => $user) 
                                <tr> 
                                    <td>{{ $users->firstItem() + $index }}</td>
                                    <td>{{ $user->name }}</td> 
                                    <td>{{ $user->nipp }}</td> 
                                    <td>{{ $user->role }}</td> 
                                    <td>{{ $user->unit_kerja }}</td> 
                                    <td>
                                        <a href="http://">LIHAT</a> |
                                        <a href="http://"> UBAH</a> | 
                                        <a href="#" onclick="deleteUser({{ $user->id }})" class="btn btn-danger btn-sm"> <i class="fa fa-trash" aria-hidden="true"></i> Hapus </a>
                                    </td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}   
                    </div>
                </div>
        </div>
    </div>
</div>  
</body>
</html>