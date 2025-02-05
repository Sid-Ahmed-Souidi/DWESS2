<?php

use App\Http\Controllers\RecursoController;
use App\Http\Controllers\ReservaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



// Route::get('recursos',[RecursoController::class, 'index'])->withoutMiddleware(VerifyCsrfToken::class);
Route::get('recursos',[RecursoController::class, 'index']);
Route::get('reservas',[ReservaController::class, 'index']);
Route::post('reservar',[ReservaController::class, 'store']);