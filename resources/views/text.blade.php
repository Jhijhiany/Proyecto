@extends('layouts.master')

@section('opciones')
	@if( $usr =='adm' )
		@include('partials.opciones_admin')
	@else
		@include('partials.opciones_cliente')
	@endif
	
@endsection

@section('contenido')
	<p>Este es el contenido que va dentro de la seccion</p>
@endsection