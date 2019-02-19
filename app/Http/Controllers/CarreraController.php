<?php

namespace App\Http\Controllers;

use App\Carreras;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    public function index(Request $request){
    	//$lel=DB::select('SELECT id FROM carreras');
    	
    	return view('carreras.index');
    	
    }

    public function listar(Request $request){
    	$carreras=Carreras::all();
    	$retorno=array();
    	foreach ($carreras as $item) {
    		$link="<a href='#' class='Editar' data-id='".$item->id."' data-action='E'><i class='fa fa-edit'></i></a>";
    		$data=array();
    		array_push($data, $link);
    		array_push($data, $item->nombre);
    		array_push($data, $item->alias);
    		array_push($data, $item->estado==1?"Activo":"Inactivo");

    		array_push($retorno, $data);
    	}
    	return json_encode($retorno);
    }

	public function grabar(Request $request){		
		$nombre=$request->input('nombre');
		$alias=$request->input('alias');
		$estado=$request->input('estado');
		$modo=$request->input('modo');

		$respuesta=array('codigo'=>0,'mensaje'=>'', 'mensajeerror'=>'',);
		if($modo=='C'){
			$carrera=new Carreras();
			$carrera->nombre=$nombre;
			$carrera->alias=$alias;
			$carrera->estado=isset($estado)?1:0;

			$carrera->save();	
			$respuesta['codigo']=1;
			$respuesta['mensaje']='Carrera creada satisfactoriamente';
			$respuesta['mensajeerror']='No se ha podido crear, por favor vuelva a intentarlo más tarde';
		}else{
			$codigo=$request->input('codigo');
			$carrera=Carreras::where('id',$codigo)->first();
			$carrera->id=$codigo;
			$carrera->nombre=$nombre;
			$carrera->alias=$alias;
			$carrera->estado=isset($estado)?1:0;

			$carrera->save();	
			$respuesta['codigo']=0;
			$respuesta['mensaje']='Carrera modificada satisfactoriamente';
			$respuesta['mensajeerror']='No se ha podido modificar, por favor vuelva a intentarlo más tarde';
		}

		return json_encode($respuesta);
    }
}
