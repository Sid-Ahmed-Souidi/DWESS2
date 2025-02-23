<?php

use App\Http\Controllers\ViajeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');






Route::get('mostrarviajes',[ViajeController::class, 'index']);
Route::get('mostrarreserva',[ViajeController::class, 'mostrarReservas']);
Route::post('crearreserva',[ViajeController::class, 'store']);
Route::put('anularreserva',[ViajeController::class, 'update']);


// Route::get('reprocliente',[ContenidoController::class, 'obtenerCliente']);
// Route::post('crearRepro',[ContenidoController::class, 'store']);
