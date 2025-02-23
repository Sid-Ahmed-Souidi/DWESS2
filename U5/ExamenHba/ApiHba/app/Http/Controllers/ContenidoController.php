<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReproduccionResource;
use App\Models\Cliente;
use App\Models\Contenido;
use App\Models\Reproduccion;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ContenidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return Contenido::all();
        } catch (\Throwable $th) {
            return response()->json(['error : '.$th->getMessage()], 500);
        }

    }


    public function obtenerCliente(Request $request){

        $request->validate(
            [
                'email'=>'required',
            ]
            );

        $cliente = Cliente::where("email" , $request->email)->first();
        if(!$cliente){
            return response()->json('Error:El cliente no se ha encontrado',500);

        }else{  

            $reproduciones = Reproduccion::where("cliente_id" , $cliente->id)->get();
            if(sizeof($reproduciones)==0){
                return response()->json(['mensaje'=>'No tiene reproduciones este cliente'],200);
            }else{

                  $coleccionR =ReproduccionResource::collection($reproduciones);
                  if(sizeof($coleccionR)==0){
                    return response()->json(['mensaje'=>'No se genera la collecion'],200);
                  }
                return response()->json(['mensaje'=>'Reproducion Obtencion correcta','reproduciones'=>$coleccionR],201);
            }
        }
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) 
    {
        $request->validate(
            [
                'email'=>'required',
                'id_contenido' => 'required'
            ]
            );

            $cliente = Cliente::where("email" , $request->email)->first();

            if(!$cliente){
                return response()->json('Error:El cliente no se ha encontrado',500);

            }else{
                $contenido = Contenido::where("id" , $request->id_contenido)->first();
                if(!$contenido){
                    return response()->json('Error:El contenido no se ha encontrado',500);
                }else{
                    try {

                        DB::transaction(function ()  use ($cliente , $contenido ) {
                            $r = new Reproduccion();
                            $r->cliente_id = $cliente->id;
                            $r->contenido_id = $contenido->id;
                            $r->fechaIR = now();
                            
                            if($r->save()){
                                return response()->json(['mensaje'=>'Reproduccion creada correctamente'],200);
                            }else {
                               throw new \Exception('Error al crear la reproduccion');
                            }
                         });
                         return response()->json(['mensaje'=>'Reproduccion creada correctamente'],200);
                        
                    } catch (\Throwable $th) {
                        throw $th->getMessage();
                    }
                }
            }

    }

    /**
     * Display the specified resource.
     */
    public function show(Contenido $contenido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contenido $contenido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contenido $contenido)
    {
        //
    }
}
