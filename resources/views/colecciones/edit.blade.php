@extends('layouts.app')
@section('content')
@include('errors.error-msg')

<div class="box box-primary">
	
	<div class="box-body">

		{!! Form::model($coleccion,['route'=>['colecciones.update',$coleccion->id],'method'=>'POST', 'class'=>'form-horizontal row-border']) !!}
		

@include('colecciones.camposform')

	<div class="box-footer">
		<div class="form-group col-sm-9 col-md-9 col-lg-9" align="right">
			{!! Form::submit('Modificar',['class'=>'btn btn-primary pull-right']) !!}
			<a href="{!! route('colecciones.index') !!}" class="btn btn-default">Cancelar</a>
			{!! Form::close() !!}
		</div>
	</div>
	</div>

</div>


<!-- /.form-box -->

@endsection
