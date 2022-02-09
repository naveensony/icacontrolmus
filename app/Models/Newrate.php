<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Newrate extends Model
{
    protected $connection = 'mysqlsystem';
    protected $table = 'newrate';
  
    public $timestamps = false;
}
