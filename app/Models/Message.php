<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $connection = 'mysqlsystem';
    protected $table = 'messages';
  
    public $timestamps = false;
}
