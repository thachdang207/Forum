<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = ["name", "email", "password", "role_id"];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function reports()
    {
        return $this->hasMany('App\Post');
    }

    public function role()
    {
        return $this->beLongto('App\Role');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
