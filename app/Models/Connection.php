<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
     protected $connection = 'mysqlsystem';
	
  
    public $timestamps = false; 
	
	public function prospectiveStudent()
	{
			return $this->hasOne('App\Models\ProspectiveStudent','studentId','prospectiveId');
	}
	public function instrument()
	{
			return $this->hasOne('App\Models\Instrument','instrumentId','instId');
	}
	
	public function pro_status()
	{
			return $this->hasOne('App\Models\ProspectiveStatus','statusId','status');
	}
}
