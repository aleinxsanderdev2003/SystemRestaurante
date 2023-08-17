<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Plato;
use App\Models\Clasificacion;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class AdministracionController extends Controller
{
  public function index(){
    return view('administracion.main');
  }
  public function user(){
    $user = User::find(1); // Aquí debes reemplazar el número 1 por el ID del usuario que deseas mostrar

    return view('administracion.usuario', compact('user'));
  }
  public function logo(){
    return view('administracion.logo');
  }
  public function layout(){
    return view('administracion.layout');
  }

  public function productos()
  {
      $platos = Plato::with('clasificacion')->get();

      return view('administracion.productos', compact('platos'));
  }


  public function agregarProductoForm()
  {
      $clasificaciones = Clasificacion::all();

      return view('administracion.producto_agregar', compact('clasificaciones'));
  }

  public function guardarProducto(Request $request)
  {
      // Validar los datos del formulario
      $request->validate([
          'nombre' => 'required',
          'descripcion' => 'required',
          'precio' => 'required|numeric',
          'clasificacion_id' => 'required',
          'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      ]);

      // Guardar la imagen si se proporciona
      $imagen = null;
      if ($request->hasFile('imagen')) {
          $archivoImagen = $request->file('imagen');
          $nombreImagen = time() . '.' . $archivoImagen->getClientOriginalExtension();
          $archivoImagen->move(public_path('img/platillos'), $nombreImagen);
          $imagen = 'img/platillos/' . $nombreImagen;
      }



      // Crear un nuevo plato con los datos del formulario
      $plato = new Plato();
      $plato->nombre = $request->nombre;
      $plato->descripcion = $request->descripcion;
      $plato->precio = $request->precio;
      $plato->clasificacion_id = $request->clasificacion_id;
      $plato->imagen = $imagen;
      $plato->save();

      // Enviar una respuesta JSON
      return response()->json([
          'success' => true,
          'message' => 'Plato agregado exitosamente'
      ]);
  }

  public function eliminarProducto($id)
  {
      $plato = Plato::findOrFail($id);

      // Eliminar la imagen asociada si existe
      if ($plato->imagen) {
          Storage::delete(public_path($plato->imagen));
      }

      $plato->delete();

      return response()->json([
          'success' => true,
          'message' => 'Producto eliminado exitosamente'
      ]);
  }



/*FUNCIONES DE LA CATEGORIA DE PLATOS*/
public function mostrarCategoria()
{
    $clasificaciones = Clasificacion::all();
    return view('administracion.clasificacion_productos', compact('clasificaciones'));
}


public function guardarClasificacionPlato(Request $request)
{
    $request->validate([
        'nombre' => 'required',
    ]);

    $clasificaciones = new Clasificacion();
    $clasificaciones->nombre = $request->nombre;
    $clasificaciones->save();

    return redirect()->route('administracion.clasificacion_productos')->with('success', 'Clasificación de plato agregada exitosamente');
}

public function editarClasificacionPlato($id)
{
    $clasificaciones = Clasificacion::where('id', $id)->get();

    return view('administracion.clasificacion_productos', compact('clasificaciones'));
}

public function actualizarClasificacionPlato(Request $request, $id)
{
    $request->validate([
        'nombre' => 'required',
    ]);

    $clasificacion = Clasificacion::findOrFail($id);
    $clasificacion->nombre = $request->nombre;
    $clasificacion->save();

    return redirect()->route('administracion.clasificacion_productos')->with('success', 'Clasificación de plato actualizada exitosamente');
}

public function eliminarClasificacionPlato($id)
{
    $clasificacion = Clasificacion::findOrFail($id);
    $clasificacion->delete();

    return redirect()->back()->with('success', 'Clasificación de plato eliminada exitosamente');
}



}
