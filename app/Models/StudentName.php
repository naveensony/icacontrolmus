<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class StudentName extends Model
{
   protected $connection = 'mysqlsystem';
    protected $table = 'studentNames';
  
    public $timestamps = false;  
	
	public function hasAdmission ()
	{
		return $this->belongsTo('App\Models\Admission','studentId','studentId');
	}
	
	
	public function hasLesson()
	{
		 return $this->hasMany('App\Models\LessonRecord','studentId','studentId');
	}
	
	public function approveLesson()
	{
		 return $this->hasMany('App\Models\LessonRecord','studentId','studentId')->where('approveDate','>','0000-00-00');
	}
}
