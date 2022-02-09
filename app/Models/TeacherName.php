<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;


class TeacherName extends Model
{
	protected $connection = 'mysqlsystem';
    protected $table = 'teacherNames';
  
    public $timestamps = false;
	
	
	public function yourState()
	{
		return $this->belongsTo('App\Models\State','stateId','stateId');
	}
	
	
}
