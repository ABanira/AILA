<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>AILA || APLIKASI INTERNET OF THINK LOKER ALAT </title>
  <!-- MDB icon -->
  <link rel="icon" href={{asset('storage/img/logo.png') }} type="image/x-icon" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <!-- MDB -->
  <link rel="stylesheet" href={{asset('storage/css/bootstrap-login-form.min.css') }} />
</head>

<body>
  <!-- Start your project here-->

  <style>
    .divider:after,
    .divider:before {
      content: "";
      flex: 1;
      height: 1px;
      background: #eee;
    }
  </style>
  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img src="{{asset('storage/img/logo.png') }}" class="img-fluid" alt="Phone image">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
            <div class="divider d-flex align-items-center my-4">
              <p class="text-center fw-bold mx-3 mb-0 text-muted">AILA</p>
            </div>
            <div class="divider d-flex align-items-center my-4">
              <p class="text-center fw-bold mx-3 mb-0 text-muted">Alat Pintar Membuat Semuanya Jadi Sederhana</p>
            </div>
            
            {!! auth()->check() ? '<a class="btn btn-primary btn-lg btn-block" style="background-color: #2D2B70" href="/'.auth()->user()->role.'" role="button"><i class="fa-solid fa-right-to-bracket"></i> Halaman '.auth()->user()->role.' '.auth()->user()->unit_kerja.'</a>' : '<a class="btn btn-primary btn-lg btn-block" style="background-color: #2b4870" href="/login" role="button"><i class="fa-solid fa-right-to-bracket"></i> Masuk dengan Password </a>' !!}
            {!! auth()->check() ? '<a class="btn btn-primary btn-lg btn-block" style="background-color: #F26924" href="/logout" role="button"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>' : '<a class="btn btn-primary btn-lg btn-block" style="background-color: #2495f2" href="/face" role="button"><i class="fa-solid fa-camera"></i> Masuk Dengan Wajah</a>' !!}
        </div>
      </div>
    </div>
  </section>
  <!-- End your project here-->

  <!-- MDB -->
  <script defer src={{asset('storage/js/mdb.min.js') }}></script>
</body>

</html>