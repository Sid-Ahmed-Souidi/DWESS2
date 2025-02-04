<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class ProductosC extends Controller
{
    function __construct()
    {
        //Comprobar si hay us logueado con Middelware Auth
        $this->middleware('auth');
    }

    function verProductos(){
        $productos=Producto::all();
        return view('productos/verProductos',compact('productos'));
        //return view('productos/verProductos',(['productos'=>$productos]);

    }
}
