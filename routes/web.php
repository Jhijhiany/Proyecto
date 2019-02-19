<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
  //  return view('welcome');
//});
//Route::get('/login', 'LoginController@index');

	//{var?}', function ($var) {
    //return view('inicio', array('nombre'=>$var));
//})
//->where ('var','[0-9]+');


//Route::get('/inicio',function(){
//	return view('text')
//		->with('usr','adm');
//});
Route::get('/', 'LoginController@index');
Route::post('/login','LoginController@autenticar');
Route::get('/salir','MainController@salir');
Route::get('/main','MainController@index'); 
Route::get('/carreras','CarreraController@index');
Route::post('/grabarcarrera','CarreraController@grabar');
Route::get('/listarCarreras','CarreraController@listar');