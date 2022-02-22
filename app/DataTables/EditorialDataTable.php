<?php

namespace app\DataTables;

use app\Models\Editorial;
use Yajra\Datatables\Services\DataTable;

class EditorialDataTable extends DataTable
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
            ->addColumn('action',  function($editorial){
               return '

<a class="btn btn-success btn-xs" title="Editar" alt="Editar editorial" href="'.route('editoriales.edit', $editorial->id)  .'">
    <i class="fa fa-pencil" aria-hidden="true"></i>  Editar</a>
<button class="btn btn-delete btn-danger btn-xs" id="eliminar" data-target="#modalEliminar" data-id="'.$editorial->id.'" title="Eliminar">
<i class="fa fa-trash""></i>   Elim inar</button>'; })
            ->make(true);
 
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Editorial::query();

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
            'nombre'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'editorialdatatables_' . time();
    }
}
