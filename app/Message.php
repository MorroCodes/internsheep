<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function convo()
    {
        return $this->belongsTo('\App\Conversation');
    }
}
