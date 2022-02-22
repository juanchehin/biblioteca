@extends('layouts.app')
@section('content')
@include('errors.error-msg')

{!! Form::model($libro,['route'=>['libros.update',$libro->id],'method'=>'POST']) !!}



<!-- general form elements -->
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Modificar Libro</h3>		
	</div>

	@include('libros.camposform')

<div class="box-footer">
	<div class="form-group col-sm-9 col-md-9 col-lg-9" align="right">
		{!! Form::submit('Modificar',['class'=>'btn btn-primary pull-right']) !!}
		<a href="{!! route('libros.index') !!}" class="btn btn-default">Cancelar</a>
		{!! Form::close() !!}
	</div>
</div>
</div>

<!-- /.form-box -->

@endsection
