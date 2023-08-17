<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Clasificacion;
class ClasificacionController extends Controller
{
    public function index()
    {
        $clasificaciones = Clasificacion::all();
        // Otras lógicas para obtener los datos necesarios para la vista

        return view('menu.app', compact('clasificaciones'));

    }
}
