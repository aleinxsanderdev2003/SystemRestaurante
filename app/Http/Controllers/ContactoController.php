<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Sucursal;

class ContactoController extends Controller
{
    public function mostrarContacto()
    {
        $sucursal = Sucursal::first();

        return view('layouts.app', compact('sucursal'));
    }
    public function mostrarContactoAdministrar()
    {
        $sucursal = Sucursal::first();

        return view('administracion.contacto', compact('sucursal'));
    }

    public function mostrarContactoMenu()
{
    $sucursal = Sucursal::first();

    return response()->json($sucursal);
}


    public function actualizarContacto(Request $request)
{
    $sucursal = Sucursal::first();

    $sucursal->direccion = $request->input('direccion');
    $sucursal->telefono = $request->input('telefono');
    $sucursal->horario_semana = $request->input('horario_semana');
    $sucursal->horario_fin_semana = $request->input('horario_fin_semana');

    $sucursal->save();

    return redirect()->back()->with('success', 'Los datos de contacto se han actualizado correctamente.');
}
}
