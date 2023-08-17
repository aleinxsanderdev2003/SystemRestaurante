<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yumi - Administración</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barlow:wght@100&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>
    @php
    use Carbon\Carbon;
@endphp

    @if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Bienvenido!',
            text: '{{ session('success') }}',
        });
    </script>
@endif

<script>
    Swal.fire({
        icon: 'success',
        title: '¡Bienvenido!',
        text: 'Inicio de sesión exitoso',
        toast: true,
        position: 'middle',
        showConfirmButton: false,
        timer: 2000
    });
</script><style>
     /* Estilos para el sidebar */
      #sidebar {
        width: 200px;
        height: 100vh;
        position: fixed;
        top: 0;
        left: -200px;
        background: #00B4DB;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #0083B0, #00B4DB);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #0083B0, #00B4DB); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        transition: left 0.3s ease-in-out;
    }

    #sidebar.show {
        left: 0;
    }

    /* Estilos para los elementos de lista */
    #sidebar ul {
        list-style: none; /* Quita el punto de lista */
        padding: 0;
        margin-top: 70px; /* Agrega margen superior */
    }

    #sidebar ul li {
        margin-bottom: 15px; /* Agrega margen inferior */
    }

    #sidebar ul li a {
        color: #fff; /* Color de texto blanco */
        text-decoration: none; /* Quita el subrayado */
        display: flex;
        align-items: center;
        padding: 10px;
        border-radius: 4px;
        transition: background-color 0.3s ease-in-out;
    }

    #sidebar ul li a i {
        margin-right: 10px; /* Agrega margen derecho al icono */
    }

    #sidebar ul li a:hover {
        background-color: #2980b9; /* Color de fondo azul más oscuro en hover */
    }
    /* Estilos para el botón */
    #sidebarToggle {
        position: fixed;
        top: 10px;
        left: 10px;
        z-index: 999;
    }
    .custom-button {
    background-color: #337ab7;
    color: #fff;
    border: none;
    padding: 8px 16px;
    border-radius: 4px;
    cursor: pointer;
}

.custom-button:hover {
    background-color: #23527c;
}


 /* Estilos para el botón de cerrar sesión */
 #sidebar ul li:last-child {
        margin-top: auto; /* Empuja el último elemento hacia abajo */
    }

    #sidebar ul li:last-child a {
        color: #fff;
        text-decoration: none;
        display: flex;
        align-items: center;
        padding: 10px;
        border-radius: 4px;
        transition: background-color 0.3s ease-in-out;
    }

    #sidebar ul li:last-child a i {
        margin-right: 10px;
    }

    #sidebar ul li:last-child a:hover {
        background-color: #a11313;
    }
     /* Estilos para el contenido principal */
     #content {
        margin-left: 200px; /* Ancho del sidebar */
        padding: 20px; /* Agrega un relleno para separar el contenido del borde */
    }
    .sidebar-container {
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    width: 200px; /* Ancho del sidebar */
    background-color: #333; /* Color de fondo del sidebar */
}


.inicio-container {
    height: 100vh;
    margin-left: 0;
    margin-right: 0;
    background-image: url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80');
    background-size: 100% 100%; /* Ajusta el tamaño del fondo para cubrir todo el espacio */
    background-position: center;
    background-repeat: no-repeat;
    opacity: 0.5;
    position: relative;
    z-index: -1;
}



.date-time {
    border-radius: 20px;
    background: white;
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: #000000;
    font-size: 48px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Sombra de texto para mayor legibilidad */
}

</style>

<div class="sidebar-container">
    <div id="sidebar">
        <div class="button-group">
            <button class="custom-button" id="sidebarToggle">
                <i class="fas fa-expand"></i>
            </button>
            <!--<button class="custom-button" id="fullscreenToggle">
                <i class="fas fa-expand-arrows-alt"></i>
            </button>-->
        </div>
<!--
        <script>
            const fullscreenToggle = document.getElementById('fullscreenToggle');

            fullscreenToggle.addEventListener('click', function() {
                if (document.documentElement.requestFullscreen) {
                    document.documentElement.requestFullscreen();
                } else if (document.documentElement.mozRequestFullScreen) { // Firefox
                    document.documentElement.mozRequestFullScreen();
                } else if (document.documentElement.webkitRequestFullscreen) { // Chrome, Safari y Opera
                    document.documentElement.webkitRequestFullscreen();
                } else if (document.documentElement.msRequestFullscreen) { // Internet Explorer/Edge
                    document.documentElement.msRequestFullscreen();
                }
            });
        </script>
    -->
    <style>
        .dropdown-menu {
    background-color: #000203; /* Cambia el color de fondo a tu preferencia */
}
.dropdown-menu {
    margin-top: 0.2rem;
    margin-left: 0;
    padding: 0.5rem 0;
}

.dropdown-menu .dropdown-item {
    color: #333; /* Cambia el color del texto a tu preferencia */
}

    </style>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="{{ route('administracion.main') }}" class="nav-link">
                <i class="fas fa-home"></i>
                Inicio
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('administracion.usuario') }}" class="nav-link">
                <i class="fas fa-user"></i>
                Administrar Usuarios
            </a>
        </li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <i class="fas fa-box"></i>
                Productos
            </a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('administracion.productos') }}" class="dropdown-item"><i class="fas fa-utensils"></i>Platos</a></li>
                <li><a href="{{route('administracion.clasificacion_productos')}}" class="dropdown-item"><i class="fas fa-tags"></i>Clasificación</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{ route('administracion.logo') }}" class="nav-link">
                <i class="fas fa-cogs"></i>
                Configuración de logo
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('administracion.contacto')}}" class="nav-link">
                <i class="fas fa-clock"></i>
                Configuración de información
            </a>
        </li>
        <!-- Agrega más elementos de menú según tus necesidades -->
        <li class="nav-item">
            <a href="{{ route('restaurante.menu') }}" class="nav-link">
                <i class="fas fa-sign-out-alt"></i>
                Cerrar sesión
            </a>
        </li>
    </ul>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.dropdown-toggle').click(function(e) {
                e.preventDefault();
                $(this).next('.dropdown-menu').slideToggle();
            });
        });
    </script>


    </div>
</div>

<!-- Coloca el botón en otro lugar, por ejemplo, al final del contenido principal -->
<!-- Coloca el botón en otro lugar, por ejemplo, al final del contenido principal -->
<div id="content" class="content-with-sidebar d-flex flex-column">
    <!-- Contenido de las diferentes vistas -->
    <main class="py-4">
        @if(Route::currentRouteName() === 'administracion.main')
        <div class="inicio-container">
            <div class="background-image"></div>
            <div class="date-time">
                <h1 class="display-1">{{ date('H:i') }}</h1>
                @php
                setlocale(LC_TIME, 'es_ES.UTF-8');
                $date = \Carbon\Carbon::now()->locale('es_ES')->isoFormat('DD [de] MMMM, YYYY');
                @endphp
                <h2 class="display-5">{{ $date }}</h2>
            </div>
        </div>
        @endif
        @yield('content')
    </main>

    <footer class="footer mt-auto py-3 bg-dark">
        <div class="container text-center">
            <span class="text-white">© {{ date('Y') }} Todos los derechos reservados - Restaurante Administración</span>
        </div>
    </footer>
</div>



<script>
    // Script para mostrar/ocultar el sidebar al hacer clic en el botón
    document.getElementById('sidebarToggle').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('show');
    });
</script>

</body>
</html>
