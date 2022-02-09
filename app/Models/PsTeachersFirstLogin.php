<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class PsTeachersFirstLogin extends Model
{
    protected $connection = 'mysqlsystem';
    protected $table = 'ps_teachers_first_login';
  
    public $timestamps = false;
}
