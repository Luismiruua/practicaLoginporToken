<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 

class LoginController extends Controller
{
    //
    /**
     * Recpge user y contraseña y logeará al usuario 
     * Devolviendo un token
     */

    public function login(Request $request){
        //
        $data = $request->validate([
            'email' => 'required|email:rfc',
            'password' => 'required',
        ]);
        if(Auth::attempt($data)){
            //Una vex el login se ha completado con el attempt
            //El usuario (instancia de User) queda almacenado en la clase Auth
            //Al tener "HasApiTokens" tiene acceso a más métodos, como "createToken"            
            return response()->json(['token' => Auth::user()->createToken("token")->plainTextToken()]); 

        }

        return 'Usuario no logeado, vaya:(';
    }
    /**
     * Solo se pude llamar si el usuario está logeado
     * Devolverá un mensaje con el nombre del usuario logeado
     */
    public function maybeLog(Request $request){
        return response()->json(Auth::user());
        //return Auth::user();
    }
    public function mostrar(){
        return "Los datos del usuario son";

        return response()->json(auth()->user());


    }



    public function logout(){
        auth()->user()->tokens()->delete();

        return response()->json([ 
            "message" => "Ha salido de su cuenta",
        ]);
    }

    public function info(){
        return "Tienes permiso porque estás authencicated";
    }
}
