<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>AILA || Login</title>
  <!-- MDB icon -->
  <link rel="icon" href={{asset('storage/img/logo.png') }} type="image/x-icon" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- FACE-API.JS -->
  <script defer src={{asset('storage/js/face-api.min.js') }}></script>
  
  <script>
        // Mengirimkan data NIPP dari PHP ke JavaScript
        const nippList = @json($nippList);
    </script>

  <script defer src={{asset('storage/js/script.js')  }}></script>
  
  <style>
    body {
      font-family: Arial, sans-serif;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      background-color: #f4f4f9;
      margin: 0;
    }
    
canvas {
    position: absolute;
}
    video {
      border: 1px solid #ddd;
      border-radius: 8px;
      margin-top: 20px;
    }
    h2 {
      color: #333333;
    }
    #countdown-overlay { 
      display: none;
       position: absolute;
       top: 0;
       left: 0;
       width: 100%;
       height: 100%;
       background: rgba(0, 0, 0, 0.5);
       z-index: 10;
       display: flex;
       justify-content: center;
       align-items: center;
       color: white;
       font-size: 1.5em;
     }
  </style>

</head>

<body  style="background-color: #aaaaaa;">
  <!-- Start your project here-->
  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="card col-12">
          <hr class="my-2">
            <a href="/login" class="btn btn-sm btn-block shadow-lg p-3 mb-2" style="color: green;background-color: transparent;">
              <i class="fa fa-key"></i> Masuk Menggunakan Password</a>
          <div class="col-12">
            <div style="position: relative; display: inline-block;">
              <video id="video" autoplay muted width="600" height="450" ></video>
              <div id="loading-overlay" style="
                  display: none;
                  position: absolute;
                  top: 0;
                  left: 0;
                  width: 100%;
                  height: 10%;
                  background: rgba(0, 0, 0, 0.5);
                  z-index: 10;
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  color: white;
                  font-size: 1.5em;
              ">
                  Loading...
              </div>
            </div>
          </div>
          <hr class="my-2">

        </div>
      </div>
    </div>
  </section>
</body>

</html>