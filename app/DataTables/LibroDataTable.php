<?php
 
 namespace app\DataTables;
 
 use app\Models\Libro;
 use Yajra\Datatables\Services\DataTable;
 
 class LibroDataTable extends DataTable
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
             ->addColumn('action',  function($libro){
                return '
 
 
 
 <button class="btn btn-default btn-xs" id="barcode2" data-id="'.$libro->id.'" title="Código QR">
 <i class="fa fa-qrcode""></i></button>
 
 <a class="btn btn-primary btn-xs" title="Ver Detalles" alt="Ver libro" href="'.route('libros.show', $libro->id).'">
     <i class="fa fa-eye" aria-hidden="true"></i></a>
 
 <a class="btn btn-success btn-xs" title="Editar" alt="Editar libro" href="'.route('libros.edit', $libro->id)  .'">
     <i class="fa fa-pencil" aria-hidden="true"></i></a>
 
 <button class="btn btn-danger btn-xs" id="eliminar" data-target="#modalEliminar" data-id="'.$libro->id.'" title="Eliminar">
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
         $query =Libro::select(            
             'libros.id',
             'libros.autor',
             'libros.titulo',
             'libros.area',
             'libros.genero',
             'libros.nivel',
             'libros.ubicacion',
             'libros.cant_ejemplares',
             'editoriales.nombre as nombreEdit',
             'colecciones.nombre')
         ->leftJoin('colecciones', 'colecciones.id', '=', 'libros.coleccion_id')
         ->leftJoin('editoriales', 'editoriales.id', '=', 'libros.editorial_id');
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
            ->addAction(['width' => '10%'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'processing'=> true,
                'serverSide'=> true,
                'scrollX' => true,
                'buttons' => [
                    'excelHtml5',
                    'csvHtml5',      
                    [
                         'extend'  => 'pdfHtml5',
                         'orientation' =>'landscape',
                         'message' => 'Listado de Libros - Ciidept.',
                         'exportOptions'=> [
                                    'columns' => [0,1,2,3,4,5,6,7,8,9]
                                    ]
                    ],
           
                    'colvis'
                    ],

                /*'columnDefs' => [ [
                        'targets' => 0,
                        'checkboxes' => [
                            'selectRow' => false
                            ],
                        ]
                    ],*/
                'select'=> [
                    'style'=> 'multi'
                    ],
                'order'=> [[1, 'asc']]
            ]);
    }
     /**
      * Get columns.
      *
      * @return array
      */
     protected function getColumns()
     {
        return [['data' =>'id', 'title'=> 'ID','name'=>'libros.id','searchable' => true,'orderable' => false],            
            'titulo',            
            'autor',            
            'area',
            'genero',                   
            'nivel',
            'ubicacion',
            'cant_ejemplares',
            ['data' =>'nombre', 'title'=> 'Coleccion','name'=>'colecciones.nombre'],            
            ['data' =>'nombreEdit', 'title'=> 'Editorial','name'=>'editoriales.nombre']
             
 
         ];
        
     }
 
     /**
      * Get filename for export.
      *
      * @return string
      */
     protected function filename()
     {

         return 'librodatatables_' . time();
     }
 }