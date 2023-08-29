<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UsuarioManejador extends Controller
{
    public function mostrarLogin(){
        return view("dashboard_usuario.auth.login");
    }
    public function mostrarRegister(){
        return view("dashboard_usuario.auth.register");
    }
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }

public function login(Request $request)
{
    $credentials = $request->validate($this->rules());

    if (Auth::attempt($credentials)) {
        // El usuario ha iniciado sesión correctamente
        Alert::success('Inicio de sesión exitoso', '¡Bienvenido!')->persistent(true, false);
        return redirect()->route('usuario.panel');
    } else {
        // La validación no fue exitosa, redirigir de vuelta al formulario de inicio de sesión con errores
        return redirect()->back()->withErrors(['error' => 'Credenciales inválidas']);
    }
}
public function mostrarPanel(){
    return view("dashboard_usuario.dashboard");
}


protected function authenticated(Request $request, $user)
{
    return redirect()->route('usuario.panel');
}
}
