<?php

use App\Http\Controllers\CitaC;
use App\Http\Controllers\ServicioC;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(CitaC::class)->group(
     function(){
        Route::get('citas','verCitas')->name('vercitas');
        //modificar
        Route::put('citas/{id}','modificarCita')->name('modificarC');
        //eliminar
        Route::delete('citas/{id}','borrarcita')->name('borrarC');
        Route::post('citas','crearCita')->name('crearC');
        Route::get('detalle/{id}','cargarDetalle')->name('cargarDetalle');
        Route::post('detalle/{id}','insertarDetalle')->name('crearD');


     }
);


// Route::controller(ServicioC::class)->group(
//     function(){

//        //Route::get('detalle','obtenerSevicios')->name('obtenerservicios');

   
//     }
// );

