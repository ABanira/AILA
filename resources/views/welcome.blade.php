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
            : '<a href="/login">
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
      <!-- Page Title -->
      <section
        id="hero"
        class="hero section dark-background">
        <img
          src="{{asset('storage/img/balaiyasamanggarai.jpeg')}}"
          alt=""
          data-aos="fade-in"
          class="" />

        <div
          class="container"
          data-aos="fade-up"
          data-aos-delay="100">
          <h2>AILA</h2>
          <p>
            ->
            <span
              class="typed"
              data-typed-items="Automatic, Inventory, Logger, Access"
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
      ><i class="bi bi-arrow-up-short"></i
    ></a>

@extends('template.footer')