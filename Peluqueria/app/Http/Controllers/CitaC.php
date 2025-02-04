<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\DetalleCita;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CitaC extends Controller
{   
    function verCitas(){
        //orderBy es con el get
        $citas=Cita::orderBy('fecha','DESC')->get();
        return view('citas',compact('citas'));



    }

    function modificarCita(Request $request,$id) {

          //recuperar la cita
          $cita=Cita::find($id);
          if($cita!=null){
            //Calculamos total 
            foreach($cita->obtenerDetalle() as $d){
                $cita->total+=$d->precio;
            }
          }

          if($cita->save()){
            return back()->with('mensaje','Cita finalizada');
          }else{
            return back()->with('mensaje','Error , no se ha finalizado la cita');

          }
  

      

    }


    function borrarCita(Request $request ,$id){
        //recuperar la cita
        $cita=Cita::find($id);
        if($cita!=null){
            // if(empty($cita->obtenerDetalle()))
            if($cita->delete()){
                return back()->with('mensaje','Cita con id'.$cita->id.' borrada');

                
            }else{
                return back()->with('mensaje','Cita con id'.$cita->id.' borrar cita');

            }
        }else{
            return back()->with('mensaje','Error , cita no existe');

        }


    }


    function crearCita(Request $request){
        $request->validate([
            "fecha"=>"required",
            "hora"=>"required",
            "cliente"=>"required"
        ]);
        $cita= new Cita();
        $cita->fecha=$request->fecha;
        $cita->hora=$request->hora;
        $cita->cliente=$request->cliente;
        if($cita->save()){
            return back()->with('mensaje','Cita con id'.$cita->id.' creada');
        }else{

            return back()->with('mensaje','Error al crear la cita creada');
        }
    }


    function cargarDetalle($id){

        //buscar la cita por ID

        $cita =Cita::find($id);
        $servicios=Servicio::all();
        if(!$cita){
            return redirect()->route('vercitas')->with('mensaje','Cita no encontrada');
        }

        //Enviar la cita especifica a la vista 
        return view('detalle',compact('cita' ,'servicios')); 
    }

    function insertarDetalle(Request $request ,$id){

        $cita =Cita::find($id);
        if($cita!=null){

                //el servicio esta en el request del formulario
                $servicio=Servicio::find($request->servicio);
                if($servicio!=null){
                    //crear el detalle
                    $d=new DetalleCita();
                    $d->cita_id=$cita->id;
                    $d->servicio_id=$servicio->id;
                    $d->precio=$servicio->precio;
                    if($d->save()){
                        return back()->with('mensaje','Servicio añadido');
                    }else{
                        return back()->with('mensaje','Error no se ha añadido el servicio');
    
                    }
        }else{

            return redirect()->route('vercitas')->with('mensaje','Cita no encontrada');


    

        }}else{
        return back()->with('mensaje','Error no existe el servicio');

         }



    }



    
}
