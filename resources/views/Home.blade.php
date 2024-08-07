<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="{!! asset('css/styles.css') !!}">
    <title>Hello, world!</title>
  </head>
  <style>
     body {
      background-color: white; /* Fondo blanco predeterminado */
    }
    #mensaje-celular {
      display: none; /* Ocultar el mensaje inicialmente */
      text-align: center;
      margin-top: 20px;
      font-size: 18px;
      font-weight: bold;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      background-color: #007bff;
      color: white;
      padding: 10px 0;
      z-index: 1000; /* Asegura que esté por encima de otros elementos */
    }
    @media (max-width: 767px) {
      body {
        background-color: #f0f0f0; /* Cambiar fondo a gris claro en dispositivos móviles */
      }
    }
  </style>
  <body>
  <div id="mensaje-celular" class="alert alert-info">
    Esta aplicación es visible solo mediante celular.
  </div>
  <div class="container-fluid p-0 bg-image">

  <div class="row justify-content-center align-items-end h-100">
    <div class="col-10 text-center text-white">
      <h1 class="display-4">Namaiwajana</h1>
      <p class="lead">Conoce nuestra historia <br> Pirraja Wakaipa</p>
      <a href="{{ route('inicio', ['nombre_comunidad' => 'Pausayu']) }}" class="btn btn-orange btn-lg mb-5">Continuar</a>
    </div>
  </div>
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
    <script>
  $(document).ready(function() {
    // Verificar si se está visualizando desde un celular
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
      // Mostrar el mensaje para dispositivos móviles
      
    }else{
      $('#mensaje-celular').show();
    }
  });
</script>
  </body>
</html>