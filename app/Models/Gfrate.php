<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Gfrate extends Model
{
    protected $connection = 'mysqlsystem';
    protected $table = 'gfrate';
  
    public $timestamps = false;
}
