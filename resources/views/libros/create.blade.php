@extends('layouts.app')
@section('content')
@include('adminlte-templates::common.errors')
@include('errors.error-msg')
@include('dashboard.msjFlash') 

{!! Form::open(['route'=>'libros.store','method'=>'POST', 'class'=>'form-horizontal row-border']) !!}

<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Carga de Libros</h3>
			<span class="pull-right"><i class="text-red">* Datos Obligatorios</i></span>
		</div>


		@include('libros.fields')

		
	</div>
</div>
{!! Form::close() !!}
@endsection
