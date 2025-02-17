<?php


namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Prestamo;
use Illuminate\Routing\Controller;

class PrestamoC extends Controller
{

    function verPrestamos(){
        //fecha descendente , hora ascendente
        $prestamos=Prestamo::all();
        return view('verprestamos', compact('prestamos'));
    }

    function obtenerLibros(){
        //fecha descendente , hora ascendente
        $libros=Libro::all();
        return view('vistacrear', compact('libros'));
    }

    

    function insertar(){
       
    }

}
