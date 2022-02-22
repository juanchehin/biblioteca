<?php

namespace app\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class partidas
 * @package App\Models
 * @version December 14, 2016, 8:55 pm UTC
 */
class Prestamo extends Model
{
   	use SoftDeletes;

    public $table = 'prestamos';

  	protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public $fillable = [
        'nombre',
        'apellido',
        'dni',
        'email',
        'telefono',
        'institucion'
    ];

	protected $casts = [
        'nombre' => 'string',
        'apellido' => 'string',
        'dni' => 'integer',
        'email' => 'string',
        'telefono' => 'string',
        'institucion' => 'string'
    ];

}