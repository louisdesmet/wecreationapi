<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function events() {
        return $this->hasMany('App\Event');
    }

    public function leader() {
        return $this->belongsTo('App\User');
    }
}
