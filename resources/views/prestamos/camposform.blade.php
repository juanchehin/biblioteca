@include('dashboard.msjFlash')   
<div class="row">
  <div class="col-md-12">
    
      <div class="box-header with-border">
        <h3 class="box-title"> <i class="fa fa-file" aria-hidden="true"></i> <b> Datos del Usuario</b></h3>
        <span class="pull-right"><i class="text-red">* Datos Obligatorios</i></span>
      </div>

      <div class="box-body">
        <div class="form-horizontal row-border">
          <div class="form-group">

         <div class="col-sm-3 control-label">                         
           {!! Form::label('nombre','Nombre') !!}
           <i class="text-red">*</i>
         </div>
         <div class="col-sm-6">
           {!! Form::text('nombre',old('nombre'), ['class'=>'form-control', 'placeholder'=>'Ingrese el nombre']
          ) !!}
           </div> 
           </div>   
         </div>
        <div class="form-horizontal row-border">
          <div class="form-group">
            <div class="col-sm-3 control-label">                         
              {!! Form::label('apellido','Apellido') !!}
                <i class="text-red">*</i>
            </div>
            <div class="col-sm-6">
              {!! Form::text('apellido', old('apellido'), ['class'=>'form-control', 'placeholder'=>'Ingrese el apellido']
             ) !!}
            </div>
          </div>
         </div>
        <div class="form-horizontal row-border">
        <div class="form-group">
          <div class="col-sm-3 control-label">                         
            {!! Form::label('dni','D.N.I.') !!}
            <i class="text-red">*</i>
          </div>
          <div class="col-sm-6">
            {!! Form::number('dni', old('dni'), ['class'=>'form-control', 'placeholder'=>'Ingrese el dni']
            ) !!}
          </div>
         </div>
        </div>
         <div class="form-horizontal row-border">
          <div class="form-group">
            <div class="col-sm-3 control-label">                         
              {!! Form::label('email','Email') !!}
            </div>
            <div class="col-sm-6">
              {!! Form::text('email', old('email'), ['class'=>'form-control','type'=>'email', 'placeholder'=>'Ingrese el email']
             ) !!}
            </div>
          </div>
         </div>
          <div class="form-horizontal row-border">
          <div class="form-group">
            <div class="col-sm-3 control-label">                         
              {!! Form::label('telefono','Teléfono') !!}
            </div>
            <div class="col-sm-6">
              {!! Form::text('telefono', old('telefono'), ['class'=>'form-control', 'placeholder'=>'Ingrese un número de teléfono']
             ) !!}
            </div>
          </div>
         </div>
         <div class="form-horizontal row-border">
            <div class="form-group">
            <div class="col-sm-3 control-label">                         
              {!! Form::label('institucion','Institución') !!}
            </div>
            <div class="col-sm-6">
              {!! Form::text('institucion', old('institucion'), ['class'=>'form-control', 'placeholder'=>'Ingrese el nombre de la institucion a la que pertenece']
             ) !!}
            </div>
          </div>
         </div>
       </div>
   </div>
   
 </div>

 @section('scripts')
 <script src="{{ asset('js/jquery.numeric.min.js') }}" type="text/javascript"></script>
 <script src="{{ asset('js/input-mask/jquery.inputmask.js') }}" type="text/javascript"></script>
 <script src="{{ asset('js/input-mask/jquery.inputmask.extensions.js') }}" type="text/javascript"></script>

@endsection
