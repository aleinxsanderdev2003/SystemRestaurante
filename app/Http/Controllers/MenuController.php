<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Clasificacion;
use App\Models\Plato;


use App\Models\Sucursal;

class MenuController extends Controller
{

    public function principal(){
        $sucursal = Sucursal::find(1); // Suponiendo que el ID de la sucursal es 1

        return view('layouts.app', compact('sucursal'));
    }

    public function productos()
    {
        $productos = Plato::with('clasificacion')->get();

        return view('menu.app', compact('productos'));
    }



public function mostrarCategoria()
{
    $clasificaciones = Clasificacion::all();
    return view('menu.app', compact('clasificaciones'));
}


}
