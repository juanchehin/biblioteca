<div class="box-body">

  <div class="form-group">
      <label class="col-sm-3 control-label">Categoría<i class="text-red">*</i></label>
        <div class="col-xs-6">
      {!!  Form::select('categoria', array('Publicaciones Periodicas' => 'Publicaciones Periodicas', 'Publicaciones Impresas' => 'Publicaciones Impresas', 'Publicaciones Audiovisuales' => 'Publicaciones Audiovisuales'), NULL, ['class'=>"form-control"]); !!}
        </div>
  </div>   

  <div class="form-group">
      <label class="col-sm-3 control-label">Área<i class="text-red">*</i></label>
        <div class="col-xs-6">
      {!!  Form::select('area', array('Generalidades' => 'Generalidades', 'Formación Docente' => 'Formación Docente', 'Ciencias Naturales' => 'Ciencias Naturales', 'Ciencias Sociales' => 'Ciencias Sociales', 'Matemática' => 'Matemática', 'Física' => 'Física', 'Química' => 'Química', 'Tecnología/Informática' => 'Tecnología/Informática', 'Sociología' => 'Sociología', 'Antropología' => 'Antropología', 'Lenguas Aborígenes y Extranjeras' => 'Lenguas Aborígenes y Extranjeras', 'Literatura/Lingüistica' => 'Literatura/Lingüistica','Normativas' => 'Normativas','Informes-Memorias' => 'Informes-Memorias'), NULL, ['class'=>"form-control"]); !!}
        </div>
  </div>  

  <div class="form-group">
      <label class="col-sm-3 control-label">Género<i class="text-red">*</i></label>
        <div class="col-xs-6">
      {!!  Form::select('genero', array('Diccionario' => 'Diccionario', 'Biología' => 'Biología', 'Educación Sexual Integral' => 'Educación Sexual Integral', 'Historia' => 'Historia', 'Geografía' => 'Geografía', 'Formación Ética' => 'Formación Ética', 'Filosofía' => 'Filosofía', 'Lenguas Aborígenes' => 'Lenguas Aborígenes', 'Inglés' => 'Inglés', 'Portugués' => 'Portugués', 'Poesía' => 'Poesía', 'Historietas' => 'Historietas', 'Pases Libres' => 'Pases Libres', 'Libro Album' => 'Libro Album', 'Cuentos' => 'Cuentos', 'Novela' => 'Novela', 'Teatro' => 'Teatro', 'Enciclopedia' =>'Enciclopedia', 'Manual' => 'Manual', 'Pedagogia' => 'Pedagogia', 'Música' => 'Música', 'Arte' => 'Arte'), NULL, ['class'=>"form-control"]); !!}
        </div>
  </div>   

  <div class="form-group">
    <label class="col-sm-3 control-label">Título<i class="text-red">*</i></label>
    <div class="col-sm-6">
      <input id="titulo"
      type="text"
      class="form-control"
      name="titulo"
      >
    </div>        
  </div>

  <div class="form-group">
    <label class="col-sm-3 control-label">Autor</label>
    <div class="col-sm-6">
      <input id="autor"
      type="text"
      class="form-control"
      name="autor"
      >
    </div>
  </div>  

  <div class="form-group">
    <label class="col-sm-3 control-label">Cant. Ejemplares<i class="text-red">*</i></label>
    <div class="col-sm-3">
      <input id="cant_ejemplares"
      type="number"
      class="form-control"
      name="cant_ejemplares"
      >
    </div>

    <div class='col-md-4'>
      <label class="col-sm-1 control-label">Año</label>
      <div class="col-sm-8">
        <input id="anio"
        type="number"
        class="form-control"
        name="anio"
        align="right"
        >
      </div>

    </div>
  </div>   

{{--   <label for="id_label_single">
  Click this to highlight the single select element

    <select class="js-example-basic-single js-states form-control" id="id_label_single"></select>
  </label>
 --}}

  <div class="form-group">
    <div class="col-sm-3 control-label">
      {!! Form::label('editorial_id', 'Editorial') !!}
    </div>
    <div class="col-sm-6">
      {!! Form::select('editorial_id',$editoriales,NULL,['class'=>"selectEdit js-states form-control", 'id'=>"editorial_id"]);  !!}
      <span class="help-block inputWarning", id="txtSelect" style="display:none">Debe seleccionar una Editorial</span>
    </div> 
  </div>   

  <div class="form-group">
      <label class="col-sm-3 control-label">Nivel<i class="text-red">*</i></label>
        <div class="col-xs-6">
      {!!  Form::select('nivel', array('Inicial' => 'Inicial', 'Primario' => 'Primario', 'Secundario' => 'Secundario', 'Superior'=> 'Superior', 'Infantil' => 'Infantil', 'Juvenil/Adulto' => 'Juvenil/Adulto'), NULL, ['class'=>"form-control"]); !!}
        </div>
  </div>

  <div class="form-group">
      <label class="col-sm-3 control-label">Región<i class="text-red">*</i></label>
        <div class="col-xs-6">
      {!!  Form::select('region', array('Ninguna' => 'Ninguna', 'Anglosajona' => 'Anglosajona', 'Europea' => 'Europea', 'Argentina'=> 'Argentina', 'Latinoamericana'=> 'Latinoamericana'), NULL, ['class'=>"form-control"]); !!}
        </div>
  </div>

  <div class="form-group">
    <div class="col-sm-3 control-label">
      {!! Form::label('coleccion_id', 'Colección') !!}
    </div>
    <div class="col-sm-6">
      {!! Form::select('coleccion_id',$colecciones,NULL,['class'=>"selectColec js-states form-control", 'id'=>"selectColec"]);  !!}
      <span class="help-block inputWarning" id="txtSelect" style="display:none">Debe seleccionar una Colección</span>
    </div> 
  </div>  

  <div class="form-group">
    <label class="col-sm-3 control-label">N° Colección</label>
    <div class="col-sm-2">
      <input id="num_coleccion"
      type="text"
      class="form-control"
      name="num_coleccion"
      >
  </div>

    <label class="col-sm-1 control-label">Ubicación</label>
    <div class="col-sm-3">
      <input id="ubicacion"
      type="text"
      class="form-control"
      name="ubicacion"
      >
    </div>
  </div> 

  <div class="box-footer">
    <div class="col-sm-9" align="right">
        {{-- <a href="{!! route('barcode.barcode') !!}" class="btn btn-default">Generar Código</a> --}}
        <a href="{!! route('libros.index') !!}" class="btn btn-default">Cancelar</a>
       {!! Form::submit('Crear',['class'=>'btn btn-primary'])!!}
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
<script src="{{ asset('js/jquery.inputmask.bundle.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/select2.full.min.js') }}" type="text/javascript"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type="text/javascript">

/*
  function initSelect()
  {
    $("#selectColec>option[value='hola']").prop('disabled',true);

    
  }
*/


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