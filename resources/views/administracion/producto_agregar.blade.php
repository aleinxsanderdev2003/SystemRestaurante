@extends('administracion.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"  style="font-family: 'Barlow', sans-serif;">Agregar Producto</div>

                    <div class="card-body">
                        <form id="agregar-producto-form" action="{{ route('administracion.producto_agregar') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nombre"  style="font-family: 'Barlow', sans-serif;">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion"  style="font-family: 'Barlow', sans-serif;">Descripción</label>
                                <textarea name="descripcion" id="descripcion" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="precio"  style="font-family: 'Barlow', sans-serif;">Precio</label>
                                <input type="number" name="precio" id="precio" class="form-control" step="0.01" required>
                            </div>
                            <div class="form-group">
                                <label for="clasificacion_id"  style="font-family: 'Barlow', sans-serif;">Clasificación</label>
                                <select name="clasificacion_id" id="clasificacion_id" class="form-control" required>
                                    @foreach ($clasificaciones as $clasificacion)
                                        <option value="{{ $clasificacion->id }}">{{ $clasificacion->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
<br>
                            <div class="form-group">
                                <label for="imagen"  style="font-family: 'Barlow', sans-serif;">Imagen</label>
                                <input type="file" name="imagen" id="imagen" class="form-control-file">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success">Agregar</button>
                            <a href="{{route('administracion.productos')}}">Regresar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('agregar-producto-form').addEventListener('submit', function(event) {
            event.preventDefault();

            Swal.fire({
                title: 'Agregar Producto',
                text: '¿Estás seguro de que deseas agregar este producto?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Sí',
                cancelButtonText: 'Cancelar',
                preConfirm: () => {
                    const form = document.getElementById('agregar-producto-form');
                    const formData = new FormData(form);

                    return fetch(form.action, {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.hasOwnProperty('success') && data.hasOwnProperty('message')) {
                            if (data.success) {
                                Swal.fire('Éxito', data.message, 'success').then(() => {
                                    window.location.href = '{{ route('administracion.productos') }}';
                                });
                            } else {
                                Swal.fire('Error', data.message, 'error');
                            }
                        } else {
                            Swal.fire('Error', 'No se pudo agregar el producto', 'error');
                        }
                    })
                    .catch(error => {
                        Swal.fire('Error', 'No se pudo agregar el producto', 'error');
                    });
                }
            });
        });
    </script>
@endsection
