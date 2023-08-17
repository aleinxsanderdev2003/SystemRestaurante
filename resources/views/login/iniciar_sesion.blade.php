<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar Sesion</title>
    <link rel="icon" href="img/logos/logo.png?v={{ uniqid() }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ----------><link rel="stylesheet" href="{{ asset('sweetalert2/dist/sweetalert2.min.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
</head>
<body>
    <!-- En tu vista de inicio de sesión -->

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Bienvenido!',
            text: '{{ session('success') }}',
        });
    </script>
@endif




@php
    $logo = $logo ?? null; // Asegurar que la variable $logo esté definida
@endphp

    <div class="container">
        <div class="card card-login mx-auto text-center" style="background: linear-gradient(rgba(0, 0, 0, 0.7),rgba(197, 197, 197, 0.6))">
            <div class="card-header mx-auto">
                <h3 class="text-center">INICIAR SESIÓN</h3>
                <span>
                    <img src="img/logos/logo.png" class="w-75" alt="ERROR AL CARGAR">

                </span><br/>
                            <span class="logo_title mt-5"> ADMINISTRACIÓN </span>
    <!--            <h1>--><?php //echo $message?><!--</h1>-->

            </div>
            <div class="card-body">
                <form action="{{ route('login') }}" method="post">
                    @csrf

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="email" class="form-control" placeholder="Usuario">
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="password" class="form-control" placeholder="Clave">
                    </div><br>

                    <div class="form-group">
                        <input type="submit" name="btn" value="Iniciar Sesión" class="btn btn-primary float-right login_btn">
                        <a href="{{route('restaurante.menu')}}" class="regresar-link">Regresar</a>
                      </div>

                </form>
            </div>
        </div>
    </div>
    <style>
        /* Estilo para el enlace de "Regresar" */
        .regresar-link {
          display: inline-block;
          padding: 8px 15px;
          background-color: #1b1b1b; /* Color de fondo azul */
          color: #fff; /* Color del texto blanco */
          text-decoration: none; /* Sin subrayado */
          border-radius: 5px; /* Bordes redondeados */
        }

        .regresar-link:hover {
          background-color: #921d00; /* Color de fondo azul más oscuro al pasar el mouse */
        }

        .regresar-link:active {
          background-color: #003e80; /* Color de fondo azul más oscuro al hacer clic */
        }
      </style>
    <style>
        body{

        background: url("https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80") no-repeat center center fixed;
        background-size: cover;

        }
        .card {
            border: 1px solid #3C4858;
        }
        .card-login {
            margin-top: 130px;
            padding: 18px;
            max-width: 30rem;
        }

        .card-header {
            color: #fff;
            /*background: #ff0000;*/
            font-family: sans-serif;
            font-size: 20px;
            font-weight: 600 !important;
            margin-top: 10px;
            border-bottom: 0;
        }

        .input-group-prepend span{
            width: 50px;
            background-color: #3C4858;
            color: #fff;
            border:0 !important;
        }

        input:focus{
            outline: 0 0 0 0  !important;
            box-shadow: 0 0 0 0 !important;
        }

        .login_btn{
            width: 130px;
        }

        .login_btn:hover{
            color: #fff;
            background-color: black;
        }

        .btn-outline-danger {
            color: #fff;
            font-size: 18px;
            background-color: #3C4858;
            background-image: none;
            border-color: #3C4858;
        }

        .form-control {
            display: block;
            width: 100%;
            height: calc(2.25rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 1.2rem;
            line-height: 1.6;
            color: #000000;
            background-color: transparent;
            background-clip: padding-box;
            border: 1px solid white;
            border-radius: 0;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .input-group-text {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding: 0.375rem 0.75rem;
            margin-bottom: 0;
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1.6;
            color: #495057;
            text-align: center;
            white-space: nowrap;
            background-color: #e9ecef;
            border: 1px solid #ced4da;
            border-radius: 0;
        }
    </style>
</body>
</html>
