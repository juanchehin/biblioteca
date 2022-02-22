<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Coleccion extends Model
{
	
	public $table = 'colecciones';

    public $fillable = ['id', 'nombre'];
}
