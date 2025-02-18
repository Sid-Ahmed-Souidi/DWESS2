<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Concierto;
use App\Models\Entrada;
use Illuminate\Http\Request;

class ConciertoController extends Controller
{

function obtenerConciertos(){

    $conciertos = Concierto::orderBy('titulo')->get();
    return view('vistaconciertos', compact('conciertos'));
}


function obtenerEntradas($id){

    $concierto= Concierto::find($id);
    $entradas=Entrada::where('concierto_id' , $id)->get();

    if(!$concierto){
        return back()->with('mensaje' ,'No se ha obtenido el concierto');
    }else{

        if($entradas->isEmpty()){
            return back()->with('mensaje' ,'No se han obtenido entradas del concierto');

        }else{
            return view('vistaentradas', compact('concierto' , 'entradas'));


        }

    }



    

}



}
