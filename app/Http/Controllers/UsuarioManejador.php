<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioManejador extends Controller
{
    public function mostrarLogin(){
        return view("dashboard_usuario.auth.login");
    }
    public function mostrarRegister(){
        return view("dashboard_usuario.auth.register");
    }
}
