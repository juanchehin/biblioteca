<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{
	
	public $table = 'editoriales';

    public $fillable = ['id', 'nombre'];
}
