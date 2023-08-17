<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class EnviowhatsappController extends Controller
{
    public function generarEnlaceWhatsApp(Request $request)
    {
        $pedidos = json_decode($request->cookie('pedidos'), true);
        $total = 0;
        $nombreCliente = $request->input('nombreCliente');
        $numeroCedula = $request->input('numeroCedula');
        $metodoEntrega = $request->input('metodoEntrega');
        $numeroMesa = $request->input('numeroMesa');

        $contenidoCarrito = "Carrito de pedido:\n";
        if ($pedidos) {
            foreach ($pedidos as $pedido) {
                $nombre = $pedido['nombre'];
                $precio = $pedido['precio'];
                $contenidoCarrito .= "- $nombre: $precio\n";
                $total += $precio;
            }
        }

        $contenidoCarrito .= "\nTotal a pagar: $total\n";
        $contenidoCarrito .= "Opción de entrega: " . $metodoEntrega . "\n";
        $contenidoCarrito .= "Nombre del Cliente: " . $nombreCliente . "\n";
        $contenidoCarrito .= "Numero del Cedula: " . $numeroCedula . "\n";

        if ($metodoEntrega === 'Envio Domicilio') {
            $direccion = $request->input('direccion');
            $telefono = $request->input('telefono');
            $distrito = $request->input('distrito');
            $referencia = $request->input('referencia');

            $contenidoCarrito .= "Dirección: " . $direccion . "\n";
            $contenidoCarrito .= "Número de teléfono: " . $telefono . "\n";
            $contenidoCarrito .= "Distrito: " . $distrito . "\n";
            $contenidoCarrito .= "Referencia: " . $referencia . "\n";
        }

        if ($metodoEntrega === 'Recoger personalmente') {
            $horaRecoger = $request->input('horaRecoger');
            $numeroCelular = $request->input('numeroCelular');

            $contenidoCarrito .= "Hora de recogida: " . $horaRecoger . "\n";
            $contenidoCarrito .= "Número de celular: " . $numeroCelular . "\n";
        }
        if ($metodoEntrega === 'Estoy en mesa') {

            $numeroMesa = $request->input('numeroMesa');


            $contenidoCarrito .= "Número de Mesa: " . $numeroMesa . "\n";
        }

        $url = "https://api.whatsapp.com/send?text=" . urlencode($contenidoCarrito);

        return redirect()->away($url);
    }

}
