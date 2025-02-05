<?php

use App\Http\Controllers\CitasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('vercitas',[CitasController::class, 'index']);
Route::post('citas',[CitasController::class, 'store']);
Route::get('detallecita',[CitasController::class, 'obtenerDetalle']);
Route::post('finalizarcita',[CitasController::class, 'finalizarCita']);
Route::post('borrarcita',[CitasController::class, 'destroy']);
Route::get('servicios',[CitasController::class, 'obtenerServicios']);







