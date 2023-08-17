<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{ asset('js/orden.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/whatsapp-web.js@1.12.5/dist/browser.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-xe4yPqFQgyA0pM2ddrMbH/Mh43zTQ9NTO6ECjfUQ8PLmRkQX/nB/jPf/W2Yztq8W+oGtG8ogZSbsh1QwU5OPew==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Yumi - Restaurante</title>
</head>
<body>
    <script>
        function addToCart(nombre, precio) {
          // Obtener referencia al tbody del carrito
          var carrito = document.querySelector('#carrito tbody');

          // Crear una nueva fila para el alimento seleccionado
          var fila = document.createElement('tr');

          // Crear las celdas para el nombre y el precio
          var celdaNombre = document.createElement('td');
          celdaNombre.textContent = nombre;
          var celdaPrecio = document.createElement('td');
          celdaPrecio.textContent = '$' + precio.toFixed(2);

          // Agregar las celdas a la fila
          fila.appendChild(celdaNombre);
          fila.appendChild(celdaPrecio);

          // Agregar la fila al tbody del carrito
          carrito.appendChild(fila);
        }
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


<script>
    @if(session('success'))
        Swal.fire('Envío exitoso', '{{ session('success') }}', 'success');
    @elseif(session('error'))
        Swal.fire('Error', '{{ session('error') }}', 'error');
    @endif
</script>
<div class="bg__container2">
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{route('layouts.app')}}">
                <img src="img/logos/logo.png" width="30" height="30" class="d-inline-block align-top" alt="Logo">
            </a>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">

            </div>
        </div>
    </nav>
    <div class="texto" id="home">
        <h2 class="text-white" style="font-family: 'Playfair Display', serif;">Pedidos</h2>
    </div>
</div>



<!-- Carrito de pedido -->
<script>
    function addToCart(nombre, precio, idNombre, idPrecio) {
      // Obtener el contenedor de los alimentos seleccionados en el carrito
      var carritoContenido = document.getElementById("carrito-contenido");

      // Obtener la tabla del carrito
      var carritoTabla = document.getElementById("carrito-tabla");

      // Obtener el total del carrito
      var carritoTotal = document.getElementById("carrito-total");

      // Crear un nuevo elemento de fila para la tabla
      var fila = document.createElement("tr");

      // Crear celdas para el nombre y precio del platillo seleccionado
      var celdaNombre = document.createElement("td");
      celdaNombre.textContent = nombre;

      var celdaPrecio = document.createElement("td");
      celdaPrecio.textContent = "$" + precio.toFixed(2);

      // Agregar las celdas a la fila
      fila.appendChild(celdaNombre);
      fila.appendChild(celdaPrecio);

      // Agregar la fila a la tabla
      carritoTabla.appendChild(fila);

      // Actualizar el total del carrito
      var totalActual = parseFloat(carritoTotal.textContent);
      carritoTotal.textContent = (totalActual + precio).toFixed(2);

      // Agregar el nombre y precio del platillo seleccionado al contenedor
      var contenidoSeleccionado = document.createElement("p");
      contenidoSeleccionado.textContent = nombre + ": $" + precio.toFixed(2);

      carritoContenido.appendChild(contenidoSeleccionado);
    }
  </script>
<!-- Vista del carrito -->


  <!-- Vista restaurante.orden -->

  <div class="card">
    <div class="card-header bg-dark text-white">
        <h3 class="text-center">Platos seleccionados</h3>
    </div>


    <div class="card-body">
        <div id="carrito-contenido">
            @php
            $pedidos = json_decode(request()->cookie('pedidos'), true);
            $total = 0;
            @endphp
            @if ($pedidos)
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedidos as $key => $pedido)
                            <tr>
                                <td>{{ $pedido['nombre'] }}</td>
                                <td>S/.{{ $pedido['precio'] }}</td>
                                <td>
                                    <form action="{{ route('pedido.retirar', $key) }}" id="formularioPedido"
                                        method="POST">
                                        @csrf

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i> Retirar
                                        </button>

                                    </form>
                                </td>
                            </tr>

                            @php
                            $total += $pedido['precio'];
                            @endphp
                        @endforeach
                    </tbody>
                </table>

            @endif
        </div>

        <h4 class="text-right">Total: S/. {{ $total }}</h4>
    </div>
    @php
    $nombreCliente = $nombreCliente ?? '';
    $metodoEntrega = $metodoEntrega ?? '';
@endphp
<style>
    .form-control {
        width: 100%;
        max-width: 300px;
    }
</style>

