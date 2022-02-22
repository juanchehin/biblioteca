@extends('dashboard.index')

@section('url')
{!! route('colecciones.create') !!}
@endsection

@section('agregar')
<i class="fa fa-plus-circle"></i> Agregar Colección
@endsection


@section('title')
Listado de Colecciones
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
                 {!! Form::open(['url' => 'coleccionesDestroy']) !!}
                 <span id="escribir">
                
                </span>
               
                <button type="submit" id="eliminarColeccion" name="eliminarColeccion" class="btn btn-delete btn-danger" onClick="dte()">Eliminar</button>
               
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>

                {!! Form::close() !!}                
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
        $('#escribir').html('<input type="hidden" name="identificador" id="identificador" value="'+id+'">');

      modal.modal('show');

    });


</script>
@endpush