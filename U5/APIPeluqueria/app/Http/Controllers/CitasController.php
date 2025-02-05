<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Detalle_cita;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Exception;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return Cita::all();
        } catch (\Throwable $th) {
            return response()->json(['error : '.$th->getMessage()], 500);
        }
    }




    
    public function obtenerDetalle(Request $request)
    {
        $request->validate(
            [
                'id'=>'required',
            ]
        );
        try {
            
            $cita = Cita::find($request->id);
            $detallesCitas = $cita->detalle_citas();
            if(sizeof($detallesCitas)==0){
                throw new Exception('No hay ningún servicio en esta cita');
            }
            return $cita->detalle_citas();
        } catch (\Throwable $th) {
            return response()->json(['error : '.$th->getMessage()], 500);
        }
    }




    public function obtenerServicios()
    {
        try {
            return Servicio::all();
        } catch (\Throwable $th) {
            return response()->json(['error : '.$th->getMessage()], 500);
        }
    }







     public function finalizarCita(Request $request){
        $request->validate(
            [
                'id'=>'required',
            ]
        );
        try {
            $cita = Cita::find($request->id);
            $cita->finalizada = 1;
            $cita->save();

            return response()->json(['mensaje' => 'Cita finalizada correctamente', 'cita' => $cita], 200);

        } catch (\Throwable $th) {
            return response()->json(['error : '.$th->getMessage()], 500);
        }

     }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $request->validate(
            [
                'fecha'=>'required',
                'hora'=>'required',
                'cliente'=>'required',
            ]
        );
        try {
            //crear un objeto tarea 
            $c = new Cita();
            $c->fecha =$request->fecha;              
            $c->hora =$request->hora;
            $c->cliente =$request->cliente;
            if($c->save()){
                return response()->json(['mensaje'=>'Cita Creada','cita'=>$c],201);

            }else{
                return response()->json('Error:No se ha creado la cita',500);

            }

            
        } catch (\Throwable $th) {
            return response()->json('Error'.$th->getMessage(),500);
        }    
    }

    /**
     * Display the specified resource.
     */
    public function show(Cita $citas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cita $citas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $request->validate(
            [
                'id'=>'required',
            ]
        );  
        $cita = Cita::find($request->id);
        $detallesCitas = $cita->detalle_citas();
        if(sizeof($detallesCitas)==0){
            if($cita->delete()){
                return response()->json(['mensaje'=>'Cita Borrada'],201);
            }else{
                return response()->json('Error:al borrar Cita',500);
            }

        }else{
            return response()->json('Error:La cita tiene detalles',500);


        }




    }
}
