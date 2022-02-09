<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class MakeRequest extends Model
{
	protected $connection = 'mysqlsystem';
    protected $table = 'makeRequest';
  
    public $timestamps = false;
}
