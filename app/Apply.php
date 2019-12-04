<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    public function internship()
    {
        return $this->belongsTo('App\Apply');
    }

    public function students()
    {
        return $this->belongsTo('App\Student');
    }
}
