<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{	
	public $table = 'libros';

    public $fillable = ['id','titulo', 'categoria','autor', 'area', 'nivel', 'genero', 'region', 'cant_ejemplares', 'anio','estado','libros_prestados','ubicacion', 'num_coleccion', 'coleccion_id', 'editorial_id', 'user_id'];


    public function editorial(){
    	return $this->belongsTo('app\Models\Editorial');

    }

    public function coleccion(){
    	return $this->belongsTo('app\Models\Coleccion');

    }

}

