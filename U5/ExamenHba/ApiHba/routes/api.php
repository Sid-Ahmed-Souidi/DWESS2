<?php

use App\Http\Controllers\ContenidoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('vercontenidos',[ContenidoController::class, 'index']);
Route::get('reprocliente',[ContenidoController::class, 'obtenerCliente']);
Route::post('crearRepro',[ContenidoController::class, 'store']);




