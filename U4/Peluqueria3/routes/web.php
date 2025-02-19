<?php

use App\Http\Controllers\CitaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('rutaVerCitas');
 
});


Route::controller(CitaController::class)->group(
    function(){
        Route::get('vercitasVista','obtenercitas')->name('rutaVerCitas');
        Route::post('crearcita','crearCita')->name('rutaCrearCita');
        Route::post('eliminarcita/{id}','eliminarCita')->name('rutaEliminarCita');
        Route::get('mostrardatos/{id}','mostrarCita')->name('rutaDetalleCita');
        Route::post('insertardetalle/{id}','insertarDetalle')->name('rutaInsertarDetalle');
        Route::put('finalizarcita/{id}','finalizarCita')->name('rutaFinalizarCita');



    }
);
