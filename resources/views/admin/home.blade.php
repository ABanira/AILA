<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>{{$title}}</title>
</head>
<body>
   <div class="container">
    <div class="mt-5">
    <h1>Halo Admin</h1> 
    <div class="table-responsive">
        <form method="GET">
            <div class="input-group mb-3">
                <input type="text" name="lemari_nama" value="{{$cari}}" class="form-control" placeholder="Nama lemari" aria-label="Nama lemari" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari..</button>
              </div>
        </form>
        <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>unit</th>
            <th>ip</th>
            <th>Actiom</th>
          </tr>
        </thead>
        <tbody class="table-grup-divider">
            @if ($data->count() == 0)
            <tr>
                <td colspan="5" class="text-center">Data <strong>{{$cari}}</strong> tidak Ditemukan </td>
            </tr>                
            @endif
            @foreach ($data as $item)
          <tr>
            <td>{{ ($data ->currentpage()-1) * $data ->perpage() + $loop->index + 1 }}</td>
            <td> {{$item->lemari_nama}}</td>
            <td> {{$item->lemari_unit}}</td>
            <td>{{$item->lemari_ip}}</td>
            <td>Edit || Delete</td>
          </tr>
        </tbody>
          @endforeach
        </table>
      </div>
      {{ $data->links() }}
    </div>
   </div>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>