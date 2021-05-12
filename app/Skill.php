<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public function events() {
        return $this->belongsToMany('App\Event')->withPivot('user_id', 'hours');
    }
}
