<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;

class CitaC extends Controller
{
    //

    function verCitas(){
        //fecha descendente , hora ascendente
        $citas=Cita::orderBy('fecha','DESC')->orderBy('hora')->get();
        return view('citas',compact('citas'));
    }

    function modificarCita(Request $request){
        
    }
    function borrarCita(Request $request,$id){
        $cita=Cita::find($id);
        if($cita!=null){
            if($cita->delete()){
                return back()->with('mensaje','Cita con id '.$cita->id.' borrada');
            }
            else{
                return back()->with('mensaje','Error al borrar cita');
            }
        }
        else{
            return back()->with('mensaje','Error, cita no existe');
        }
    }
    function crearCita(Request $request){
        //Validar
        $request->validate([
            "fecha"=>"required",
            "hora"=>"required",
            "cliente"=>"required"
        ])  ; 

        $cita = new Cita();
        $cita->fecha=$request->fecha;
        $cita->hora=$request->hora;
        $cita->cliente=$request->cliente;
        if($cita->save()){
            return back()->with('mensaje','Cita con id '.$cita->id.' creada');
        }
        else{
            return back()->with('mensaje','Error, al crear la cita');
        }
    }
    function cargarDetalle($id){
        $cita =Cita::find($id);
        if(!$cita){
            return redirect()->route('vercitas')->with('mensaje','Cita no encontrada');
        }

        //Enviar la cita especifica a la vista 
        return view('detalle',compact('cita'));     }



    function insertarDetalle(){

    }
}
