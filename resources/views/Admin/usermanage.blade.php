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
  <script>
=======
@extends('template.header')
    <script>
>>>>>>> a68b19f (add tempalate boostrap for WebApp)
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
<<<<<<< HEAD
</head>
<body>
  
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">{{ $title }}</div>

                <div class="card-body">
=======

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
>>>>>>> a68b19f (add tempalate boostrap for WebApp)
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
<<<<<<< HEAD
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
=======
                    <hr class="my-4">
                    @endif
                        <div class="col-3">
                            <a href="/tambah_user" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Tambah</a>
                        </div>
                    <hr class="my-4">
                    <form method="GET" action="{{ route('usermanage') }}">
                        <div class="row">
                            <div class="col-sm-6">
                                <input class="form-control" type="text" name="query" placeholder="Cari pengguna..." value="{{ request()->query('query') }}">
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="form-control btn btn-primary">Cari</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
>>>>>>> a68b19f (add tempalate boostrap for WebApp)
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
<<<<<<< HEAD
                                @foreach ($users as $index => $user) 
                                <tr> 
                                    <td>{{ $users->firstItem() + $index }}</td>
                                    <td>{{ $user->name }}</td> 
                                    <td>{{ $user->nipp }}</td> 
                                    <td>{{ $user->role }}</td> 
                                    <td>{{ $user->unit_kerja }}</td> 
                                    <td>
                                        <a href="/{{ $user->id }}/viewuser" class="btn btn-info btn-sm"> <i class="fa fa-eye" aria-hidden="true"></i> LIHAT</a> |
                                        <a href="/{{ $user->id }}/edituser" class="btn btn-warning btn-sm"> <i class="fa fa-edit" aria-hidden="true"></i> UBAH</a> | 
                                        <a href="#" onclick="deleteUser({{ $user->id }})" class="btn btn-danger btn-sm"> <i class="fa fa-trash" aria-hidden="true"></i> Hapus </a>
                                    </td>
                                </tr> 
=======
                                @foreach ($users as $index => $user)
                                    @if($user->name !== 'Admin')
                                        <tr>
                                            <td>{{ $users->firstItem() + $index }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->nipp }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td>{{ $user->unit_kerja }}</td>
                                            <td>
                                                <a href="/{{ $user->id }}/viewuser" class="btn btn-info btn-sm"> <i class="fa fa-eye" aria-hidden="true"></i> LIHAT</a> |
                                                <a href="/{{ $user->id }}/edituser" class="btn btn-warning btn-sm"> <i class="fa fa-edit" aria-hidden="true"></i> UBAH</a> | 
                                                <a href="#" onclick="deleteUser({{ $user->id }})" class="btn btn-danger btn-sm"> <i class="fa fa-trash" aria-hidden="true"></i> Hapus </a>
                                            </td>
                                        </tr>
                                    @endif
>>>>>>> a68b19f (add tempalate boostrap for WebApp)
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
<<<<<<< HEAD
            </div>
        </div>
    </div>
</div>
</body>
</html>
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

@extends('template.footer')
>>>>>>> a68b19f (add tempalate boostrap for WebApp)
