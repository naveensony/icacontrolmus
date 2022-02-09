<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ZipBoundaries extends Model
{
    protected $connection = 'mysqlsystem';
    protected $table = 'zip_boundaries';
  
    public $timestamps = false;
}
