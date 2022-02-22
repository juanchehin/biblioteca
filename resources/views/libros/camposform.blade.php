@include('dashboard.msjFlash')   
<div class="row">
  <div class="col-md-12">
    
      <div class="box-header with-border">
        <h3 class="box-title"> <i class="fa fa-book" aria-hidden="true"></i> <b> Datos del Libro</b></h3>
        <span class="pull-right"><i class="text-red">* Datos Obligatorios</i></span>
      </div>

      <div class="box-body">
        {!! csrf_field() !!}
        <div class="form-horizontal row-border">
           <div class="form-group">
            <label class="col-sm-3 control-label">Categoría<i class="text-red">*</i></label>
              <div class="col-xs-6">
            {!!  Form::select('categoria', array('Publicaciones Periodicas' => 'Publicaciones Periodicas', 'Publicaciones Impresas' => 'Publicaciones Impresas', 'Publicaciones Audiovisuales' => 'Publicaciones Audiovisuales'), NULL, ['class'=>"form-control"], old('categoria'),
                 ['class'=>'form-control',             
                 'required']); !!}
              </div>
          </div> 

          <div class="form-group">
            <label class="col-sm-3 control-label">Área<i class="text-red">*</i></label>
              <div class="col-xs-6">
            {!!  Form::select('area', array('Generalidades' => 'Generalidades', 'Formación Docente' => 'Formación Docente', 'Ciencias Naturales' => 'Ciencias Naturales', 'Ciencias Sociales' => 'Ciencias Sociales', 'Matemática' => 'Matemática', 'Física' => 'Física', 'Química' => 'Química', 'Tecnología/Informática' => 'Tecnología/Informática', 'Sociología' => 'Sociología', 'Antropología' => 'Antropología', 'Lenguas Aborígenes y Extranjeras' => 'Lenguas Aborígenes y Extranjeras', 'Literatura/Lingüistica' => 'Literatura/Lingüistica','Normativas' => 'Normativas','Informes-Memorias' => 'Informes-Memorias'), NULL, ['class'=>"form-control"], old('area'),
                 ['class'=>'form-control',             
                 'required']); !!}
              </div>
          </div>  

          <div class="form-group">
              <label class="col-sm-3 control-label">Género<i class="text-red">*</i></label>
                <div class="col-xs-6">
              {!!  Form::select('genero', array('Diccionario' => 'Diccionario', 'Biología' => 'Biología', 'Educación Sexual Integral' => 'Educación Sexual Integral', 'Historia' => 'Historia', 'Geografía' => 'Geografía', 'Formación Ética' => 'Formación Ética', 'Filosofía' => 'Filosofía', 'Lenguas Aborígenes' => 'Lenguas Aborígenes', 'Inglés' => 'Inglés', 'Portugués' => 'Portugués', 'Poesía' => 'Poesía', 'Historietas' => 'Historietas', 'Pases Libres' => 'Pases Libres', 'Libro Album' => 'Libro Album', 'Cuentos' => 'Cuentos', 'Novela' => 'Novela', 'Teatro' => 'Teatro', 'Enciclopedia' =>'Enciclopedia', 'Manual' => 'Manual', 'Pedagogia' => 'Pedagogia', 'Música' => 'Música', 'Arte' => 'Arte'), NULL, ['class'=>"form-control"], old('genero'),
                 ['class'=>'form-control',             
                 'required']); !!}
                </div>
          </div>  
          <div class="form-group">
            <div class="col-sm-3 control-label">                         
             {!! Form::label('titulo','Título') !!}
             <i class="text-red">*</i>
            </div>
            <div class="col-sm-6">
             {!! Form::text('titulo',
               old('titulo'),
               ['class'=>'form-control',             
               'required']
               ) !!}
            </div> 
          </div>   

          <div class="form-group">
            <div class="col-sm-3 control-label">                         
             {!! Form::label('autor','Autor') !!}
             <i class="text-red">*</i>
            </div>
            <div class="col-sm-6">
             {!! Form::text('autor',
               old('autor'),
               ['class'=>'form-control',             
               'required']
               ) !!}
            </div>    
          </div> 

          <div class="form-group">
            <div class="col-sm-3 control-label">                         
             {!! Form::label('cant_ejemplares','Cant. Ejemplares') !!}
             <i class="text-red">*</i>
            </div>
            <div class="col-sm-2">
             {!! Form::number('cant_ejemplares',
               old('cant_ejemplares'),
               ['class'=>'form-control',             
               'required']
               ) !!}
            </div>  
          
            <div class="col-sm-2 control-label">                         
             {!! Form::label('anio','Año') !!}
             <i class="text-red">*</i>
            </div>
            <div class="col-sm-2">
             {!! Form::number('anio',
               old('anio'),
               ['class'=>'form-control',             
               'required']
               ) !!}
            </div>    
          </div> 

          <div class="form-group">
            <div class="col-sm-3 control-label">
              {!! Form::label('editorial_id', 'Editorial') !!}
            </div>
            <div class="col-sm-6">
              {!! Form::select('editorial_id',$editorial, NULL,['class'=>"selectEdit js-states form-control", 'id'=>"editorial_id",old('editorial_id')]);  !!}
              <span class="help-block inputWarning", id="txtSelect" style="display:none">Debe seleccionar una Editorial</span>
            </div> 
          </div> 

          {{-- <div class="form-group">
            <div class="col-sm-3 control-label">
              {!! Form::label('editorial_id', 'Editorial') !!}
            </div>
            <div class="col-sm-6">
              {!! Form::select('editorial_id',$editoriales,NULL,['class'=>"form-control ", 'id'=>"selectEdit"], old('editorial_id'),
               ['class'=>'form-control',             
               'required']);  !!}
              
            </div> 
          </div>    --}}

          <div class="form-group">
              <label class="col-sm-3 control-label">Nivel<i class="text-red">*</i></label>
                <div class="col-xs-6">
              {!!  Form::select('nivel', array('Inicial' => 'Inicial', 'Primario' => 'Primario', 'Secundario' => 'Secundario', 'Superior'=> 'Superior', 'Infantil' => 'Infantil', 'Juvenil/Adulto' => 'Juvenil/Adulto'), NULL, ['class'=>"form-control"], old('nivel'),
               ['class'=>'form-control',             
               'required']); !!}
                </div>
          </div>

          <div class="form-group">
              <label class="col-sm-3 control-label">Región<i class="text-red">*</i></label>
                <div class="col-xs-6">
              {!!  Form::select('region', array('Ninguna' => 'Ninguna', 'Anglosajona' => 'Anglosajona', 'Europea' => 'Europea', 'Argentina'=> 'Argentina', 'Latinoamericana'=> 'Latinoamericana'), NULL, ['class'=>"form-control"], old('region'),
               ['class'=>'form-control',             
               'required']); !!}
                </div>
          </div>

          <div class="form-group">
            <div class="col-sm-3 control-label">
              {!! Form::label('coleccion_id', 'Colección') !!}
            </div>
            <div class="col-sm-6">
              {!! Form::select('coleccion_id',$coleccion, NULL,['class'=>"selectColec js-states form-control", 'id'=>"coleccion_id",old('coleccion_id')]);  !!}
              <span class="help-block inputWarning", id="txtSelect" style="display:none">Debe seleccionar una Colección</span>
            </div> 
          </div>

          <div class="form-group">
            <div class="col-sm-3 control-label">                         
               {!! Form::label('num_coleccion','N° Colección') !!}
               <i class="text-red">*</i>
            </div>
            <div class="col-sm-2">
               {!! Form::number('num_coleccion',
                 old('num_coleccion'),
                 ['class'=>'form-control',             
                 'required']
                 ) !!}
            </div>  
          
          
            <div class="col-sm-2 control-label">                         
               {!! Form::label('ubicacion','Ubicación') !!}
               <i class="text-red">*</i>
            </div>
            <div class="col-sm-2">
               {!! Form::text('ubicacion',
                 old('ubicacion'),
                 ['class'=>'form-control',             
                 'required']
                 ) !!}
            </div>  
          </div>  
   </div>
 </div>

 @section('scripts')

 <style>
  .select2-container--default .select2-results__option[aria-disabled=true] {
    color: #c0c0c0;
  }
  .btn.focus, .btn:focus, .btn:hover {

    border: 1px solid  #20382d;

  }
</style>

 <script src="{{ asset('js/jquery.numeric.min.js') }}" type="text/javascript"></script>
 <script src="{{ asset('js/input-mask/jquery.inputmask.js') }}" type="text/javascript"></script>
 <script src="{{ asset('js/input-mask/jquery.inputmask.extensions.js') }}" type="text/javascript"></script>

 
<script src="{{ asset('js/jquery.inputmask.bundle.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/select2.full.min.js') }}" type="text/javascript"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type="text/javascript">


  $(".selectEdit").select2({language: "es",
    placeholder: "Seleccione una Editorial",
    allowClear: true
  });

   $(".selectColec").select2({language: "es",
    placeholder: "Seleccione una Colección",
    allowClear: true
  });
</script>

@endsection
