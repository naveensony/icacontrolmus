<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    protected $connection = 'mysqlsystem';
    protected $table = 'counters';
  
    public $timestamps = false;
	
	 protected $fillable = ['page','hits'];
}
