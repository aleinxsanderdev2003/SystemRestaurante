<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Logo;
class LogoController extends Controller
{

    public function mostrarLogo()
    {
        $rutaLogo = 'img/logos/logo.jpg'; // Ajusta la ruta de la imagen según corresponda

        // Verificar si la imagen existe en el almacenamiento
        if (Storage::exists($rutaLogo)) {
            $file = Storage::get($rutaLogo);
            $type = Storage::mimeType($rutaLogo);

            // Guardar la nueva ruta de la imagen en la sesión
            session(['rutaLogo' => $rutaLogo]);

            return response($file, 200)->header('Content-Type', $type);
        }
    }

    public function logoindex()
    {
        $logo = Logo::first();
        $rutaLogo = $logo ? public_path($logo->ruta) : null;

        return view('administracion.logo', compact('rutaLogo'));
    }

    




    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $imagen = $request->file('logo');
        $nombreArchivo = time() . '_' . $imagen->getClientOriginalName();
        $ruta = $imagen->storeAs('public/logos', $nombreArchivo);

        Logo::create([
            'nombre' => $nombreArchivo,
        ]);
        return redirect()->back()->with('success', 'Logo guardado exitosamente.');
}


public function guardar(Request $request)
{
    if ($request->hasFile('logo')) {
        $logo = $request->file('logo');
        $nombreLogo = 'logo.png'; // Nombre del archivo del logo

        // Almacenar la imagen en la carpeta deseada
        $ruta = public_path('img/logos/');
        $logo->move($ruta, $nombreLogo);

        // Guardar la información del logo en la base de datos
        Logo::create([
            'ruta' => 'img/logos/' . $nombreLogo,
        ]);

        return redirect()->back()->with('success', 'Logo guardado correctamente');
    }

    return redirect()->back()->with('error', 'Error al cargar el logo');
}

public function actualizar(Request $request)
{
    if ($request->hasFile('logo')) {
        $logo = $request->file('logo');
        $nombreLogo = 'logo.png'; // Nombre del archivo del logo

        // Almacenar la imagen en la carpeta deseada
        $ruta = public_path('img/logos/');
        $logo->move($ruta, $nombreLogo);

        // Actualizar la información del logo en la base de datos
        $logoActualizado = Logo::find(1); // Suponiendo que el logo que deseas actualizar tiene un ID de 1
        $logoActualizado->ruta = 'img/logos/' . $nombreLogo;
        $logoActualizado->save();

        return redirect()->back()->with('success', 'Logo actualizado correctamente');
    }

    return redirect()->back()->with('error', 'Error al cargar el logo');
}



    public function __construct()
    {
        // Obtener el logo de la base de datos y compartirlo con todas las vistas
        $logo = Logo::find(1); // Suponiendo que el logo tiene un ID de 1

        view()->share('logo', $logo);
    }
}
