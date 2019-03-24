<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datasensor extends Model
{
  	protected $fillable = ['waktu', 'level', 'ip'];
}
