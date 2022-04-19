<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function project() {
        return $this->belongsTo('App\Project');
    }
    
    public function event_skill()
    {
        return $this->hasMany('App\EventSkill');
    }

    public function group() {
        return $this->hasOne('App\Group');
    }

    public function users() {
        return $this->belongsToMany('App\User');
    }
}
