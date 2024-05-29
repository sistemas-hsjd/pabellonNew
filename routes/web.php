<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AplicationController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\InformeBiopsiaController;
use App\Http\Controllers\SolicitudPabellonController;
use App\Http\Controllers\UserController;

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
});

Route::prefix('user')->group(function () {
    Route::post('/registrar', [UserController::class, 'store']);
    Route::post('/get-info', [UserController::class, 'editUserInfo']);
    Route::post('/eliminar', [UserController::class, 'eliminarUser']);
    Route::post('/reset-password', [UserController::class, 'resetPassword']);
});

Route::post('get-fonasa', [UserController::class, 'getFonasa']);

Route::post('get-paciente-by-rut', [UserController::class, 'getPaciente']);

