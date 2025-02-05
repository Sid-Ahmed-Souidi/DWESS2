<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



// <?php

// use App\Http\Controllers\CitasController;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');



// // Route::get('recursos',[RecursoController::class, 'index'])->withoutMiddleware(VerifyCsrfToken::class);
// Route::get('verCitas',[CitasController::class, 'index']);
// // Route::post('crearCita',[CitasController::class, 'store']);

