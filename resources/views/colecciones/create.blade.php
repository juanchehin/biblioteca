{{-- @extends('layouts.app') --}}

@section('content')
@include('errors.error-msg')
@include('dashboard.msjFlash') 
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Carga de Colecciones</h3>
		<span class="pull-right"><i class="text-red">* Datos Obligatorios</i></span>
	</div>
	<div class="box-body">
		{{-- <div class="content"> --}}
		{!! Form::open(['route'=>'colecciones.store','method'=>'POST', 'class'=>'form-horizontal row-border']) !!}

				<div class="form-group">
                    <label class="col-sm-3 control-label">Colección<i class="text-red">*</i></label>
                            <div class="col-sm-6">
                                <input id="nombre"
                                       type="text"
                                       class="form-control"
                                       name="nombre"
                                       >
                            </div>				
                </div>
                             
			<div class="box-footer">
				<div class="form-group col-sm-9 col-md-9 col-lg-9" align="right">
					{!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    				<a href="{!! route('colecciones.index') !!}" class="btn btn-default">Cancelar</a>
					{!! Form::close() !!}
				</div>
      		</div>
			<hr>
		</div>
	</div>
	@endsection
