<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>AILA || Login</title>
  <!-- MDB icon -->
  <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- FACE-API.JS -->
  <script defer src={{asset('storage/js/face-api.min.js') }}></script>
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
  </style>

</head>

<body  style="background-color: #aaaaaa;">
  <!-- Start your project here-->
  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="card col-12">
          <label class="form-label">Login</label>
          <p id="wajah">disini</p>
          <div class="col-12">
                <video id="video" width="600" height="450" autoplay muted></video>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>