@extends('administracion.main')

@section('content')
<div class="card text-white bg-danger">
    <div class="card-body">
        <h5 class="card-title">Advertencia</h5>
        <p class="card-text">Antes de eliminar la clasificación, asegúrate de eliminar todos los productos asociados a ella.</p>
    </div>
</div>

<style>
    .card {
      border: none;
      background-color: #F8F9FA;
      padding: 30px;
    }

    .card-header {
      font-size: 24px;
      font-weight: bold;
      color: #333;
      background-color: #0069D9;
      color: #FFFFFF;
    }

    .card-body {
      padding: 0;
    }

    .card-body form {
      padding: 20px;
    }

    .card-body form .form-group {
      margin-bottom: 20px;
    }

    .card-body form label {
      font-size: 18px;
      color: #333;
    }

    .card-body form input[type="text"] {
      font-size: 16px;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 4px;
    }

    .card-body form button[type="submit"] {
      background-color: #0069D9;
      color: #FFFFFF;
      border: none;
      padding: 10px 20px;
      font-size: 18px;
    }

    .card-body form button[type="submit"]:hover {
      background-color: #005cbf;
    }

    .table {
      margin-bottom: 0;
    }

    .table thead th {
      font-size: 16px;
      font-weight: bold;
      color: #333;
      background-color: #0069D9;
      color: #FFFFFF;
      border-top: none;
    }

    .table tbody td {
      font-size: 16px;
      color: #333;
    }

    .table tbody .btn {
      padding: 5px 10px;
      font-size: 14px;
      margin-right: 5px;
    }

    .btn-editar {
      background-color: #17A2B8;
      color: #FFFFFF;
      border: none;
    }

    .btn-editar:hover {
      background-color: #138496;
    }

    .btn-eliminar {
      background-color: #DC3545;
      color: #FFFFFF;
      border: none;
    }

    .btn-eliminar:hover {
      background-color: #c82333;
    }

    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Agregar Clasificación de Platos</div>

                    <div class="card-body">
                        <form action="{{ route('administracion.clasificacion_productos.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Lista de Clasificaciones de Platos</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach ($clasificaciones as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nombre }}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-editar" data-id="{{ $item->id }}" data-nombre="{{ $item->nombre }}">Editar</a>


                                        <form action="{{ route('administracion.clasificacion_productos.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-eliminar" data-id="{{ $item->id }}">Eliminar</button>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Script para editar clasificación de plato --><!-- Script para editar clasificación de plato -->
<script>
    // Editar clasificación de plato
// Editar clasificación de plato
$('.btn-editar').click(function() {
    var id = $(this).data('id');
    var nombre = $(this).data('nombre');

    Swal.fire({
        title: 'Editar Clasificación de Plato',
        html: `
            <form id="editar-clasificacion-form" action="{{ route('administracion.clasificacion_productos.update', '') }}/${id}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="${nombre}" required>
                </div>
            </form>
        `,
        showCancelButton: true,
        confirmButtonText: 'Guardar',
        cancelButtonText: 'Cancelar',
        preConfirm: () => {
            $('#editar-clasificacion-form').submit();
        }
    });
});

</script>

<script>
   // Eliminar clasificación de plato
$('.btn-eliminar').click(function() {
    var id = $(this).data('id');

    Swal.fire({
        title: 'Eliminando...',
        showConfirmButton: false,
        allowOutsideClick: false,
        onOpen: function() {
            $.ajax({
                url: `{{ route('administracion.clasificacion_productos.destroy', '') }}/${id}`,
                method: 'DELETE',
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    Swal.fire({
                        title: 'Éxito',
                        text: 'Clasificación de plato eliminada exitosamente',
                        icon: 'success',
                        timer: 1500,
                        showConfirmButton: false
                    }).then(() => {
                        location.reload();
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire('Error', 'No se pudo eliminar la clasificación de plato', 'error');
                }
            });
        }
    });
});


</script>


@endsection
