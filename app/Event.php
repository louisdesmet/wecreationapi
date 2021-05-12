<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function project() {
        return $this->belongsTo('App\Project');
    }

    public function users() {
        return $this->belongsToMany('App\User')->withPivot('id', 'hours', 'accepted', 'present');
    }

    public function skills() {
        return $this->belongsToMany('App\Skill')->withPivot('user_id', 'hours');
    }
}
