@extends('administracion.main')
@section('content')
<h2 class="text-center lead display-4"  style="font-family: 'Barlow', sans-serif;">NUESTRA CARTA</h2>
<a href="{{ route('administracion.producto_agregar') }}" class="btn btn-success"><i class="fas fa-plus" style=""></i> Agregar plato</a><br><br>
<div class="alert alert-warning">
    <strong>Formatos de imagen aceptados:</strong> JPEG, PNG, JPG
</div>

<div class="platos-container">
    @foreach ($platos as $plato)
    <div class="card mb-3">
      <div class="image-container">
        <img src="{{ asset($plato->imagen) }}" alt="{{ $plato->nombre }}" class="rounded-circle img-thumbnail">
      </div>
      <div class="card-body">
        <h5 class="card-title">NOMBRE DE PLATO: {{ $plato->nombre }}</h5>
        <p class="card-text">DESCRIPCIÓN: {{ $plato->descripcion }}</p>
        <p class="card-text">PRECIO: <b>{{ $plato->precio }}</b></p>
        <p class="card-text">CLASIFICACIÓN: {{ $plato->clasificacion->nombre }}</p>
        <a href="#" class="btn btn-danger delete-product" data-id="{{ $plato->id }}"><i class="fas fa-trash"></i> ELIMINAR</a>
      </div>
    </div>
    @endforeach
  </div>


<style>
.display-4 {
  text-align: center;
  font-family: 'Barlow', sans-serif;
  color: #007bff; /* Color azul para el título */
}



.alert {
  background-color: #ffeeba; /* Color de fondo del cuadro de alerta */
  border: 1px solid #ffc107; /* Color del borde del cuadro de alerta */
  color: #856404; /* Color del texto del cuadro de alerta */
  text-align: center;
  padding: 10px;
}

/* Estilos para las tarjetas de los platos */
.platos-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center; /* Centrar horizontalmente los elementos */
}

.card {
  border: 1px solid #ced4da; /* Borde de las tarjetas */
  border-radius: 8px; /* Bordes redondeados de las tarjetas */
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra de las tarjetas */
  width: 280px; /* Ancho fijo de las tarjetas */
  margin: 10px; /* Margen entre las tarjetas */
}

.image-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 200px;
  overflow: hidden;
  border-radius: 8px 8px 0 0; /* Bordes redondeados solo en la parte superior */
}

.img-thumbnail {
  max-width: 100%;
  max-height: 100%;
  object-fit: cover; /* Para ajustar la imagen sin deformarla */
}

.card-title {
  text-align: center;
  color: #007bff; /* Color azul para el título del plato */
  font-size: 20px;
  margin: 10px 0;
}

.card-text {
  text-align: center;
  font-size: 16px;
  margin: 5px 0;
}

.btn-danger {
  display: block;
  margin: 10px auto 0;
  background-color: #dc3545; /* Color de fondo rojo para el botón de eliminar */
  border-color: #dc3545; /* Color del borde rojo para el botón de eliminar */
}

.btn-danger:hover {
  background-color: #c82333; /* Color de fondo rojo más oscuro al pasar el mouse */
  border-color: #bd2130; /* Color del borde rojo más oscuro al pasar el mouse */
}
</style>

    <script>
        // Escucha el evento de clic en el botón de eliminación
        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('delete-product')) {
                event.preventDefault();

                // Obtiene el ID del producto a eliminar
                var productId = event.target.getAttribute('data-id');

                Swal.fire({
                    title: 'Eliminar Producto',
                    text: '¿Estás seguro de que deseas eliminar este producto?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Envía una solicitud AJAX al controlador para eliminar el producto
                        fetch('{{ route('administracion.productos') }}/' + productId, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                        }).then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Eliminación exitosa, actualiza la vista o muestra un mensaje
                                Swal.fire('Éxito', data.message, 'success').then(() => {
                                    // Actualiza la vista o realiza otra acción necesaria
                                    location.reload(); // Actualiza la página
                                });
                            } else {
                                // Error al eliminar el producto, muestra un mensaje de error
                                Swal.fire('Error', data.message, 'error');
                            }
                        }).catch(error => {
                            // Error en la solicitud, muestra un mensaje de error
                            Swal.fire('Error', 'No se pudo eliminar el producto', 'error');
                        });
                    }
                });
            }
        });
    </script>

@endsection
