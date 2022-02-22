<?php
 
 namespace app\DataTables;
 
 use app\Models\Prestamo;
 use Yajra\Datatables\Services\DataTable;
 
 class PrestamoDataTable extends DataTable
 {
     /**
      * Display ajax response.
      *
      * @return \Illuminate\Http\JsonResponse
      */
     public function ajax()
     {
         return $this->datatables
             ->eloquent($this->query())                
             ->addColumn('action',  function($prestamo){
                return '
 
  <a class="btn btn-warning btn-xs" title="Cargar Préstamo" alt="Cargar préstamo" href="'.route('prestamos.form', $prestamo->id)  .'">
     <i class="fa fa-exchange" aria-hidden="true"></i></a>

 <a class="btn btn-primary btn-xs" title="Ver Préstamos" alt="Ver préstamo" href="'.route('prestamos.show', $prestamo->id).'">
   <i class="fa fa-eye" aria-hidden="true"></i></a>

 <a class="btn btn-success btn-xs" title="Editar Usuario" alt="Editar préstamo" href="'.route('prestamos.edit', $prestamo->id)  .'">
     <i class="fa fa-pencil" aria-hidden="true"></i></a>
 <button class="btn btn-danger btn-xs" id="eliminar" data-target="#modalEliminar" data-id="'.$prestamo->id.'" title="Eliminar">
 <i class="fa fa-trash""></i></button>
 '; })
             ->make(true);
  
     }
 
     /**
      * <button type="button" data-libro_id="{{ $libro->id }}" data-libro_id="{{ $libro->id }}" class="btn btn-xs    btn-default btn-flat" data-toggle="modal" data-target="#confirmDelete"><i class="fa fa-barcode"></i>
        </button>
      *
      * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
      */
     public function query()
     {
        $query = Prestamo::query();


        return $this->applyScopes($query);
        
     }
 
     /**
      * Optional method if you want to use html builder.
      *
      * @return \Yajra\Datatables\Html\Builder
      */

      public function html()
    {
          $param=array_merge($this->getBuilderParameters(),['language' => [
            'url' => url('http://cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json')
        ]] );
        return $this->builder()
                    ->columns($this->getColumns())
                    ->ajax('')
                    ->addAction(['width' => '150px'])
                    ->parameters($param);
    }
     /**
      * Get columns.
      *
      * @return array
      */
     protected function getColumns()
     {
       return [
            'id',
            'nombre',
            'apellido',
            'dni',
            'telefono',
            'email',
            'institucion'
        ];
        
     }
 
     /**
      * Get filename for export.
      *
      * @return string
      */
     protected function filename()
     {

         return 'prestamosdatatables_' . time();
     }
 }