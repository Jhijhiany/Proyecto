<?php

namespace App\Http\Controllers;

use App\Empleados;
use App\Http\Middleware\ControlSesion;
use Illuminate\Http\Request;

class MainController extends Controller
{
	public function __construct(){
		$this->middleware(ControlSesion::class);

	}
    public function index(Request $request){
    	
        $empleado=Empleados::where('cedula',$request->session()->get('cedula'))->first();

    	$usuario=$request->session()->get('usuario','NE');
    		return view('principal')
    			->with('usuario',$usuario)
    			->with('nombre',$empleado->nombre)
    			//->with('foto',"data:image/jpeg, base64,".base64_encode($empleado->foto))
    			->with('cargo','jugador');
    		
    }

    public function salir(Request $request){
    	if($request->session()->exists('usuario')){
    		$request->session()->flush();
	    }
	    return redirect()->action('LoginController@index');
	}
}