<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Viaje;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ViajeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return Viaje::all();
        } catch (\Throwable $th) {
            return response()->json(['error : '.$th->getMessage()], 500);
        }
    }

    public function mostrarReservas(Request $r){
        $r->validate(
            [
                'id_viaje'=>'required',
            ]
            );

            $reservas = Reserva::where('viaje_id' , $r->id_viaje)->get();
            if(sizeof($reservas)==0){
                return response()->json('Error:No se ha encontrado reservas',500);
            }else{
                return response()->json(['mensaje'=>'Obtencion de reservas correcta',$reservas],201);

            }





    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'id_viaje' => 'required',
                'fechaS' => 'required',
                'nombreCliente' => 'required',
                'numPersonas' => 'required',

            ]
            );

            $viaje = Viaje::where("id" , $request->id_viaje)->first();

            if(!$viaje){
                return response()->json('Error:El viaje no se ha encontrado',500);

            }else{

                if($viaje->numPlazas<$request->numPersonas){
                    return response()->json('Error:No hay suficcientes plazas',500);

                }else{
                    try {

                        DB::transaction(function ()  use ($viaje , $request ) {
                            $r = new Reserva();
                            $r->viaje_id = $request->id_viaje;
                            $r->fechaS = $request->fechaS;
                            $r->nombreCliente = $request->nombreCliente;
                            $r->numPersonas = $request->numPersonas;
                            $r->precioTotal = $r->precioPersona * $request->numPersonas;
                            $r->anulada = 0;
                            
                            if($r->save()){
                                $viaje->numPlazas=$viaje->numPlazas-$request->numPersonas;
                                if($viaje->save()){
                                    return response()->json(['mensaje'=>'reserva creada correctamente'],200);

                                }else{
                                    throw new \Exception('Error de reducir el numero de plazas');
                                }

                            }else {
                               throw new \Exception('Error al crear la reproduccion');
                            }
                         });
                         return response()->json(['mensaje'=>'reserva creada correctamente'],200);
                        
                    } catch (\Throwable $th) {
                        throw $th->getMessage();
                    }
                }
            }



    }

    /**
     * Display the specified resource.
     */
    public function show(Viaje $viaje)
    {
     


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $request->validate(
            [
                'id' => 'required',
            ]
            );
            $reserva = Reserva::where('id' , $request->id)->first();
            if(!$reserva){
                return response()->json('Error:La reserva no se ha encontrado',500);

            }else{
                $reserva->anulada = 1;
                if($reserva->save()){
                    return response()->json(['mensaje'=>'reserva finalizada correctamente'],200);

                }



            }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Viaje $viaje)
    {
        //
    }
}
