<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class TeacherPaymentMethod extends Model
{
    protected $connection = 'mysqlsystem';
    protected $table = 'teacher_payment_method';
  
    public $timestamps = false;
}
