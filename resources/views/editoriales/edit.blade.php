@extends('layouts.app')
@section('content')
@include('errors.error-msg')

{!! Form::model($editorial,['route'=>['editoriales.update',$editorial->id],'method'=>'POST']) !!}


<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Modificar Editorial</h3>		
	</div>

	@include('editoriales.camposform')

<div class="box-footer">
	<div class="form-group col-sm-9 col-md-9 col-lg-9" align="right">
		{!! Form::submit('Modificar',['class'=>'btn btn-primary pull-right']) !!}
		<a href="{!! route('editoriales.index') !!}" class="btn btn-default">Cancelar</a>
		{!! Form::close() !!}
	</div>
</div>
</div>

<!-- /.form-box -->

@endsection
