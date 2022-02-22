@extends('layouts.app')
@section('content')
@include('errors.error-msg')

{!! Form::model($prestamo,['route'=>['prestamos.update',$prestamo->id],'method'=>'POST']) !!}



<!-- general form elements -->
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Modificar Usuario-Préstamo</h3>		
	</div>

	@include('prestamos.camposform')

<div class="box-footer">
	<div class="form-group col-sm-9 col-md-9 col-lg-9" align="right">
		{!! Form::submit('Modificar',['class'=>'btn btn-primary pull-right']) !!}
		<a href="{!! route('prestamos.index') !!}" class="btn btn-default">Cancelar</a>
		{!! Form::close() !!}
	</div>
</div>
</div>

<!-- /.form-box -->

@endsection
