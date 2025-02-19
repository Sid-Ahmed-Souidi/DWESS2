<?php

use App\Http\Controllers\PrestamoC;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('verP');
});



Route::controller(PrestamoC::class)->group(
    function(){
        Route::get('verprestamos','verPrestamos')->name('verP');
        Route::get('vistacrear','obtenerLibros')->name('vistaCrear');
        Route::post('verprestamos','insertar')->name('insertarP');
        Route::get('rutamodificar/{id}','obtenerPrestamo')->name('rutaModificar');
        Route::post('mprestamos','modificarPrestamo')->name('modificarP');


    }
);