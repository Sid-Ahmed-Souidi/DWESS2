<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cita;
use App\Models\DetalleCita;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Composer;

class CitaController extends Controller
{


function obtenerCitas(){
     $citas = Cita::orderBy('fecha', 'desc')->get();
     return view('vistacitas' ,compact('citas'));

}


function crearCita(Request $r){

    $r->validate([
        "fecha"=>"required",
        "hora"=>"required",
        "cliente"=>"required"
    ]);

    $c = new Cita();
    $c->fecha = $r->fecha;
    $c->hora = $r->hora;
    $c->cliente = $r->cliente;
    $c->total = 0;


    if($c->save()){
        return redirect()->route('rutaVerCitas')->with('mensaje', 'Cita creada con id'.$c->id);

    }else{
        return redirect()->route('rutaVerCitas')->with('mensaje', 'Error al crear la cita');

        }

}


function eliminarCita($id){

    $cita = Cita::where('id' , $id)->first();
    if($cita){
        if($cita->delete()){
            return redirect()->route('rutaVerCitas')->with('mensaje', 'cita eliminada'.$cita->id);
        }else{
            return redirect()->route('rutaVerCitas')->with('mensaje', 'cita error eliminada');
        }
    }else{
        return redirect()->route('rutaVerCitas')->with('mensaje', 'cita error al buscar citas');

    }
}


function insertarDetalle(Request $r , $id_cita){
    $servicio = Servicio::where('id' , $r->serId)->first();
    if($servicio){
        $d = new DetalleCita();
        $d->cita_id= $id_cita;
        $d->servicio_id= $r->serId;
        $d->precio = $servicio->precio;
        if($d->save()){
            return redirect()->route('rutaDetalleCita', $id_cita)->with('mensaje', 'Se ha añadido el detalle cita');

        }else{
            return redirect()->route('rutaDetalleCita', $id_cita)->with('mensaje', 'Error al añadir el detalle cita');

        }
    }
}


function mostrarCita($id){
    $cita = Cita::where('id' , $id)->first();
    $servicios = Servicio::all();
    $detalles = DetalleCita::where('cita_id', $id)->get();
    return view('vistaDetalle' ,compact('cita' ,'servicios' ,'detalles'));

}

// The GET method is not supported for route finalizarcita/4. Supported methods: POST.
function finalizarCita($id){
    $total=0;
    $cita = Cita::find($id);

    if(!$cita){
        return redirect()->route('rutaDetalleCita', $id)->with('mensaje', 'No se ha encontrado la cita a finalizar');
    }
    foreach($cita->DetalleCita() as $detalle){
        $total+=$detalle->precio;
    }
    $cita->total=$total;

    if($cita->save()){
        return redirect()->route('rutaDetalleCita', $id)->with('mensaje', 'La cita ha finalizado con id'.$id);

    }else{
        return redirect()->route('rutaDetalleCita', $id)->with('mensaje', 'La cita NO se ha finalizado ');

    }

}



}
