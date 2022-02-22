@extends('layouts.app')

@section('content')
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


{!! Form::model($user,['route'=> ['users.update',$user->id],'method'=>'PUT']) !!}

           @include('users.form')

               <div class="form-group">
             {!! Form::submit('Modificar')!!}
            </div>

{!! Form::close() !!}

</div>
</div>
</div> <!-- /ROWQ-->
</div> <!-- /primary-->
    <!-- /.form-box -->

@endsection