<div class="card-footer">
    <form action="{{ url('/restaurante/enviar-pedido-whatsapp') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nombreCliente">Nombre completo</label>
            <input type="text" class="form-control" id="nombreCliente" name="nombreCliente" required
                value="{{ $nombreCliente ?? '' }}">
        </div>
        <div class="form-group">
            <label for="numeroCedula">Cedula</label>
            <input type="text" class="form-control" id="numeroCedula" name="numeroCedula" required
                value="{{ $numeroCedula ?? '' }}">
        </div>
        <div class="form-group">
            <label for="metodoEntrega">Forma de Entrega</label>
            <select class="form-control" id="metodoEntrega" name="metodoEntrega" required>
                <option value="">Seleccionar opción</option>
                <option value="Envio Domicilio" {{ $metodoEntrega == 'Envio Domicilio' ? 'selected' : '' }}>
                    Solicitar envío a domicilio</option>
                <option value="Recoger personalmente" {{ $metodoEntrega == 'Recoger personalmente' ? 'selected' : '' }}>
                    Recoger presencialmente</option>
                <option value="Estoy en mesa" {{ $metodoEntrega == 'Estoy en mesa' ? 'selected' : '' }}>
                    Estoy en mesa</option>
            </select>
        </div>

        <!-- Campos adicionales para envío a domicilio -->
        <div id="camposDomicilio" style="display: none;">
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion">
            </div>
            <div class="form-group">
                <label for="telefono">Número de teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono">
            </div>
            <div class="form-group">
                <label for="distrito">Distrito</label>
                <input type="text" class="form-control" id="distrito" name="distrito">
            </div>
            <div class="form-group">
                <label for="referencia">Referencia</label>
                <input type="text" class="form-control" id="referencia" name="referencia">
            </div>
        </div>

        <div id="campoMesa" style="display: none;">
            <div class="form-group">
                <label for="numeroMesa">Número de Mesa</label>
                <input type="number" class="form-control" id="numeroMesa" name="numeroMesa">
            </div>
        </div>

        <script>
            document.getElementById('metodoEntrega').addEventListener('change', function() {
                var metodoEntrega = document.getElementById('metodoEntrega').value;
                var campoMesa = document.getElementById('campoMesa');

                // Muestra u oculta el campo de número de mesa según la opción seleccionada
                if (metodoEntrega === 'Estoy en mesa') {
                    campoMesa.style.display = 'block';
                } else {
                    campoMesa.style.display = 'none';
                }
            });
        </script>

<div id="campoRecogerPersonalmente" style="display: none;">
    <div class="form-group">
        <label for="numeroCelular"><i class="fas fa-mobile-alt"></i> Número de celular</label>
        <input type="text" class="form-control" id="numeroCelular" name="numeroCelular">
    </div>

    <div class="form-group">
        <label for="horaRecoger"><i class="fas fa-clock"></i> Hora de recogida</label>
        <input type="time" class="form-control" id="horaRecoger" name="horaRecoger">
    </div>
</div>
<style>
    .form-group label {
        display: flex;
        align-items: center;
    }

    .form-group label i {
        margin-right: 10px;
    }
</style>

<script>
    document.getElementById('metodoEntrega').addEventListener('change', function() {
        var metodoEntrega = document.getElementById('metodoEntrega').value;
        var campoRecogerPersonalmente = document.getElementById('campoRecogerPersonalmente');

        // Muestra u oculta el campo de hora de recogida y número de celular según la opción seleccionada
        if (metodoEntrega === 'Recoger personalmente') {
            campoRecogerPersonalmente.style.display = 'block';
        } else {
            campoRecogerPersonalmente.style.display = 'none';
        }
    });
</script>



        <div class="text-right" style="margin-top:10px;">
            <button class="boton__pedido text-center mx-auto" id="enviarPedidoBtn" type="submit">
                Solicitar pedido
            </button>
            <style>
                .return-link-container {
                  display: flex;
                  justify-content: center;
                  margin-top: 20px; /* Adjust the margin as needed */
                }

                .return-link {
                  display: inline-block;
                  padding: 10px 20px;
                  background-color: #4CAF50;
                  color: white;
                  text-decoration: none;
                  border-radius: 5px;
                  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                  transition: background-color 0.3s, transform 0.2s;
                }

                .return-link:hover {
                  background-color: #45a049;
                  transform: translateY(-2px);
                }
              </style>

              <div class="return-link-container">
                <a href="{{ route('restaurante.menu') }}" class="return-link">Regresar</a>
              </div>
        </div>

    </form>
</div>

    <script>
        document.getElementById('metodoEntrega').addEventListener('change', function() {
            var metodoEntrega = document.getElementById('metodoEntrega').value;
            var camposDomicilio = document.getElementById('camposDomicilio');

            // Muestra u oculta los campos adicionales según la opción seleccionada
            if (metodoEntrega === 'Envio Domicilio') {
                camposDomicilio.style.display = 'block';
            } else {
                camposDomicilio.style.display = 'none';
            }
        });
    </script>



</div>

</div>

    <script>
        $(document).ready(function() {
          $('.enviar-pedido-btn').click(function(e) {
            e.preventDefault();

            var nombreCliente = $('#nombreCliente').val();
            var metodoEntrega = $('#metodoEntrega').val();
            var nombrePlato = $(this).data('nombre');
            var metodoPedido = $(this).data('metodo-entrega');

            var formData = new FormData();
            formData.append('nombreCliente', nombreCliente);
            formData.append('metodoEntrega', metodoEntrega);
            formData.append('nombrePlato', nombrePlato);
            formData.append('metodoPedido', metodoPedido);

            $.ajax({
              type: 'POST',
              url: '/restaurante/enviar-pedido-whatsapp',
              data: formData,
              processData: false,
              contentType: false,
              success: function(response) {
                // Resto del código de manejo de la respuesta
              },
              error: function() {
                // Resto del código de manejo de errores
              }
            });
          });
        });
        </script>




<style>
    .boton__pedido {
  cursor: pointer;
  font-weight: 700;
  font-family: Helvetica,"sans-serif";
  transition: all .2s;
  padding: 10px 20px;
  border-radius: 100px;
  background: #cfef00;
  border: 1px solid transparent;
  display: flex;
  align-items: center;
  font-size: 15px;
}

.boton__pedido:hover {
  background: #c4e201;
}

.boton__pedido > svg {
  width: 34px;
  margin-left: 10px;
  transition: transform .3s ease-in-out;
}

.boton__pedido:hover svg {
  transform: translateX(5px);
}

.boton__pedido:active {
  transform: scale(0.95);
}


</style>


</body>
</html>
