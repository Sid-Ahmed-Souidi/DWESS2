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
        Route::post('vistacrear','insertar')->name('rutaInsertar');

    }
);