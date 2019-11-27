<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function users()
    {
        return $this->belongsTo('\App\User');
    }

protected $with = ['internships'];

    public function internship()
    {
        return $this->hasMany('App\Internship');
    }
}
