<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
	public function users(){
		return $this->hasMany('App\User', 'department_id');
	}
}
