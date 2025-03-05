<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use App\Models\Billete;
use App\Models\Conductor;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ConductorC extends Controller
{

    function irPrincipal(){

        return view('vistaconductor');
    }


    function irDetalles(){

        return view('vistadetalles');
    }

    


    function crearServicio(Request $r)
    {
        try {

            $conductor = Conductor::where('dni', $r->dni)->first();
            if (!$conductor) {
                return back()->with('mensaje', 'No se ha encontrado el conductor');
            } else {
                
                $servicio = Servicio::where('conductor_id', $conductor->id)->first();
                if ($servicio) {
                    $billetes = Billete::where('servicio_id', $servicio->id)->get();
                    return view('vistadetalles', compact('servicio', 'conductor' ,'billetes'));
                } else {
                    $conductor = Conductor::where('dni', $r->dni)->first();
                        $servicio = new Servicio();
                        $servicio->conductor_id = $conductor->id;
                        $servicio->fecha = date('Y-m-d');
                        $servicio->recaudacion = 0;
                        if ($servicio->save()) {
                            $billetes = Billete::where('servicio_id', $servicio->id)->get();
                            return view('vistadetalles', compact('servicio', 'conductor' , 'billetes'));

                        } else {
                            return back()->with('mensaje', 'Error al crear el servicio');
                        }                   
                     
                   
                }
            }        } catch (\Throwable $th) {
                         echo   $th->getMessage();
        }
          
      
    }

    function crearBillete(Request $r , $id_servicio){
        try {
            DB::transaction(function ()  use ($r ,$id_servicio) {
            if($r->precioB=="general"){
                $billete = new Billete();
                $billete->servicio_id = $id_servicio;
                $billete->hora = date('H:i');
                $billete->precio = 1.5;
                $billete->anulado = 0 ;
                if($billete->save()){
                    return redirect()->route('rutaDetalles')->with('mensaje', 'Billete creado con éxito');

                }

            }else{
                $billete = new Billete();
                $billete->servicio_id = $id_servicio;
                $billete->hora = date('H:i');
                $billete->precio = 1;
                $billete->anulado = 0 ;
                if($billete->save()){
                    return redirect()->route('rutaDetalles')->with('mensaje', 'Billete creado con éxito');
                }
            }
        });

        return redirect()->route('rutaDetalles')->with('mensaje', 'Billete creado con éxito');

        } catch (\Throwable $th) {
            echo   $th->getMessage();
        }
          





    }

    
}
