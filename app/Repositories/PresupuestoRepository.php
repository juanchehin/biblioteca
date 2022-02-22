<?php

namespace app\Repositories;

use app\Models\Presupuesto;
use InfyOm\Generator\Common\BaseRepository;

class PresupuestoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'anio',
      
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Presupuesto::class;
    }
}
