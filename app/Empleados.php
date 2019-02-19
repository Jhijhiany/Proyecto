<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
	protected $cedula;
	protected $nombre;
	protected $apellido;
	protected $email;
	protected $titulo;
    protected $docente;
    protected $director;
    protected $coordinador;
}
