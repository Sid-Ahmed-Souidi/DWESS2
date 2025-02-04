<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class LoginController extends Controller
{
 

    //login
    function login(Request $request){
        $request->validate([
            'email' => 'required',
            'ps' => 'required'
        ]);
        try {

         //Crear array con us y ps
         $credenciales = ['email'=>$request->email,'password'=>$request->ps];
         //Validación de credenciales
         if(Auth::attempt($credenciales)){
            //obtenermos el usuario
                $u=User::find(Auth::user()->id);
                //generamos el token de autentificacion , que lo a devolver a la peticion
                $token=$u->createToken('auth_token')->plainTextToken;
                return response()->json([
                    'mensaje'=>'login correcto' , 
                    'token'=>$token ,
                     'nombreUS'=>$u->name]);
         }
         else{
             return response()->json('Datos Incorrectos' ,401);
         }
         

        } catch (\Throwable $th) {
                return response()->json(['error : '.$th->getMessage()], 500);
        }

    }


    //registro


    function registro(Request $request){
        //validar datos
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|unique:App\Models\User,email',
            'ps' => 'required|min:3|max:10',
            'ps2' => 'required|min:3|max:10|same:ps',
        ]);
                try {
                    $u = new User();
                    $u->name=$request->nombre;
                    $u->email=$request->email;
                    $u->password=Hash::make($request->ps);
                    if($u->save()){
                        return $u;
                    }else{
                        return response()->json(['error : '=>'Error al crear el usuario'], 500);
                    }
                } catch (\Throwable $th) {
                        return response()->json(['error : '.$th->getMessage()], 500);
                }

    }   

    //logout
    function logout(Request $request){

        try {
            
            $request->user()->tokens()->delete();
            return response()->json(['mensaje'=>'Sesión cerrada'], 200);
        } catch (\Throwable $th) {
            return response()->json(['error : '.$th->getMessage()], 500);
        }
        
    }



}
