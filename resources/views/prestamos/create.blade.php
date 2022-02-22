@extends('layouts.app')
@section('content')
@include('adminlte-templates::common.errors')
@include('errors.error-msg')
@include('dashboard.msjFlash') 

{!! Form::open(['route'=>'prestamos.store','method'=>'POST', 'class'=>'form-horizontal row-border']) !!}

<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Carga de Usuario</h3>
		</div>
		@include('prestamos.camposform')
	</div>

<div class="box-footer">
    <div class="col-sm-9" align="right">
        {{-- <a href="{!! route('barcode.barcode') !!}" class="btn btn-default">Generar Código</a> --}}
        <a href="{!! route('prestamos.index') !!}" class="btn btn-default">Cancelar</a>
       {!! Form::submit('Crear',['class'=>'btn btn-primary'])!!}
    </div>
  </div> 
 </div>  
{!! Form::close() !!}
@endsection
