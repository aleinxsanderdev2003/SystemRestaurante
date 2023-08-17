@extends('administracion.main')

@section('content')
<style>
    .card {
      border: none;
      background: linear-gradient(to right,black, #f12711, #f5af19);
      padding: 30px;
    }

    .card-title {
      font-size: 24px;
      font-weight: bold;
      color: #333;
    }

    .user-info p {
      margin: 0;
      font-size: 16px;
      color: #666;
    }

    .user-form .form-group {
      margin-bottom: 20px;
    }

    .user-form label {
      font-size: 18px;
      color: #333;
      display: flex;
      align-items: center;
    }

    .user-form label i {
      margin-right: 10px;
      color: #0069D9;
    }

    .user-form button {
      margin-top: 20px;
      background-color: #0069D9;
      color: #FFFFFF;
      border: none;
    }

    .user-form button:hover {
      background-color: #005cbf;
    }

    </style>

    <div id="content" class="content-with-sidebar">
        <!-- Contenido de las diferentes vistas -->
        <div class="col-md-9">
            <main class="py-4">
                <h1 class="text-center" style="font-family: 'Barlow', sans-serif;">Detalles de Usuario</h1>

                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title text-white text-center">DATOS</h5>
                        <div class="user-info text-center">
                            <p class="text-white"><i class="fas fa-user text-black"></i> <strong>Usuario:</strong> {{ $user->name }}</p>
                            <p class="text-white"><i class="fas fa-envelope text-black"></i> <strong>Email:</strong> {{ $user->email }}</p>
                        </div>
                        <hr>
                        <h3 class="lead text-center text-white">CAMBIAR INFORMACIÓN DE USUARIO</h3>
                        <!-- Formulario de edición del usuario -->
                        <form action="{{ route('user.update', $user->id) }}" method="POST" class="user-form">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="text-white" for="name"><i class="fas fa-user text-white"></i> USUARIO</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
                            </div>

                            <div class="form-group">
                                <label class="text-white for="email"><i class="fas fa-envelope text-white"></i> CORREO ELECTRÓNICO</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
                            </div>
                            <div class="text-center">
                            <button type="submit" class="btn btn-primary text-center"><i class="fas fa-save"></i> Guardar</button>
                        </div>
                        </form>

                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Aquí puedes agregar el contenido relacionado con la gestión de usuarios -->

    @endsection
