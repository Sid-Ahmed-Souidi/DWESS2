<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\DetalleCitaController;
use App\Http\Controllers\ServicioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('citaC', [CitaController::class,'store'] );
Route::get('citas', [CitaController::class,'index'] );
Route::get('servicios', [ServicioController::class,'index'] );
Route::post('detalleCita', [DetalleCitaController::class,'show'] );
Route::post('citaInt', [CitaController::class,'introducirCita'] );
Route::post('citaBor', [CitaController::class,'BorrarDetCita'] );
Route::post('citaDel', [CitaController::class,'destroy'] );
Route::post('citaFin', [CitaController::class,'finalizarCita'] );