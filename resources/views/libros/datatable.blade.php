@extends('dashboard.index')

@section('botonqr')
<button id="botonqr" type="button" class="btn btn-success" style="margin:-10px 6px 7px 0px">
<i class="fa fa-qrcode" aria-hidden="true"></i> Generar QR's
</button>
@endsection

@section('url')
{!! route('libros.create') !!}
@endsection

@section('agregar')
<i class="fa fa-plus-circle"></i> Agregar Libro
@endsection


@section('title')
Listado de Libros
@endsection

@section('datoin')
{!! $dataTable->table() !!}
@endsection

@push('scripts')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
{!! $dataTable->scripts() !!}

<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                  <h3 class="modal-title">Atención!</h3>
              </div>
              <div class="modal-body">
                <h4>¿Esta seguro que quiere Eliminar?</h4>
            </div>
            <div class="modal-footer">
                 {!! Form::open(['url' => 'librosDestroy']) !!}
                 <span id="escribirDestroy">
                
                </span>
               
                <button type="submit" id="eliminarLibro" name="eliminarLibro" class="btn btn-delete btn-danger" onClick="dte()">Eliminar</button>
               
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>

                {!! Form::close() !!}                
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalBarcode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                  <h3 class="modal-title">Código Generado para el libro seleccionado</h3>
              </div>
              <div class="modal-body">  
               <div class="row">
              </div>
            <div class="modal-footer">
                 
                 <div align="center">
                   <span id="escribir">
                  
                  </span>                   
                 </div>
                <br> 
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                     
            </div>
        </div>
    </div>
</div>





<script>

    $(function() {
       $('#alert-msg').fadeOut(3000);
    });

</script>

<script type="text/javascript">
    $(document).on('click', '#eliminar', function(event) {
        event.preventDefault();
        var modal = $('#modalEliminar');
        var id = $(this).data('id');        
        $('#escribirDestroy').html('<input type="hidden" name="identificador" id="identificador" value="'+id+'">');

      modal.modal('show');

    });


</script>


<script type="text/javascript">
    
    $(document).ready(function(){
      $("#botonqr").click(function(){
        
        var modal = $('#modalBarcode');
        var table = $('table.table').DataTable();
        var rows = table.column(0).checkboxes.selected();
        var columnas= jQuery.makeArray(rows);
        
        var modal = $('#modalBarcode');

/*        alert(rows);
*/      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var ruta = "{{url ('qrgen') }}";
        /*$.get("test.php", { 'colors[]' : ["Red","Green","Blue"] });*/
        $.ajax({dataType: 'html', url:ruta, data:{columnas:columnas}, success:function(data){
/*        $('#escribir').html('<p>'+data+'</p>');
*/
        $('div.content').html(''+data+'');
        
        }});
        
/*        modal.modal('show');
*/
    })});

    $(document).on('click', '#barcode2', function(event) {
        event.preventDefault();

/*        var modal = $('#modalBarcode');
*/        
        var id = $(this).data('id');
        var num = $('#eliminar').data('id'); //utilizo el id del boton eliminar

        var ruta = "{{url ('verqr') }}"+"/"+id;
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({dataType: 'html', url:ruta, data:{ boton:num }, success:function(data){
        $('div.content').html(''+data+'');
        }});

/*      modal.modal('show');
*/
    });

</script>
@endpush
