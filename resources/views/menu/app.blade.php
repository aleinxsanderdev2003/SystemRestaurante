<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yumi - Restaurante</title>
    <link rel="icon" href="img/logos/logo.png?v={{ uniqid() }}" type="image/png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@800&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Chela+One&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Carter+One&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <script>
        $(document).ready(function() {
          $('.navbar-toggler').click(function() {
            $('#navbarNav').collapse('toggle');
          });
        });
      </script>

    <style>

        .bg__container2 {
            background: linear-gradient(rgb(0, 0, 0, 0.6), rgb(0, 0, 0, 0.7)), url("https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80") no-repeat center center fixed;
            background-size: cover;
            height: 400px;
        }


        .texto {
            position: absolute;
            top: 20%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .navbar.scrolled {
            background-color: white;
        }
    </style>
    <div class="bg__container2">
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{route('layouts.app')}}">
                  YUMI
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link ubicacion-link" href="#"><i class="fas fa-map-marker-alt"></i>
                                Yumi</a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link ubicacion-link" href="{{route('usuario.login')}}"><i class="fas fa-user-alt"></i>
                                Iniciar Sesion</a>
                        </li>

                    </ul>

                </div>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('restaurante.orden')}}"><i class="fas fa-shopping-cart"></i> Pedido</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="texto" id="home">
            <h2 class="text-white" style="font-family: 'Playfair Display', serif;">Nuestra Carta</h2>
        </div>
    </div>
    <style>
        .comidas__clasi {
            font-family: 'Playfair Display', serif;
            font-size: 25px;
          color: rgb(15, 28, 70); /* Cambiar el color del texto */
          text-decoration: none; /* Eliminar subrayado del enlace */
          transition: color 0.3s ease; /* Agregar transición de color */
        }

        .comidas__clasi:hover {
          color: #00ff00; /* Cambiar el color del texto al pasar el cursor */
        }
      </style>
<style>
    .menu-link {
        font-family: 'Carter One', cursive;
        text-decoration: none;
        color: #333;
        transition: color 0.3s;
        display: block;
        padding: 8px 16px;
        border: 2px solid #333;
        border-radius: 5px;
        text-align: center;
    }

    .menu-link:hover {
        transition: 0.8s;
        color: #eaeaea;
        background-color: #000000;
    }

    .menu-link h6 {
        margin-bottom: 10px;
    }

    .menu-link hr {
        border-color: #333;
        margin-top: 15px;
        margin-bottom: 15px;
    }
</style>

<div class="container" style="margin-top:20px;">
    <div class="row">
        @foreach($clasificaciones as $clasificacion)
        <div class="col-lg-4 mb-4">
            <h6 class="text-center">
                <a href="#seccion_{{ $clasificacion->nombre }}" class="menu-link comidas__clasi">
                    {{ $clasificacion->nombre }}
                </a>
            </h6>
            <hr>
            <!-- Aquí puedes agregar los platos correspondientes a cada clasificación -->
        </div>
        @endforeach
    </div>
</div>



