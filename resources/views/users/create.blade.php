@extends('layouts.app')

@section('content')

<br/>
@include('errors.error-msg')


		<!-- general form elements -->
<div class="box box-primary">
 <div class="box-header with-border">
                      <h3 class="box-title">Usuario</h3>
                       <span class="pull-right">    <i class="text-red">* Datos Obligatorios</i></span>
        </div>
<div class="row">




<div class="col-md-5">

			<div class="box-header with-border">
				<h3 class="box-title"> <i class="fa fa-user" aria-hidden="true"></i> <b> Datos del Usuario</b></h3>
			</div>

			<div class="box-body">

{!! Form::open(['route'=>'users.store','method'=>'POST','autocomplete'=>"off"]) !!}
            {!! csrf_field() !!}

           @include('users.form')

               <div class="form-group">
             {!! Form::submit('Registrar')!!}
            </div>

{!! Form::close() !!}
       </div>
</div>
</div> <!-- /ROWQ-->
</div> <!-- /primary-->
@endsection

@section('scripts')


@endsection
