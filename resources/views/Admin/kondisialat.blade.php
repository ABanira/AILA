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
            <a href="/lemari">List Lemari</a>
          </li>
          <li>
            <a href="/loglemari">Riwayat Buka Laci</a>
          </li>
          <li>
            <a href="/kondisialat" class="active">Kondisi Item</a>
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
                    <hr class="my-4">
                    <form action="{{ route('kondisialatadmin') }}" method="GET" class="mb-4">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="condition" class="form-label">Kondisi Item</label>
                                <select name="condition" class="form-control">
                                    <option value="">-- Pilih Kondisi --</option>
                                    <option value="Baik" {{ request('condition') === 'Baik' ? 'selected' : '' }}>Baik</option>
                                    <option value="Rusak" {{ request('condition') === 'Rusak' ? 'selected' : '' }}>Rusak</option>
                                    <option value="Tidak Lengkap" {{ request('condition') === 'Tidak Lengkap' ? 'selected' : '' }}>Tidak Lengkap</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                 <label for="end_date" class="form-label">''</label>
                                <button type="submit" class="form-control btn btn-primary">Cari</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                      <table class="table table-striped table-hover table-border">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lemari</th>
                                    <th>Nama Item</th>
                                    <th>Kondisi</th>
                                    <th>Lokasi Unit</th>
                                    <th>Lokasi Laci</th>
                                    <th>Terakhir Diperbarui</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($catalogs as $index => $catalog)
                                    <tr>
                                        <td>{{ $index + $catalogs->firstItem() }}</td>
                                        <td>{{ $catalog->lemari->nama_lemari ?? 'Tidak Diketahui' }}</td>
                                        <td>{{ $catalog->nama_alat }}</td>
                                        <td>
                                            @if ($catalog->kondisi_alat === 'Baik')
                                                <span class="badge bg-success">Baik</span>
                                            @elseif ($catalog->kondisi_alat === 'Rusak')
                                                <span class="badge bg-danger">Rusak</span>
                                            @else
                                                <span class="badge bg-warning">Tidak Lengkap</span>
                                            @endif
                                        </td>
                                        <td>{{ $catalog->lemari->lokasi_unit ?? 'Tidak Diketahui' }}</td>
                                        <td>{{ $catalog->lokasi_laci ?? 'Tidak Diketahui' }}</td>
                                        <td>{{ $catalog->updated_at->format('d-m-Y H:i') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Tidak ada data item ditemukan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $catalogs->links() }}
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