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
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
 
                    <h2>You are a Admin User.</h2>
                    <div class="user-info">
                        <p>Halo, {{ auth()->user()->name ?? 'Tamu' }}</p>
                        <p>NIPP : {{ auth()->user()->nipp ?? 'Tamu' }}</p>
                        <p>Role : {{ auth()->user()->role ?? 'Tidak diketahui' }}</p>
                    </div>
                    <a href="/user">List User</a>
                    <hr>
                    <a href="/lemari">List Lemari alat</a>
                    <hr>
                    <a href="/loglemari">Riwayat Buka Laci</a>
                    <hr>
                    <a href="/kondisialat">Kondisi Alat</a>
                    <hr>
                    <a href="/logout">logout</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
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
           <a href="/user">List User</a>
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
      <section
        id="hero"
        class="hero section dark-background">
        <img
          src="{{ asset('storage/labels/' . auth()->user()->nipp . '/1.png') }}" 
     onerror="this.onerror=null; this.src='{{ asset('storage/img/defaultuser.png') }}';"
          alt="Label Image"
          data-aos="fade-in"
          class="" />

        <div
          class="container"
          data-aos="fade-up"
          data-aos-delay="100">
          <h2>{{ auth()->user()->name}}</h2>
          <p>
            ->
            <span
              class="typed"
              data-typed-items="{{ auth()->user()->name}}, {{ auth()->user()->nipp}}, {{ auth()->user()->role}}"
              >Automatic Inventory Logger Access</span
            ><span
              class="typed-cursor typed-cursor--blink"
              aria-hidden="true"></span
            ><span
              class="typed-cursor typed-cursor--blink"
              aria-hidden="true"></span>
          </p>
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
