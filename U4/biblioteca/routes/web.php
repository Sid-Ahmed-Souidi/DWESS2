<?php

use App\Http\Controllers\PrestamoC;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('verprestamos');

});


Route::controller(PrestamoC::class)->group(
    function(){
       Route::get('prestamos','verPrestamos')->name('verprestamos');
       //modificar
       Route::get('crearprestamos','obtenerLibros')->name('obtenerFormulario');
       Route::post('prestamos','crearPrestamo')->name('crearP');
       Route::get('modificarprestamos/{id}','obtenerFormularioM')->name('obtenerformulariom');
       Route::get('modificarprestamos/{id}','modificarPrestamo')->name(' modificarprestamo');



    //    Route::put('modificarPrestamo/{id}','modificarP')->name('modificarP');
    //    //eliminar
    //    Route::delete('citas/{id}','borrarcita')->name('borrarC');
    //    Route::post('citas','crearCita')->name('crearC');
    //    Route::get('detalle/{id}','cargarDetalle')->name('cargarDetalle');
    //    Route::post('detalle/{id}','insertarDetalle')->name('crearD');


    }
);