<div class="container mt-5" >
    <div class="card" >
      <div class="card-body">
        <div class="text-center" style="background: rgb(12, 12, 12)">
          <h2 style="font-family: 'Carter One', cursive;" class="text-white">LISTA DE PLATOS</h2>
        </div>
        <hr>



        <div class="col-md-12 ml-auto mr-auto" style="margin-top: -10px;">
            @php
                $categorias = [];
            @endphp

            @foreach ($platos as $plato)
                @php
                    $categoriaNombre = $plato->clasificacion->nombre;
                    $categorias[$categoriaNombre][] = $plato;
                @endphp
            @endforeach

            <style>
  .menu-card {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .menu-card:hover {
        transform: translateY(-5px);
    }

    .menu-image {
        width: 160px;
        height: 160px;
        flex-shrink: 0;
    }

    .menu-image img {
        object-fit: cover;
        width: 100%;
        height: 100%;
    }

    .menu-details {
        padding: 20px;
    }

    .menu-title {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .menu-description {
        font-size: 16px;
        margin-bottom: 10px;
    }

    .menu-price {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .menu-add-button {
        background-color: #253ed1;
        border: none;
        color: white;
        padding: 8px 15px;
        font-size: 14px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .menu-add-button:hover {
        background-color: #209c10;
    }
            </style>

<div class="col-md-12 ml-auto mr-auto" style="margin-top: -10px;">
    @foreach ($categorias as $categoriaNombre => $platosCategoria)
        <div id="seccion_{{ $categoriaNombre }}" class="menu-section">
            <h3 class="menu-title ">{{ $categoriaNombre }}</h3>

        </div>
        <style>
            .menu-section {
                background: linear-gradient(to right, #f12711, #f5af19);
                padding: 20px;
                margin-bottom: 20px;
                border-radius: 5px;
            }

            .menu-title {
                font-size: 36px;
                color: #ffffff;
                text-transform: uppercase;
                margin-bottom: 10px;
            }

            .menu-title::after {
                content: "";
                display: block;
                width: 80px;
                height: 4px;
                background-color: #ffffff;
                margin-top: 10px;
            }
            .menu__plato{
                color: rgb(207, 0, 0);
            }
        </style>
<!-- Agregar el siguiente script al final de la vista -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Resto del código JavaScript

    @if(session('success'))
        // Mostrar SweetAlert2 con el mensaje de éxito
        Swal.fire({
            icon: 'success',
            title: 'Producto agregado al carrito',
            text: '{{ session('success') }}',
            timer: 3000, // Mostrar la alerta durante 3 segundos
            timerProgressBar: true,
            showConfirmButton: false
        });
    @endif

    function agregarAlCarrito(nombre, precio) {
        // Resto del código AJAX
        // ...
    }
</script>

        @foreach ($platosCategoria as $plato)
        <div class="menu-card">
            <div class="menu-image">
                <img src="{{ asset($plato->imagen) }}" alt="{{ $plato->nombre }}">
            </div>
            <div class="menu-details">
                <h5 class=" nombre__plato">{{ $plato->nombre }}</h5>
                <p class="menu-description">{{ $plato->descripcion }}</p>
                <p class="menu-price"><b>$ {{ $plato->precio }}</b></p>
                <form action="{{ route('orden.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="nombre" value="{{ $plato->nombre }}">
                    <input type="hidden" name="precio" value="{{ $plato->precio }}">
                    <button type="submit" class="menu-add-button">
                        <i class="fas fa-plus"></i> Agregar
                    </button>
                </form>
            </div>
        </div>


    @endforeach

                @endforeach
            </div>

        </div>



    </div>

</div>
</div>


<!--OTRO TIPO DE COMIDA -->








<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('.ubicacion-link').addEventListener('click', function(event) {
            event.preventDefault(); // Evita que el enlace redireccione

            // Realizar solicitud AJAX para obtener los datos de contacto
            fetch('{{ route("contacto.obtener") }}')
                .then(response => response.json())
                .then(data => {
                    const direccion = data.direccion ?? '';
                    const telefono = data.telefono ?? '';
                    const horario_semana = data.horario_semana ?? '';
                    const horario_fin_semana = data.horario_fin_semana ?? '';

                    Swal.fire({
                        title: '',
                        html: `
                            <div class="text-center">
                               <strong>YUMI</strong>
                            </div>

                            <div class="text-center">
                                <p class="lead">
                                    <i class="fas fa-map-marker-alt"></i> ${direccion}
                                </p>
                                <p>
                                    <i class="fas fa-phone"></i> ${telefono}
                                </p>
                            </div>
                            <h2 class="text-center lead"><b>Horarios</b></h2>
                            <ul class="list-unstyled">
                                <li>Lunes: ${horario_semana}</li>
                                <li>Martes: ${horario_semana}</li>
                                <li>Miércoles: ${horario_semana}</li>
                                <li>Jueves: ${horario_semana}</li>
                                <li>Viernes: ${horario_semana}</li>
                                <li>Sábado: ${horario_fin_semana}</li>
                                <li>Domingo: ${horario_fin_semana}</li>
                            </ul>
                        `,
                        showCloseButton: true,
                        showConfirmButton: false
                    });
                })
                .catch(error => {
                    console.error(error);
                });
        });
    });
</script>


</body>

</html>
