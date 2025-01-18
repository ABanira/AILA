@extends('template.header')
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
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
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
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
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