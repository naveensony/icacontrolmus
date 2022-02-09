<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
	protected $connection = 'mysqlsystem';
    protected $table = 'admissions';
  
    public $timestamps = false;
	
	
	function name()
	{
			return $this->hasOne('App\Models\StudentName','studentId','studentId');
	}
	
	function instName()
	{
			return $this->hasOne('App\Models\Instrument','instrumentId','instrumentId');
	}
	public function teacherInfo()
	{
		return $this->belongsTo('App\Models\TeacherName','teacherId','teacherId');
	}
}
