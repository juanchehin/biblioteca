@extends('dashboard.index')

@section('url')
{!! route('users.create') !!}
@endsection

@section('agregar')
<i class="fa fa-plus-circle"></i> Agregar Usuario
@endsection


@section('title')
Listado de Usuarios
@endsection

@section('datoin')
{!! $dataTable->table() !!}
@endsection

@push('scripts')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
{!! $dataTable->scripts() !!}


<script>
	$('#dataTableBuilder').on('click', '.btn-delete[data-href]', function (e) {
    e.preventDefault();
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var url = $(this).data('href');
    // confirm then
    $.ajax({
        url: url,
        type: 'DELETE',
        dataType: 'json',
        data: {method: '_DELETE', submit: true}
    }).always(function (data) {
        $('#dataTableBuilder').DataTable().draw(false);
    });
});


    $(function() {
       $('#alert-msg').fadeOut(3000);
    });

</script>
@endpush
