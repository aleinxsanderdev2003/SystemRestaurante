@extends('menu.app')

@section('content')
    <!-- Contenido específico de la página de ubicación -->
    <h1>Ubicación</h1>
    <p>Información de ubicación de la empresa:</p>
    <p>Logo de empresa Flinker</p>
    <p>1600, Amphitheatre Pkwy 94043, Mountain View, CA</p>
    <p>5525279273</p>
    <p>Horarios:</p>
    <ul>
        <li>Lunes: 08:00 am - 9:00 pm</li>
        <li>Martes: 08:00 am - 9:00 pm</li>
        <li>Miércoles: 08:00 am - 9:00 pm</li>
        <li>Jueves: 08:00 am - 9:00 pm</li>
        <li>Viernes: 08:00 am - 9:00 pm</li>
        <li>Sábado: 08:00 am - 9:00 pm</li>
        <li>Domingo: 08:00 am - 9:00 pm</li>
    </ul>

    <a href="#" class="ubicacion-link">Ver ubicación y horarios</a>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('.ubicacion-link').addEventListener('click', function() {
                Swal.fire({
                    title: 'Ubicación y horarios',
                    html: `
                        <h2>Ubicación</h2>
                        <p>Logo de empresa Flinker</p>
                        <p>1600, Amphitheatre Pkwy 94043, Mountain View, CA</p>
                        <p>5525279273</p>
                        <h2>Horarios</h2>
                        <ul>
                            <li>Lunes: 08:00 am - 9:00 pm</li>
                            <li>Martes: 08:00 am - 9:00 pm</li>
                            <li>Miércoles: 08:00 am - 9:00 pm</li>
                            <li>Jueves: 08:00 am - 9:00 pm</li>
                            <li>Viernes: 08:00 am - 9:00 pm</li>
                            <li>Sábado: 08:00 am - 9:00 pm</li>
                            <li>Domingo: 08:00 am - 9:00 pm</li>
                        </ul>
                    `,
                    showCloseButton: true,
                    showConfirmButton: false
                });
            });
        });
    </script>
@endsection
