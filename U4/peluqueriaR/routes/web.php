<?php

use App\Http\Controllers\CitaC;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //al acceder al public nos carga directamente citas 
    return redirect()->route('verCitas');
});


Route::controller(CitaC::class)->group(
    function(){
        Route::get('citas','verCitas')->name('verCitas');
        Route::put('citas/{id}','modificarCita')->name('modificarC');
        Route::delete('citas/{id}','borrarCita')->name('borrarC');
        Route::post('citas','crearCita')->name('crearC');
        Route::get('detalle/{id}','cargarDetalle')->name('crearDetalle');
        Route::post('detalle/{id}','insertarDetalle')->name('crearD');

    }
);
