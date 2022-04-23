<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    public function products() {
        return $this->hasMany('App\Product');
    }

    public function users() {
        return $this->belongsToMany('App\User');
    }
}
