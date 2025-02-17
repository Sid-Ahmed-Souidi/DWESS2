<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prestamo;
use App\Models\Libro;
use Illuminate\Support\Facades\DB;

class PrestamoC extends Controller
{

    function verPrestamos()
    {
        //orderBy es con el get
        $prestamos = Prestamo::orderBy('fecha', 'DESC')->get();
        return view('prestamos', compact('prestamos'));
    }
    // $table->id();
    // $table->date('fecha');
    //             // onUpdate('cascade') si el id relacionado en la table citas cambia , este cambio se reflejara
    // //automaticamente en la columna cita_id
    // $table->foreignId('libro_id')->constrained('libros')->onUpdate('cascade')->onDelete('cascade');
    // //  Si se elimina un registro en la tabla citas,
    // //   los registros relacionados en detalle_citas también se eliminarán.
    // $table->string('nombreCliente');
    // $table->date('fechaDevolucion')->nullable();
    // $table->timestamps();

    function crearPrestamo(Request $request)
    {

        $request->validate([
            "fecha" => "required",
            "nombreCliente" => "required",
        ]);


        $libro = libro::find($request->libro);
        if ($libro->numEjemplares > 0) {
            //Se comprueba que
            $prestamos = Prestamo::where('nombreCliente', $request->nombreCliente)->whereNull('fechaDevolucion')->get();

            if ($prestamos->IsNotEmpty()) {
                return back()->with('mensaje', "EL cliente tiene prestamos sin devolver");
            } else {
                $mensaje=" ";
                try{
                DB::transaction(
                function () use ($libro,  &$request, &$mensaje) {   
                $prestamo = new Prestamo();
                $prestamo->fecha = $request->fecha;
                $prestamo->libro_id = $libro->id;
                $prestamo->nombreCliente = $request->nombreCliente;
                if ($prestamo->save()) {
                    $libro->numEjemplares = $libro->numEjemplares - 1;
                    if ($libro->save()) {
                        $mensaje = 'Operacion hecho';
                    }
                }
            }
          );

            }catch (\Throwable $th) {
                return back()->with('mensaje', $th->getMessage());
            }
            return back()->with('mensaje', $mensaje);

            }
        } else {
            return back()->with('mensaje', 'No hay stock para ese libro');
        }
    }



    function obtenerLibros()
    {

        $libros = Libro::all();

        if (!$libros) {
            return back()->with('mensaje', 'Error no hay libros');
        }

        return view('crearprestamos', compact('libros'));
    }



    function obtenerFormularioM($id){
        $prestamo = Prestamo::find($id);

        return  view('modificarprestamos',compact('prestamo'));


    }
}
