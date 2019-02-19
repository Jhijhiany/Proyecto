<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Http\Requests;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
    	return view('login');
    }

    public function autenticar(Request $request){
		$usuario=$request->input('user');
		$clave=$request->input('password');

    	$usuarios=Usuario::where('usuario', $usuario)
    		          ->where('clave', $clave)->first();
    	if($usuarios == null){
    		echo "0";
    	}else {
    		//session(['usuario' => $usuario]);
            $request->session()->put('usuario',$usuario);
            $request->session()->put('cedula',$usuarios->ced_empleado);
    	 	echo "1";		
    	}
          
    }
}
