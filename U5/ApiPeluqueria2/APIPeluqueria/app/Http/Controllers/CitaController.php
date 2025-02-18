<?php

namespace App\Http\Controllers;

use App\Http\Resources\CitaResource;
use App\Models\Cita;
use App\Models\DetalleCita;
use App\Models\Servicio;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CitaController extends Controller
{
    
    public function BorrarDetCita(Request $request){
        $request->validate([
            'id_detalleCita' => 'required',
            'id_cita' => 'required',
        ]);
        $cita = Cita::where('id',$request->id_cita)->first();
        if ($cita->finalizada==1) {
            return response()->json('La cita esta finalizada', 500);
        }else {
            $dCita = DetalleCita::where('id',$request->id_detalleCita)->first();
            if ($dCita->delete()) {
                return response()->json('Detalle borrado', 200);
            }else {
                return response()->json('Erorr al borrar detalle', 500);
            }
        }
    }


    public function finalizarCita(Request $request)
    {
        $request->validate([
            'id_cita' => 'required'
        ]);
        $cita = Cita::where('id',$request->id_cita)->first();
        $cita->finalizada = 1;
        if ($cita->save()) {
            return response()->json('Cita finalizada', 200);
        }else {
            return response()->json('Error al finalizar cita', 500);
        }
    }

    public function introducirCita(Request $request)
    {
        $request->validate([
            'id_servicio' => 'required',
            'id_cita' => 'required',
        ]);
        $cita = Cita::where('id',$request->id_cita)->first();
        if ($cita->finalizada==1) {
            return response()->json('La cita esta finalizada', 500);
        }else {
            $servicio = Servicio::where('id',$request->id_servicio)->first();
            $dCita = new DetalleCita();
            $dCita->cita_id = $request->id_cita;
            $dCita->servicio_id = $request->id_servicio;
            $dCita->precio = $servicio->precio;
            if ($dCita->save()) {
                return response()->json('Detalle almacenado', 200);
            }else {
                return response()->json('Erorr al almacenar detalle', 500);
            }
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $citas = Cita::all();
        return CitaResource::collection($citas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required',
            'hora' => 'required',
            'cliente' => 'required'
        ]);

        try {
                $cita = new Cita();
                $cita->fecha = $request->fecha;
                $cita->hora = $request->hora;
                $cita->cliente = $request->cliente;
                if ($cita->save()) {
                    return response()->json('Pedido realizado:', 200);
                }
            else {
                throw new Exception('Error al guardar');
            }
        } catch (\Throwable $th) {
            return response()->json('Error:' . $th->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cita $cita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cita $cita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'id_cita' => 'required',
        ]);
        $dCitas = DetalleCita::where('cita_id',$request->id_cita)->first();
        if ($dCitas==null) {
            $cita = Cita::where('id',$request->id_cita)->first();
            if ($cita->delete()) {
                return response()->json('Cita borrada', 200);
            }else {
                return response()->json('Error al borrar cita', 500);
            }
        }else {
            return response()->json('Error la cita tiene detalles', 500);
        }
    }
}
