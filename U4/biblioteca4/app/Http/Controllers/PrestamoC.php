<?php


namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Prestamo;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class PrestamoC extends Controller
{

    function verPrestamos(){
        //fecha descendente , hora ascendente
        $prestamos=Prestamo::all();
        return view('verprestamos', compact('prestamos'));
    }

    function obtenerLibros(){
        //fecha descendente , hora ascendente
        $libros=Libro::all();
        return view('vistacrear', compact('libros'));
    }

    

    function insertar(Request $r){
        $r->validate([
            "fecha"=>"required",
            "libro"=>"required",
            "cliente"=>"required"
        ]);
    
        $libroCom = Libro::where('id', $r->libro)->first();
        if(!$libroCom){
            return back()->with('mensaje', 'No se ha encontrado el libro');
        }else {
            if($libroCom->numEjemplares <=0 ){
                return back()->with('mensaje', 'No hay suficientes ejemplares para este libro');
            }else{
                $prestamo = Prestamo::where('nombreCliente',$r->cliente)->whereNull('fechaDevolucion')->get();
                if($prestamo->isEmpty()){
                    try {
                        DB::transaction(function ()  use ($r ,$libroCom) {
                            $p = new Prestamo();
                            $p->fecha = $r->fecha;
                            $p->libro_id = $r->libro;
                            $p->nombreCliente = $r->cliente;
                            if(!$p->save()){
                             throw new \Exception('Error al guardar el préstamo');
                            }
                            $libroCom->numEjemplares--;

                            if(!$libroCom->save()){
                                    throw new \Exception('Error al actualizar ejemplares');
                            }
                        });

                        return redirect()->route('verP')->with('mensaje', 'Préstamo creado con éxito');

                    } catch (\Throwable $th) {
                         $th->getMessage();
                    }

                }else{
                    return back()->with('mensaje', 'El cliente tiene prestamos sin devolver');
                }
            }
        }
    }

    function obtenerPrestamo($id){
             //fecha descendente , hora ascendente
             $prestamo=Prestamo::find($id);
             return view('mprestamos', compact('prestamo'));
    }


    function modificarPrestamo(Request $request){

        $prestamo = Prestamo::find($request->id);
        $libro = Libro::where('titulo',$request->libro)->first();
        if(!$prestamo){
            return back()->with('mensaje', 'El prestamo a modificar no se ha encontrado');
        }else{
            $prestamo->fecha=$request->fecha;
            $prestamo->libro_id=$libro->id;
            $prestamo->nombreCliente=$request->cliente;
            $prestamo->fechaDevolucion=$request->fechaD;
            try {
                DB::transaction(function ()  use ($request ,$prestamo,$libro) {
                    $prestamo->fecha=$request->fecha;
                    $prestamo->libro_id=$libro->id;
                    $prestamo->nombreCliente=$request->cliente;
                    $prestamo->fechaDevolucion=$request->fechaD;
                    if(!$prestamo->save()){
                     throw new \Exception('Error al modificar el préstamo');
                    }
                    $libro->numEjemplares++;
                    if(!$libro->save()){
                            throw new \Exception('Error al actualizar ejemplares');
                    }
                });

                return redirect()->route('verP')->with('mensaje', 'Préstamo modificado con éxito');

            } catch (\Throwable $th) {
                 $th->getMessage();
            }


        }
        


    }


}
