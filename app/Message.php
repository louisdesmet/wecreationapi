<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function recipient() {
        return $this->belongsTo('App\User', 'recipient_id');
    }

    public function group() {
        return $this->belongsTo('App\Group');
    }
}
