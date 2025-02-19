<?php

use App\Http\Controllers\PrestamosC;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('verPrestamos');
});


Route::controller(PrestamosC::class)->group(
    function () {
        Route::get('verPrestamos', 'verPrestamos')->name('verPrestamos');
        Route::get('paginaC', 'paginaC')->name('paginaC');
        Route::post('crearPrestamo', 'crearPrestamo')->name('crearPrestamo');
        Route::get('modificar/{id}', 'modificar')->name('modificar');
        Route::post('modificarPrestamo/{id}', 'modificarPrestamo')->name('modificarPrestamo');
    }
);
