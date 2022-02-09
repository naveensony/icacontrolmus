<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class MessageUser extends Model
{
    protected $connection = 'mysqlsystem';
    protected $table = 'message_user';
  
    public $timestamps = false;
}
