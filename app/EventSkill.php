<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class EventSkill extends Pivot
{
    protected $table = 'event_skill';

    public function users() {
        return $this->belongsToMany(User::class, 'event_skill_user', 'event_skill_id', 'user_id')->withPivot('accepted', 'present');
    }

    public function skill() {
        return $this->belongsTo('App\Skill');
    }
    
}
