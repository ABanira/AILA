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
              </div>
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