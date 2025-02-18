<?php

use App\Http\Controllers\ConciertoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('verConciertos');
});



Route::controller(ConciertoController::class)->group(
    function(){
        Route::get('verconciertos','obtenerConciertos')->name('verConciertos');
        Route::get('verentradas/{id}','obtenerEntradas')->name('rutaEntradas');

        
    }
);