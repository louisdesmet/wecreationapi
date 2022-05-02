<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'credits', 'icon'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles() {
        return $this->belongsToMany('App\Role')->withPivot('business_id');
    }

    public function eventSkills() {
        return $this->belongsToMany(EventSkill::class, 'event_skill_user', 'event_skill_id', 'user_id')->withPivot('accepted', 'present');
    }

    public function events() {
        return $this->belongsToMany('App\Event')->withTimestamps();
    }

    public function activities() {
        return $this->belongsToMany('App\Activity')->withTimestamps();
    }

    public function businesses() {
        return $this->belongsToMany('App\Business')->withTimestamps();
    }

    public function users() {
        return $this->belongsToMany('App\User', 'user_user', 'user_id', 'liker_id');
    }

}
