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