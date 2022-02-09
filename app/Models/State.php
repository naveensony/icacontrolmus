<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $connection = 'mysqlsystem';
    protected $table = 'stateNames';
  
    public $timestamps = false;
}
