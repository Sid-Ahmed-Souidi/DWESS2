<?php

namespace App\Http\Controllers;

use App\Http\Resources\PedidoResource;
use App\Models\Pedido;
use App\Models\Producto;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //devolver pedidos del usuario logueado
        try {
             //devolver pedidos del usuario logueado
            $pedidos = User::find(Auth::user()->id)->pedidos();
            return PedidoResource::collection($pedidos);
            // return Pedido::where('user_id', Auth::user()->id)->get();
        } catch (\Throwable $th) {
            return response()->json(['error : '.$th->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validacion
        $request->validate([
            'producto'=>'required',
            'cantidad'=>'required'
        ]);
        try {

            DB::transaction(function() use  ($request) {

                $p = Producto::find($request->producto);
                if($p!=null and $p->stock){
                    $pedido = new Pedido();
                    $pedido->producto_id=$p->id;
                    $pedido->cantidad = $request->cantidad;
                    $pedido->precioU = $p->precio;
                    //id del usuario conectado
                    $pedido->user_id= Auth::user()->id;
                    if($pedido->save()){
                        //actulizar stock del productis
                        $p->stock-=$pedido->cantidad;
                        if($p->save()){
                            return response()->json($pedido, 200);

                        }
                    }

                }else{
                    throw new  Exception('EL producto no existe o no hay stock');
                }
            });

            return response()->json('Pedido Creado : ', 200);
            //code...
        } catch (\Throwable $th) {
            return response()->json(['error : '.$th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
