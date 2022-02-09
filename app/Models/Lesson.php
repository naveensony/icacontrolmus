<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $connection = 'mysqlsystem';
    protected $table = 'lessons';
  
    public $timestamps = false;
}
