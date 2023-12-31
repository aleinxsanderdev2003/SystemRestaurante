<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdministracionController;
use App\Http\Controllers\ClasificacionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsuarioManejador;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\RestauranteController;
use App\Http\Controllers\EnviowhatsappController;
use App\Http\Controllers\ContactoController;
use Twilio\Rest\Client;
/*
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/contacto', [ContactoController::class, 'mostrarContacto'])->name('contacto');
Route::get('/administracion/contacto', [ContactoController::class, 'mostrarContactoAdministrar'])->name('administracion.contacto');
Route::post('/administracion/contacto', [ContactoController::class, 'actualizarContacto'])->name('contacto.actualizar');


Route::get('/', [MenuController::class, 'principal'])->name('layouts.app');
Route::get('/menu/productos', [MenuController::class, 'productos'])->name('menu.app');

Route::get('/restaurante/menu', [PedidoController::class, 'index'])->name('restaurante.menu');

Route::get('/orden', [PedidoController::class, 'orden'])->name('restaurante.orden');



/*rutas de login */
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/admin', [LoginController::class, 'index'])->name('login.iniciar_sesion');


/*rutas de administracion */
Route::get('/administracion/main',[AdministracionController::class, 'index'])->name('administracion.main');
Route::get('/user-administracion', [AdministracionController::class, 'user'])->name('administracion.usuario');

Route::get('/logo-administracion', [AdministracionController::class, 'logo'])->name('administracion.logo');
Route::get('/administracion', [AdministracionController::class, 'layout'])->name('administracion.layout');
/*USUARIO ADMINISTRACION*/
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::put('/user-administracion/{id}', [AdministracionController::class, 'update'])->name('administracion.usuario.update');
/*ACCIONES DE PRODUCTOS  */
Route::get('/administracion/productos', [AdministracionController::class, 'productos'])->name('administracion.productos');
Route::get('producto_agregar', [AdministracionController::class, 'agregarProductoForm'])->name('administracion.producto_agregar');
Route::post('producto_agregar', [AdministracionController::class, 'guardarProducto'])->name('administracion.producto_guardar');
Route::delete('administracion/productos/{id}', [AdministracionController::class, 'eliminarProducto'])->name('administracion.producto_eliminar');

/*CLASIFICACION DE PLATOS*/
Route::get('/administracion/clasificacion_productos', [AdministracionController::class, 'mostrarCategoria'])->name('administracion.clasificacion_productos');

Route::post('/administracion/clasificacion_platos', [AdministracionController::class, 'guardarClasificacionPlato'])->name('administracion.clasificacion_productos.store');
Route::get('/administracion/clasificacion_platos/{id}/edit', [AdministracionController::class, 'editarClasificacionPlato'])->name('administracion.clasificacion_productos.edit');
Route::put('/administracion/clasificacion_platos/{id}', [AdministracionController::class, 'actualizarClasificacionPlato'])->name('administracion.clasificacion_productos.update');

Route::delete('/administracion/clasificacion_platos/{id}', [AdministracionController::class, 'eliminarClasificacionPlato'])->name('administracion.clasificacion_productos.destroy');


/*LOGO*/

Route::post('/guardar-logo', [LogoController::class, 'guardar'])->name('guardar-logo');

Route::post('/actualizar-logo', [LogoController::class, 'update'])->name('actualizar-logo');

Route::get('/mostrar-logo', [LogoController::class, 'mostrarLogo'])->name('mostrar-logo');
/*PEDIDOS SOLICITUD*/

Route::get('/menu', [ContactoController::class, 'mostrarContactoMenu'])->name('contacto.obtener');


Route::post('/pedido/retirar/{indice}', [RestauranteController::class, 'retirar'])->name('pedido.retirar');

Route::post('/orden', [RestauranteController::class, 'store'])->name('orden.store');

/*Envio a whatsapp*/
Route::get('generar-enlace-whatsapp', [EnviowhatsappController::class, 'generarEnlaceWhatsApp'])->name('resturante.whatsapp');
Route::get('/restaurante/enviar-pedido-whatsapp/{nombreCliente}/{metodoEntrega}', [PedidoController::class, 'enviarPedidoWhatsApp'])->name('pedido.enviar');

Route::post('/restaurante/enviar-pedido-whatsapp', [PedidoController::class, 'enviarPedidoWhatsApp'])->name('enviar.pedido.whatsapp');
// routes/web.php

// RUTAS DE USUARIO EN LA WEB
Route::get('/inicioSesionUsuario', [UsuarioManejador::class, 'mostrarLogin'])->name('usuario.login');
Route::get('/registroUsuario', [UsuarioManejador::class, 'mostrarRegister'])->name('usuario.register');
Route::get('/Portal-Usuario', [UsuarioManejador::class, 'mostrarPanel'])->name('usuario.panel');




// Otras rutas existentes






// Otras rutas existentes

