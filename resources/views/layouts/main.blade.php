<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/uikit.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <style>

        .b-example-divider {
          height: 3rem;
          background-color: rgba(0, 0, 0, .1);
          border: solid rgba(0, 0, 0, .15);
          border-width: 1px 0;
          box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }
      </style>
</head>
<body style="background-color:#eaeaea ; background-image:url(/img/bg.webp)">
    
    @include("partials/navbar")

    <div>
        @yield("container")
    </div>


  
      

    <div class="b-example-divider mt-4"></div>
      
  <div class="container-fluid ">
    <footer class="py-3 ">
      <ul class="nav justify-content-center border-bottom border-secondary pb-3 mb-3">
        <li class="nav-item"><a href="/" class="nav-link px-2 text-muted">Home</a></li>
        <li class="nav-item"><a href="/galeri" class="nav-link px-2 text-muted">Galeri</a></li>
        <li class="nav-item"><a href="/berita" class="nav-link px-2 text-muted">Berita</a></li>
      </ul>
      <p class="text-center text-muted">&copy; 2023 HIMPIKOM</p>
    </footer>
  </div>
  
  


{{-- <footer style="height: 300px; background-color: aquamarine;">
<h1>test</h1>
</footer>     --}}
{{-- <script src="/js/bootstrap.min.js"></script>
<script src="/js/bootstrap.bundle.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="/js/uikit.min.js"></script>

</body>
</html>