<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;

class RestauranteController extends Controller
{
    // RestauranteController.php
    // RestauranteController.php

    public function store(Request $request)
    {
        // Obtener los datos del platillo del formulario
        $nombre = $request->input('nombre');
        $precio = $request->input('precio');

        // Obtener los pedidos existentes de la cookie o inicializar un array vacío
        $pedidos = $request->cookie('pedidos') ? json_decode($request->cookie('pedidos'), true) : [];

        // Agregar el nuevo pedido al array de pedidos
        $pedidos[] = [
            'nombre' => $nombre,
            'precio' => $precio,
        ];

        // Almacenar los pedidos en la cookie por 1 día (puedes ajustar el tiempo según tus necesidades)
        $cookie = cookie('pedidos', json_encode($pedidos), 1440);

        // Redirigir a la vista de menu.app con un mensaje de éxito
        return back()->withCookie($cookie)->with('success', 'Producto agregado al carrito, dirijase a la vista de pedidos. ');
    }










    public function retirar($indice)
{
    // Obtener los pedidos existentes de la cookie
    $pedidos = request()->cookie('pedidos') ? json_decode(request()->cookie('pedidos'), true) : [];

    // Verificar si el índice existe en el array de pedidos
    if (array_key_exists($indice, $pedidos)) {
        // Eliminar el pedido correspondiente
        unset($pedidos[$indice]);

        // Actualizar la cookie con los pedidos restantes
        $cookie = Cookie::make('pedidos', json_encode(array_values($pedidos)), 1440);

        // Redirigir a la vista de orden
        return redirect()->route('restaurante.orden')->cookie($cookie);
    }

    // Si el índice no existe, redirigir a la vista de orden sin hacer cambios
    return redirect()->route('restaurante.orden');
}

}
