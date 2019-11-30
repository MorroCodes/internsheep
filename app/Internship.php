<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

}
