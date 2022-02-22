<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	
	public $table = 'users';

    public $fillable = ['id', 'name', 'password', 'username'];
}
