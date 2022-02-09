<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Zipcode extends Model
{
	protected $connection = 'mysqlsystem';
    protected $table = 'zipcodes';
  
    public $timestamps = false;
}
