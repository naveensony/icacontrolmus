<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ProspectiveStatus extends Model
{
	 protected $connection = 'mysqlsystem';
	
  
    public $timestamps = false; 
	protected $table ='prospective_status';
}
