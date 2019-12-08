<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Company;

class Internship extends Model
{
    protected $fillable = [
        'title', 'despription', 'address', 'profile_image', 'functie_omschrijving', 'aanbod', 'img',
    ];
    public function company(){
        return $this->belongsTo('App\Company');
    }
    public function getRouteKeyName(){
        return 'slug';
    }
    public function companySurvey()
    {
        return $this->belongsTo('\App\CompanySurvey');
    }

    public function apply(){
        return $this->hasMany('App\Apply');
    }



    public function users(){
        return $this->belongsToMany(User::class)->withTimeStamps();

    }
    public function students(){
        return $this->belongsToMany('App\Student');

    }

    public function ratings(){
        return $this->hasMany('App\Rating');
    }
}
