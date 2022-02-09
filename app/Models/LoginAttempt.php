<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class LoginAttempt extends Model
{
    protected $connection = 'mysqlsystem';
    protected $table = 'login_attempt';
  
    public $timestamps = false;
}
