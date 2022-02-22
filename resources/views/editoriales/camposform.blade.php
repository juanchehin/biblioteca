@include('dashboard.msjFlash')   
<div class="row">
  <div class="col-md-12">
    
      <div class="box-header with-border">
        <h3 class="box-title"> <i class="fa fa-file" aria-hidden="true"></i> <b> Datos de la Editorial</b></h3>
        <span class="pull-right"><i class="text-red">* Datos Obligatorios</i></span>
      </div>

      <div class="box-body">
        {!! csrf_field() !!}
        <div class="form-horizontal row-border">

         <div class="col-sm-3 control-label">                         
           {!! Form::label('descripcion','Editorial') !!}
           <i class="text-red">*</i>
         </div>
         <div class="col-sm-6">
           {!! Form::text('nombre',
             old('nombre'),
             ['class'=>'form-control',
             'placeholder'=>'Descripción de Editorial',
             'required']
             ) !!}
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
