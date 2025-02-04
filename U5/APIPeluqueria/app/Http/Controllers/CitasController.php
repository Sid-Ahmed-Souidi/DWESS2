<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        // <input type="date" name="fecha" id="fecha" required/>
        // <input type="time" name="hora" id="hora"/>
        // <label for="">Cliente</label>
        // <input type="text" name="desc" id="desc" placeholder="cliente"/>
        // <label for="">Finalizada</label>
        // <button type="button" name="crear" onclick="crearCita()">crear</button>
        $request->validate(
            [
                'fecha'=>'required',
                'hora'=>'required',
                'cliente'=>'required',
            ]
        );
        try {
            //crear un objeto tarea 
            $c = new Cita ();
            $c->fecha =$request->fecha;              
            $c->hora =$request->hora;
            $c->cliente =$request->cliente;
            $c->finalizada =0;
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
    public function destroy(Cita $citas)
    {
        //
    }
}
