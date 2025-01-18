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

<body  style="background-color: #aaaaaa;">
  <!-- Start your project here-->
  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
              <img src="{{asset('storage/img/logo.png') }}" alt="logo"  width="230px" height="151px" >

              <!-- Start form login-->  
              <form action="login" method="post">
                @csrf
                <div class="form-outline mb-2">
                  <input type="number" id="typeEmailX-2" class="form-control form-control-lg shadow-lg p-3 mb-5 bg-body rounded" name="nipp"/>
                  <label class="form-label" for="typeEmailX-2">NIPP</label>
                </div>
                <div class="form-outline mb-2">
                  <input type="password" id="typePasswordX-2" class="form-control form-control-lg shadow-lg p-3 mb-5 bg-body rounded"  name="password"/>
                  <label class="form-label" for="typePasswordX-2">Password</label>
                </div>
                <button class="btn btn-primary btn-lg btn-block shadow-lg p-3 mb-2" type="submit">MASUK</button>
                <hr class="my-3">
                <a href="/face" class="btn btn-sm" style="color: green;background-color: transparent;"><i class="fa fa-camera"></i> Masuk Menggunakan Wajah</a>
            </form>
         
             <!-- Pesan Error-->
             @if (session('message'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End your project here-->

  <!-- MDB -->
  <script defer src={{asset('storage/js/mdb.min.js') }}></script>

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
            {!! auth()->check() ? '
            <a href="/'.auth()->user()->role.'">
            <i class="fa-solid fa-right-to-bracket"></i> Halaman '.auth()->user()->role.' '.auth()->user()->unit_kerja.'</a>' 
            : '<a href="/login" class="active">
            <i class="bi bi-key navicon"></i>Login</a>' 
            !!}
            
          </li>
          <li>
            {!! auth()->check() ? '
            <a href="/logout" >
            <i class="fa-solid fa-right-from-bracket"></i> Logout</a>' 
            : '<a href="/face" role="button">
              <i class="bi bi-camera navicon"></i> face recognition
            </a>' !!}
          </li>
        </ul>
      </nav>
    </header>

    <main class="main">
      
        <section id="contact" class="contact section">

          <!-- Section Title -->
          <div class="container section-title" data-aos="fade-up">
            <h2>Login</h2>
            <p>Silahkan masukan Nipp dan Password anda</p>
          </div><!-- End Section Title -->

          <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

              <div class="col-lg-7">
                
                <form action="login" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                  @csrf
                  <div class="row gy-4">

                    <div class="col-md-12">
                      <label for="name-field" class="pb-2">NIPP</label>
                      <input type="number" name="nipp" id="name-field" class="form-control" required="">
                    </div>
                  </div>
                  <div class="row gy-4">

                    <div class="col-md-12">
                      <label for="password-field" class="pb-2">Password</label>
                      <input type="password" class="form-control" name="password" id="password-field" required="">
                    </div>

                    <div class="col-md-12 text-center">
                      <button class="" type="submit">MASUK</button>
                    </div>

                  </div>
                </form>
              </div><!-- End Contact Form -->

            </div>

          </div>

        </section><!-- /Contact Section -->

    </main>

    <!-- Scroll Top -->
    <a
      href="#"
      id="scroll-top"
      class="scroll-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i
    ></a>

@extends('template.footer')
>>>>>>> a68b19f (add tempalate boostrap for WebApp)
