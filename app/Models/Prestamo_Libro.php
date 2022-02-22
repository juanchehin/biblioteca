<?php

namespace app\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class partidas
 * @package App\Models
 * @version December 14, 2016, 8:55 pm UTC
 */
class Prestamo_Libro extends Model
{
   	use SoftDeletes;

    public $table = 'prestamos_libros';

  	protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public $fillable = [
        'id_prestamo',
        'id_libro',
        'fecha'
    ];

	protected $casts = [
        'id_prestamo'=> 'integer',
        'id_libro'=> 'integer',
        'fecha'=> 'date'
    ];

}