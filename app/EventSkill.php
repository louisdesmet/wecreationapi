<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class EventSkill extends Pivot
{
    protected $table = 'event_skill';

    public function users() {
        return $this->belongsToMany(User::class, 'event_skill_user', 'event_skill_id', 'user_id')->withPivot('id', 'accepted', 'accepted_at', 'present', 'present_at');
    }

    public function skill() {
        return $this->belongsTo('App\Skill');
    }
    
}
