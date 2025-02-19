<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Prestamo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrestamosC extends Controller
{
    function verPrestamos()
    {
        $prestamos = Prestamo::orderBy('fecha', 'desc')->get();
        return view('prestamos', compact('prestamos'));
    }
    function paginaC()
    {
        $libros = Libro::all();
        return view('paginaC', compact('libros'));
    }

    function crearPrestamo(Request $r)
    {
        $r->validate([
            'fecha' => 'required',
            'cliente' => 'required',
            'libro' => 'required'
        ]);

        $libro = Libro::find($r->libro);
        if ($libro->numEjemplares > 0) {
            $prestamos = Prestamo::where('nombreCliente', $r->cliente)->whereNull('fechaDevolucion')->get();

            if ($prestamos->IsNotEmpty()) {
                return back()->with('mensaje', "EL cliente tiene prestamos sin devolver");
            } else {
                $mensaje = "";
                try {
                    DB::transaction(
                        function () use ($libro,  &$r, &$mensaje) {
                            $prestamo = new Prestamo();
                            $prestamo->fecha = $r->fecha;
                            $prestamo->libro_id = $r->libro;
                            $prestamo->nombreC = $r->cliente;

                            if ($prestamo->save()) {
                                $libro->numEjemplares = $libro->numEjemplares - 1;
                                if ($libro->save()) {
                                    $mensaje = 'Operacion hecho';
                                }
                            }
                        }
                    );
                } catch (\Throwable $th) {
                    return back()->with('mensaje', $th->getMessage());
                }
                return back()->with('mensaje', $mensaje);
            }
        
    
        
        } else {
            return back()->with('mensaje', 'No hay suficiente stoc de ese ejemplar');
        }
    }



    function modificar($id)
    {
        $prestamo = Prestamo::find($id);

        return view('paginaM', compact('prestamo'));
    }
    function modificarPrestamo(Request $r, $id)
    {
        try {
            //code...
            $prestamo = Prestamo::find($id);
            $mensaje = '';
            if ($r->fechaD != null) {
                DB::transaction(
                    function () use ($prestamo, &$r, &$mensaje) {
                        $prestamo->fecha = $r->fecha;
                        $prestamo->nombreC = $r->cliente;
                        $prestamo->fechaD = $r->fechaD;
                        if ($prestamo->save()) {
                            $prestamo->libro->numEjemplares = $prestamo->libro->numEjemplares + 1;
                            if ($prestamo->libro->save()) {
                                $mensaje = 'Libro devuelto y stock modificado';
                            }
                        }
                    }
                );
                return back()->with('mensaje', $mensaje);
            } else {


                $prestamo->fecha = $r->fecha;
                $prestamo->nombreC = $r->cliente;
                if ($prestamo->save()) {

                    return redirect()->route('verPrestamos')->with('mensaje', 'Datos del prestamo modificado');
                }
            }
        } catch (\Throwable $th) {
            return back()->with('mensaje', $th->getMessage());
        }
    }
}
