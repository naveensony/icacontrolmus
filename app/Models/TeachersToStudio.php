<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class TeachersToStudio extends Model
{
    protected $table = 'TeachersToStudios';
  
    public $timestamps = false;
	
	function studio()
	{
			return $this->hasOne('App\Models\Studio','id','studioId');
	}
}
