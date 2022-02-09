<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class StudentLatLong extends Model
{
    protected $connection = 'mysqlsystem';
    protected $table = 'studentLatLong';
  
    public $timestamps = false;
}
