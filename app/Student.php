<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function users()
    {
        return $this->belongsTo('\App\User');
    }

    public function apply()
    {
        return $this->hasMany('\App\Apply');
    }
}
