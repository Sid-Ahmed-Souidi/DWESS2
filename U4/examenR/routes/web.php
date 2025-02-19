<?php

use App\Http\Controllers\ConductorC;
use App\Models\Conductor;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('vistaconductor');
});





Route::controller(ConductorC::class)->group(
    function(){
        Route::get('paginalprincipal','irPrincipal')->name('rutaPrincipal');
        Route::get('paginadetalles','irDetalles')->name('rutaDetalles');
        Route::post('gestionbillete','crearServicio')->name('rutaGestionBilletes');
        Route::post('crearbillete/{id}','crearBillete')->name('rutaCrearBillete');








    }
);


