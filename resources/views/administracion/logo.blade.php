@extends('administracion.main')
@section('content')
<style>
    .container {
      margin-top: 50px;
    }

    .logo {
      text-align: center;
    }

    .logo img {
      max-width: 25%;
      height: auto;
      margin-bottom: 10px;
      display: inline-block;
    }

    .card {
      border: 1px solid #ddd;
      padding: 20px;
      background-color: #f5f5f5;
    }

    .card h2 {
      text-align: center;
      font-size: 28px;
      font-weight: bold;
      color: #555;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 10px;
      color: #555;
      font-weight: bold;
    }

    .form-control-file {
      display: block;
      margin-bottom: 10px;
    }

    .btn-primary {
      display: block;
      margin: 0 auto;
      background-color: #3f51b5;
      border-color: #3f51b5;
    }

    .btn-primary:hover {
      background-color: #303f9f;
      border-color: #303f9f;
    }

    .btn-editar,
    .btn-eliminar {
      color: #fff;
    }

    .btn-editar {
      background-color: #009688;
      border-color: #009688;
    }

    .btn-eliminar {
      background-color: #f44336;
      border-color: #f44336;
    }

    .btn-editar:hover,
    .btn-eliminar:hover {
      background-color: #00897b;
      border-color: #00897b;
    }
    .container {
  margin-top: 50px;
}

.logo {
  text-align: center;
}

.logo img {
  max-width: 200px;
  height: auto;
  border-radius: 50%;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
  transition: transform 0.3s ease-in-out;
}

.logo img:hover {
  transform: scale(1.1);
}

.heading {
  text-align: center;
  margin-top: 30px;
  font-size: 32px;
  color: #333;
  font-weight: bold;
}
.file-input {
  display: block;
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}/* Estilos para la etiqueta del campo de archivo de entrada */
.file-label {
  font-weight: bold;
}

/* Estilos para el botón de guardar */
.save-btn {
  display: inline-block;
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

/* Estilos para el icono de guardar */
.save-btn i {
  margin-right: 5px;
}

/* Ajustes responsivos */
@media (max-width: 767px) {
  .col-md-6 {
    width: 100%;
  }

  .offset-md-3 {
    margin-left: 0;
  }
}
    </style>
    <div style="background: linear-gradient(to right,black, #f12711, #f5af19);">
    <div class="container">
        <h1 class="heading text-white">LOGO DEL RESTAURANTE</h1>
        <div class="logo">
            <img src="img/logos/logo.png?v={{ uniqid() }}" alt="Logo del restaurante">
        </div>

        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <h2 class="lead display-4">CAMBIAR LOGO</h2>

                    <form action="{{ route('guardar-logo') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="logo" class="file-label">Seleccionar Archivo de Imagen</label>
                            <input type="file" class="form-control-file file-input" id="logo" name="logo" accept="image/*">
                            <small class="form-text text-muted">Recomendamos subir una imagen sin fondo (formato PNG) para mejores resultados.</small>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary save-btn"><i class="fas fa-save"></i> Guardar Logo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
