<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
  return $this->hasMany('App/Internship');
}
