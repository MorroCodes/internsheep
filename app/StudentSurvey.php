<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentSurvey extends Model
{
    public function users()
    {
        return $this->belongsTo('\App\User');
    }
}
