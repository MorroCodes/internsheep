<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function user()
    {
        return $this->belongsTo('\App\User');
    }

    public function internships()
    {
        return $this->hasMany('\App\Internship');
    }
}
