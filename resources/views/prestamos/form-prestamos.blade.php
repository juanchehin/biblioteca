@extends('dashboard.index2')

@section('title')
Cargar Usuario-Préstamo
@endsection

@section('datos')
   <div class="col-md-12" style="position:relative" >
    <div class="box box-primary">
      <div class="box-body">
        <div class="row" align="padding-right: 20px">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-4">
              {{-- <div class="form-group">
                {!! Form::label('id', 'Id del Usuario:') !!}
                <p>{!! $prestamo->id !!}</p>
              </div> --}}
              <div class="form-group">
                {!! Form::label('nombre', 'Nombre:') !!}
                <p>{!! $prestamo->nombre !!}</p>
              </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  {!! Form::label('apellido', 'Apellido:') !!}
                  <p>{!! $prestamo->apellido !!}</p>
                </div>  
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  {!! Form::label('dni', 'DNI:') !!}
                  <p>{!! $prestamo->dni !!}</p>
                </div>
            </div>
           </div>
           <div class="row">
              <div class="col-md-4">
              <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                <p>{!! $prestamo->email !!}</p>
              </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  {!! Form::label('telefono', 'Teléfono:') !!}
                  <p>{!! $prestamo->telefono !!}</p>
                </div>  
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  {!! Form::label('institucion', 'Institución:') !!}
                  <p>{!! $prestamo->institucion !!}</p>
                </div>
            </div>
           </div>

          </div>
        </div>                    
      </div>
    </div>            
  </div>
  
            <input type="hidden" id="id_prestamo" value="{!! $prestamo->id !!}">

@endsection

@section('datoin')
{!!$dataTable->table()!!}
@endsection

@section('botones_prestamo')
    <div class="col-mm-12" align="right">
      <a href="{!! route('prestamos.index') !!}" class="btn btn-default">Cancelar</a>
      <button id="cargar_libros" class="btn btn-success">Cargar Libros</button>
    </div>
@endsection

@push('scripts')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
{!! $dataTable->scripts() !!}

<script>
    $(function() {
       $('#alert-msg').fadeOut(3000);
    });

</script>

<script type="text/javascript">
    
    $(document).ready(function(){
      $("#cargar_libros").click(function(){
        
        var user = $('#id_prestamo').val();
        //alert(user);

        //var modal = $('#modalBarcode');
        var table = $('table.table').DataTable();
        var rows = table.column(0).checkboxes.selected();
        var columnas= jQuery.makeArray(rows);
        
       // var modal = $('#modalBarcode');

      //alert(columnas);

      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var ruta = "{{url ('cargar_libros') }}"+"/"+user;

        /*$.get("test.php", { 'colors[]' : ["Red","Green","Blue"] });*/
        $.ajax({dataType: 'html', url:ruta, data:{columnas:columnas}, success:function(data){
          if (data == -1)
          {
            alert("Debes seleccionar libros...");
          }else{
            $('div.content').html(''+data+'');
          }


          //alert(data);
          //$('div.content').html(''+data+'');
        
        }});
 
    })});
</script>
@endpush