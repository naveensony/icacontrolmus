<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $connection = 'mysqlsystem';
    protected $table = 'packages';
  
    public $timestamps = false;
}
