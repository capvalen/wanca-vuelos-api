<?php

use App\Http\Controllers\AportacionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BancoController;
use App\Http\Controllers\CajaController;
use App\Http\Controllers\CajaMovimientosController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientDocumentosController;
use App\Http\Controllers\ConceptoController;
use App\Http\Controllers\CuotaController;
use App\Http\Controllers\DestinoController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\LiberadoController;
use App\Http\Controllers\LineaController;
use App\Http\Controllers\MonedaController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\PaqueteLiberadosController;
use App\Http\Controllers\PaqueteParticipanteController;
use App\Http\Controllers\PaqueteProveedorController;
use App\Http\Controllers\ParticipanteController;
use App\Http\Controllers\ParticipanteDocumentosController;
use App\Http\Controllers\ProcesoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\RelacionController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViajeController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login', [LoginController::class , 'login']);

Route::resource('clients', ClientController::class)->only('index', 'store', 'update', 'destroy', 'show');
Route::resource('paquetes', PaqueteController::class)->only('index', 'store', 'update', 'destroy', 'show');
Route::resource('monedas', MonedaController::class)->only('index', 'store', 'update', 'destroy', 'show');
Route::resource('destinos', DestinoController::class)->only('index', 'store', 'update', 'destroy', 'show');
Route::resource('cuotas', CuotaController::class)->only('index', 'store', 'update', 'destroy', 'show');
Route::resource('viajes', ViajeController::class)->only('index', 'store', 'update', 'destroy', 'show');
Route::resource('conceptos', ConceptoController::class)->only('index', 'store', 'update', 'destroy', 'show');
Route::resource('servicios', ServicioController::class)->only('index', 'store', 'update', 'destroy', 'show');
Route::resource('proveedores', ProveedorController::class)->only('index', 'store', 'update', 'destroy', 'show');
Route::resource('relaciones', RelacionController::class)->only('index', 'store', 'update', 'destroy', 'show');
Route::resource('participantes', ParticipanteController::class)->only('index', 'store', 'update', 'destroy', 'show');
Route::resource('liberados', LiberadoController::class)->only('index', 'store', 'update', 'destroy', 'show');
Route::resource('paquete-participante', PaqueteParticipanteController::class)->only('index', 'store', 'update', 'destroy', 'show');
Route::resource('paquete-proveedor', PaqueteProveedorController::class)->only('index', 'store', 'update', 'destroy', 'show');
Route::resource('paquete-liberado', PaqueteLiberadosController::class)->only('index', 'store', 'update', 'destroy', 'show');
Route::resource('bancos', BancoController::class)->only('index', 'store', 'update', 'destroy', 'show');
Route::resource('procesos', ProcesoController::class)->only('index', 'store', 'update', 'destroy', 'show');
Route::resource('cajas', CajaController::class)->only('index', 'store', 'update', 'destroy', 'show');
Route::resource('caja-movimientos', CajaMovimientosController::class)->only('index', 'store', 'update', 'destroy', 'show');
Route::resource('aportaciones', AportacionController::class)->only('index', 'store', 'update', 'destroy', 'show');
Route::resource('documentos', DocumentoController::class)->only('index', 'store', 'update', 'destroy', 'show');
Route::resource('cliente-documentos', ClientDocumentosController::class)->only('index', 'store', 'update', 'destroy', 'show');
Route::resource('participante-documentos', ParticipanteDocumentosController::class)->only('index', 'store', 'update', 'destroy', 'show');
Route::resource('lineas', LineaController::class)->only('index', 'store', 'update', 'destroy', 'show');
Route::resource('usuarios', UserController::class)->only('show', 'store', 'update');


Route::post('buscarCliente', [ClientController::class, 'buscarCliente']);
Route::post('buscarLiberado', [LiberadoController::class, 'buscarLiberado']);
Route::post('buscarParticipante', [ParticipanteController::class, 'buscarParticipante']);
Route::post('filtrarLiberado', [LiberadoController::class, 'filtrarLiberado']);
Route::post('filtrarParticipante', [ParticipanteController::class, 'filtrarParticipante']);
Route::post('filtrarCliente', [ClientController::class, 'filtrarCliente']);
Route::post('filtrarPaquete', [PaqueteController::class, 'filtrarPaquete']);
Route::post('buscarProveedor', [ProveedorController::class, 'buscarProveedor']);
Route::post('agregarParticipante', [PaqueteController::class, 'agregarParticipantePaquete']);
Route::get('cajaPorFecha/{fecha}', [CajaController::class, 'cajaPorFecha']);
Route::get('ultimaCaja', [CajaController::class, 'ultimaCaja']);
Route::get('aportacion/sumas', [ProcesoController::class, 'listarSumas']);