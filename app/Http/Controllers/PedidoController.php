<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use Exception;
use App\Models\Plato;
use App\Models\Clasificacion;


class PedidoController extends Controller
{
    public function index()
{
    $clasificaciones = Clasificacion::all();
    // Otras lógicas para obtener los datos necesarios para la vista
    $platos = Plato::with('clasificacion')->get();

    return view('menu.app', compact('platos','clasificaciones'));
}

    public function orden(){
        return view('restaurante.orden');
    }
    public function enviarPedidoWhatsApp(Request $request)
    {
        $pedidos = json_decode($request->cookie('pedidos'), true);
        $total = 0;
        $mensaje = "Carrito de pedido:\n";
        $nombreCliente = $request->input('nombreCliente');
        $numeroCedula = $request->input('numeroCedula');
        $metodoEntrega = $request->input('metodoEntrega');
        $numeroMesa = $request->input('numeroMesa');

        if ($pedidos) {
            foreach ($pedidos as $pedido) {
                $nombre = $pedido['nombre'];
                $precio = $pedido['precio'];
                $mensaje .= "- $nombre: $precio\n";
                $total += $precio;
            }
        }

        $mensaje .= "\nTotal a pagar: $total\n";
        $mensaje .= "Opción de entrega: " . $metodoEntrega . "\n";
        $mensaje .= "Nombre del Cliente: " . $nombreCliente . "\n";
        $mensaje .= "Numero de Cedula: " . $numeroCedula . "\n";

        if ($metodoEntrega === 'Envio Domicilio') {
            $direccion = $request->input('direccion');
            $telefono = $request->input('telefono');
            $distrito = $request->input('distrito');
            $referencia = $request->input('referencia');

            $mensaje .= "Dirección: " . $direccion . "\n";
            $mensaje .= "Número de teléfono: " . $telefono . "\n";
            $mensaje .= "Distrito: " . $distrito . "\n";
            $mensaje .= "Referencia: " . $referencia . "\n";
        }

        if ($metodoEntrega === 'Recoger personalmente') {
            $horaRecoger = $request->input('horaRecoger');
            $numeroCelular = $request->input('numeroCelular');

            $mensaje .= "Hora de recogida: " . $horaRecoger . "\n";
            $mensaje .= "Número de celular: " . $numeroCelular . "\n";
        }

        if ($metodoEntrega === 'Estoy en mesa') {
            $mensaje .= "Número de mesa: " . $numeroMesa . "\n";
        }

        $accountSid = 'ACf66f6c2ed9d9435fd95fcd2fe732f36e';
        $authToken = '3aa0f54366b49b38439a51d750ae27d9';
        $twilioNumber = '+14155238886';
        //$twilioNumber = '+15736854489';
        // Número de destino de WhatsApp
        $whatsappNumber = '+593979407543';

        $client = new Client($accountSid, $authToken);

        try {
            $client->messages->create(
                "whatsapp:$whatsappNumber",
                [
                    'from' => "whatsapp:$twilioNumber",
                    'body' => $mensaje
                ]
            );

            session()->flash('success', 'El pedido se ha enviado exitosamente por WhatsApp.');
        } catch (Exception $e) {
            session()->flash('error', 'Hubo un error al enviar el pedido por WhatsApp. Por favor, inténtalo nuevamente.');
        }

        return redirect()->back();
    }


}
