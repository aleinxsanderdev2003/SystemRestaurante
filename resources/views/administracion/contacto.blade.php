@extends('administracion.main')

@section('content')
<style>
    .card-header {
      background-color: #0069D9;
      color: #FFFFFF;
      font-weight: bold;
    }

    .card-body {
      animation: fadeIn 1s;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    </style>

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h4>Información de Contacto</h4>
            </div>
            <div class="card-body">
              <form action="{{ route('contacto.actualizar') }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="direccion">Dirección</label>
                  <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $sucursal->direccion ?? '' }}">
                </div><br>
                <div class="form-group">
                  <label for="telefono">Teléfono</label>
                  <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $sucursal->telefono ?? '' }}">
                </div><br>
                <div class="form-group">
                  <label for="horario_semana">Horario de Atención (Semana)</label>
                  <input type="text" class="form-control" id="horario_semana" name="horario_semana" value="{{ $sucursal->horario_semana ?? '' }}">
                </div><br>
                <div class="form-group">
                  <label for="horario_fin_semana">Horario de Atención (Fin de Semana)</label>
                  <input type="text" class="form-control" id="horario_fin_semana" name="horario_fin_semana" value="{{ $sucursal->horario_fin_semana ?? '' }}">
                </div><br>
                <button type="submit" class="btn btn-primary">Guardar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


@endsection
