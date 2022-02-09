<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class LessonRecord extends Model
{
    protected $connection = 'mysqlsystem';
    protected $table = 'lessonRecords';
    public $timestamps = false;
	//protected $dates = ['approveDate'];
	
	
	function hasStudentName()
	{
			return $this->hasOne('App\Models\StudentName','studentId','studentId');
	}
	
	function hasInsturmentName()
	{
			return $this->hasOne('App\Models\Instrument','instrumentId','instrumentId');
	}
	
	function hasTeacherName()
	{
			return $this->hasOne('App\Models\Instrument','instrumentId','instrumentId');
	}
	
	function hasrate()
	{
			return $this->belongsTo('App\Models\Admission','admissionId','admissionId');
	}
}
