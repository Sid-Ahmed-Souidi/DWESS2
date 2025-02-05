<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Contenido;
use App\Models\Reproduccion;
use DateTime;
use Illuminate\Http\Request;

class ContenidoController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return Contenido::all();
        } catch (\Throwable $th) {
            $th->getMessage();
        }
    }






   public function  obtenerCliente(Request $request) {
    $request->validate(
        [
            'email'=>'required',
        ]
    );
    try {
        // $cliente = Cliente::where($request->email);
        $cliente = Cliente::where('email',$request->email)->first();
        if($cliente==null){
             return response()->json('Error:El cliente no se ha encontrado',500);
         }
         else {
            $r[] = Reproduccion::where('cliente_id',$cliente->id)->get();
            if(sizeof($r)==0){
                return response()->json('Error:No  hay reproducciones para este cliente',500);
            }

            return response()->json(['mensaje'=>'Reproducion Obtencion correcta','reproducion'=>$r],201);


         }




        //crear un objeto tarea 
      
    

        
    } catch (\Throwable $th) {
        return response()->json('Error'.$th->getMessage(),500);
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
                'id_contenido'=>'required',
            ]
        );
        try {

            $contenido = Contenido::find($request->id_contenido);
            if($contenido==null){
                return response()->json('Error:No se ha encontrado el contenido',500);
            }

            // $cliente = Cliente::where($request->email);
            $cliente = Cliente::where('email',$request->email)->first();
            
            if($cliente==null){
                 return response()->json('Error:Email no se ha encontrado',500);
             }


            //crear un objeto tarea 
            $c = new Reproduccion();
            $c->cliente_id =$cliente->id;              
            $c->contenido_id =$contenido->id;
            $c->fechaIR = new DateTime();
            if($c->save()){
                return response()->json(['mensaje'=>'Reproducion Creada','cita'=>$c],201);

            }else{
                return response()->json('Error:No se ha creado la reproduccion',500);

            }

            
        } catch (\Throwable $th) {
            return response()->json('Error'.$th->getMessage(),500);
        }        }

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
