<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    public function company()
    {
        return $this->belongsTo('\App\Company');
    }

    public function companySurvey()
    {
        return $this->belongsTo('\App\CompanySurvey');
    }
}
