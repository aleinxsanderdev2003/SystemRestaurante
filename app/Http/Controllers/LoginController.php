<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index(){
        return view('login.iniciar_sesion');
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
        return redirect()->route('administracion.main');
    } else {
        // La validación no fue exitosa, redirigir de vuelta al formulario de inicio de sesión con errores
        return redirect()->back()->withErrors(['error' => 'Credenciales inválidas']);
    }
}



protected function authenticated(Request $request, $user)
{
    return redirect()->route('administracion.main');
}


}
