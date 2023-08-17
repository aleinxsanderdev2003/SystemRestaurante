<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@800&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="icon" href="img/logos/logo.png?v={{ uniqid() }}" type="image/png">
    <link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>Yumi - Restaurante</title>
</head>
<body>
    <style>
         .bg__container {
        background: linear-gradient(rgb(0,0,0,0.6),rgb(0,0,0,0.7)), url("https://images.unsplash.com/photo-1414235077428-338989a2e8c0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80") no-repeat center center fixed;
        background-size: cover;
        height: 700px;

    }
    .texto {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }
    .navbar.scrolled {
    background-color: transparent;
}

    </style>
    <script>
        $(document).ready(function() {
          $('.navbar-toggler').click(function() {
            $('#navbarNav').collapse('toggle');
          });
        });
      </script>

<div class="bg__container">
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img  src="img/logos/logo.png" width="30" height="30" class="d-inline-block align-top" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div   class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('layouts.app')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contacto">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('restaurante.menu')}}">Menú</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fab fa-facebook-f"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fab fa-twitter"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fab fa-instagram"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
@yield('content')
<script>
    $(window).scroll(function() {
    if ($(this).scrollTop() > 0) {
        $('.navbar').addClass('scrolled');
    } else {
        $('.navbar').removeClass('scrolled');
    }
});

</script>
<div class="texto" id="home">
    <h4 class="text-white" style="font-family: 'Playfair Display', serif;"></h4>
    <h3 class="text-white" style="font-family: 'Quicksand', sans-serif;">Restaurante</h3>
    <a href="{{route('restaurante.menu')}}" class="btn text-white"  style="font-family: 'Quicksand', sans-serif; font-size:15px;background: linear-gradient(to right, #f12711, #f5af19);">Ordenar</a>
</div>
</div><style>
    .info-container {
        background-color: black;
        color: white;
        padding: 20px;
    }

    .info-container h3 {
        margin-bottom: 10px;
    }
</style>
<!--Info del restaurante-->
<div style="background: rgb(2, 2, 2); margin-top:-50px;" >
    <div class="container my-5" style="padding:20px">
    <div class="row"  style="background: white;">
      <div class="col-md-4 mb-4 " >
        <img  src="img/logos/logo.png" alt="Logo de la empresa" class="img-fluid">
      </div>
      <div class="col-md-8" style=" background: linear-gradient(to right, #f12711, #f5af19);">
        <h1 class="mb-4 text-white text-center"  style="font-family: 'Playfair Display', serif;">Restaurante</h1>
        <hr class="text-white">
        <p></p>

        <h5 class="mt-5 mb-4 text-white">   <i class="fas fa-utensils"></i> ¡Bienvenido!   <i class="fas fa-utensils"></i></h5>
        <p class="mt-5 mb-4 text-white">Ofrecemos una amplia variedad de platos deliciosos para comenzar el día con energía. Además, contamos con una selección de bebidas que
            incluye café, té, jugos naturales y más. También ofrecemos opciones para otros momentos del día, como almuerzos ligeros, snacks saludables y postres deliciosos. ¡Y no olvides que
            puedes realizar pedidos para llevar o entrega a domicilio para disfrutar de nuestra comida en la comodidad de tu hogar! ¡Te esperamos para brindarte una experiencia
            culinaria única!"</p>

      </div>
    </div>
  </div>
</div>

<!--CARD INFO DEL RESUTANTE-->
<div class="card bg-white bg-opacity-75 text-center" id="contacto">
    <div class="card-body" style="">
        <h5 class="card-title">Restaurante</h5>
        <p class="lead">La mejor comida la encuentras aquí.</p>
        <hr>
        <h5 class="card-title">Sucursales</h5>
        @if(isset($sucursal))
            <p class="card-text"><i class="fas fa-map-marker-alt"></i> {{ $sucursal->direccion }}</p>
        @else
            <p class="card-text">Dirección no disponible</p>
        @endif
        <hr>
        <h5 class="card-title">Horario de Atención</h5>
        @if(isset($sucursal))
            <p class="card-text">Lunes a Viernes: {{ $sucursal->horario_semana }}</p>
            <p class="card-text">Sábados y Domingos: {{ $sucursal->horario_fin_semana }}</p>
        @else
            <p class="card-text">Horario no disponible</p>
        @endif
        <hr>
        @if(isset($sucursal))
            <p class="card-text">Teléfono: {{ $sucursal->telefono }}</p>
        @else
            <p class="card-text">Teléfono no disponible</p>
        @endif
    </div>
</div>


<div class="bg-black text-white text-center">

&copy; 2023 - Todos los derechos reservados (Desarrollado por Gimmick)

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>
