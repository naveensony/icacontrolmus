<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class StudentGfrate extends Model
{
    protected $connection = 'mysqlsystem';
    protected $table = 'student_gfrate';
  
    public $timestamps = false;
}
