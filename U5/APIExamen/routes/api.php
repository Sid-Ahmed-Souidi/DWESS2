<?php

use App\Http\Controllers\ContenidoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('contenidos', [ContenidoController::class,'index']);
Route::post('reproduccion', [ContenidoController::class,'store']);
Route::get('obtenercliente', [ContenidoController::class,'obtenerCliente']);





