<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
 protected $connection = 'mysqlsystem';
    protected $table = 'emails';
  
    public $timestamps = false;
}
