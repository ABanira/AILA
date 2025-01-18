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