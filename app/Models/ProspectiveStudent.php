<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ProspectiveStudent extends Model
{
      protected $connection = 'mysqlsystem';
	
  
    public $timestamps = false; 
	
	//prospective_students
	
	
	
	function instName()
	{
			return $this->hasOne('App\Models\Instrument','instrumentId','instr');
	}
	
	public function connect()
	{
		return $this->belongsTo('App\Models\Connection','prospectiveId');
	}
}
