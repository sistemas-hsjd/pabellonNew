<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AplicationController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\InformeBiopsiaController;
use App\Http\Controllers\SolicitudPabellonController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\ConsentimientoController;
use App\Http\Controllers\PausaRecuperacionController;
use App\Http\Controllers\PausaRecuentoController;
use App\Http\Controllers\PausaIntraController;
use App\Http\Controllers\PausaSeguridadController;
use App\Http\Controllers\PausaAnestesiaController;
use App\Http\Controllers\PausaPabellonController;
use App\Http\Controllers\PausaPreController;
use App\Http\Controllers\GetController;

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

Route::get('{view}', AplicationController::class)->where('view', '^(?!api).*$');
Route::post('buscar-ficha', [PacienteController::class, 'buscarFicha']);
Route::get('pacientes', [AplicationController::class, 'verPacientes']);
Route::post('get-sexo', [AplicationController::class, 'getSexo']);
Route::post('get-prevision', [AplicationController::class, 'getPrevision']);

Route::post('get-epicrisis', [PacienteController::class, 'getEpicrisis']);
Route::post('get-solicitudes', [PacienteController::class, 'getSolicitudes']);
//Route::get('solicitudPabellonDetalle/{id}', [SolicitudPabellonController::class, 'detalle']);
// Route::get('/ejemplo', [SolicitudPabellonController::class, 'index']);

Route::prefix('api')->group(function () {
    Route::get('/detalle/{id}', [SolicitudPabellonController::class, 'detalle']);
    Route::get('/get-info', [UserController::class, 'getInfoCreateUser']);
    Route::get('/get-users', [UserController::class, 'index']);
    Route::get('/clasificacion-fonasa', [PacienteController::class, 'getClasificacionFonasa']);
    Route::get('/create-pre-pausa', [PausaPreController::class, 'getPausaPre']);
    Route::post('/get-diagnosticos', [GetController::class, 'getDiagnosticos']);
    Route::post('/get-diagnosto-id', [GetController::class, 'getDiag']);
   
});

Route::prefix('user')->group(function () {
    Route::post('/registrar', [UserController::class, 'store']);
    Route::post('/get-info', [UserController::class, 'editUserInfo']);
    Route::post('/eliminar', [UserController::class, 'eliminarUser']);
    Route::post('/reset-password', [UserController::class, 'resetPassword']);
});

Route::prefix('paciente')->group(function () {
    Route::post('/registrar', [PacienteController::class, 'store']);
});

Route::post('get-fonasa', [UserController::class, 'getFonasa']);
Route::post('get-comunas', [GeneralController::class, 'getComunas']);
Route::post('get-previsiones', [GeneralController::class, 'getPrevision']);

Route::post('get-clasif-fonasa', [GeneralController::class, 'getClasificacionFonasa']);
Route::post('get-paciente-by-rut', [UserController::class, 'getPaciente']);
Route::post('get-sexos', [GeneralController::class, 'getSexos']);

Route::prefix('consentimiento')->group(function () {
    Route::post('/registrar', [ConsentimientoController::class, 'store']);
});

Route::prefix('pausa')->group(function () {
    Route::post('/revertir', [PausaRecuperacionController::class, 'revertirAlta']);
    Route::delete('/eliminar/{id}', [PausaRecuperacionController::class, 'eliminar']);
    Route::delete('/recuento/eliminar/{id}', [PausaRecuentoController::class, 'eliminar']);
   
});

Route::prefix('pausaIntro')->group(function () {
    Route::delete('/eliminar/{id}', [PausaIntraController::class, 'eliminar']);
    Route::post('/get-info', [PausaIntraController::class, 'getInfo']);
    Route::post('/agregar-acceso-vascular', [PausaIntraController::class, 'agregarAccesoVascular']);
    Route::post('/eliminar-acceso-vascular', [PausaIntraController::class, 'eliminarAccesoVasc']);
    Route::post('/eliminar-drenaje', [PausaIntraController::class, 'eliminarDrenaje']);
    Route::post('/agregar-drenaje', [PausaIntraController::class, 'agregarDrenaje']);
    Route::post('/get-drenaje', [PausaIntraController::class, 'getDrenaje']);
    Route::post('/buscar', [PausaIntraController::class, 'buscarAccesoVascular']);
    Route::post('/registrar', [PausaIntraController::class, 'store']);
});

Route::prefix('pausaSeguridad')->group(function () {
    Route::delete('/eliminar/{id}', [PausaSeguridadController::class, 'eliminar']);
    Route::post('/get-info', [PausaSeguridadController::class, 'getInfo']);
    Route::post('/registrar', [PausaSeguridadController::class, 'store']);
});

Route::prefix('pausaAnestesia')->group(function () {
    Route::delete('/eliminar/{id}', [PausaAnestesiaController::class, 'eliminar']);
    Route::post('/get-info', [PausaAnestesiaController::class, 'getInfo']);
    Route::post('/registrar', [PausaAnestesiaController::class, 'store']);
}); 

Route::prefix('pausaPabellon')->group(function () {
    Route::delete('/eliminar/{id}', [PausaPabellonController::class, 'eliminar']);
    Route::post('/get-info', [PausaPabellonController::class, 'getInfo']);
    Route::post('/registrar', [PausaPabellonController::class, 'store']);
});

Route::prefix('pausaPre')->group(function () {
    Route::delete('/eliminar/{id}', [PausaPreController::class, 'eliminar']);
    Route::post('/get-info', [PausaPreController::class, 'getPausaPre']);
    Route::post('/registrar', [PausaPreController::class, 'store']);
});