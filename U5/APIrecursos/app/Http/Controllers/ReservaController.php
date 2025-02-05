<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return Reserva::all();
        } catch (\Throwable $th) {
            return response()->json(['error : '.$th->getMessage()], 500);
        }    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
  //Crear Tarea
        //validar datos 
        $request->validate(
            [
                'empleado'=>'required',
                'fechaI'=>'required',
                'fechaF'=>'required',
                'recurso'=>'required',
            ]
        );
        try {
            //crear un objeto tarea 
            $r = new Reserva ();
            $r->empleado =$request->empleado;              
            $r->fechaI =$request->fechaI;
            $r->fechaF =$request->fechaF;
            $r->recurso_id =$request->recurso;
            if($r->save()){
                return response()->json(['mensaje'=>'Reserva Creada','reserva'=>$r],201);

            }else{
                return response()->json('Error:No se ha creado la tarea',500);

            }

            
        } catch (\Throwable $th) {
            return response()->json('Error'.$th->getMessage(),500);
        }    
    }

    /**
     * Display the specified resource.
     */
    public function show(Reserva $reserva)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reserva $reserva)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reserva $reserva)
    {
        //
    }
}
