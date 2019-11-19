<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    protected $fillable = ["name", "email", "password"];


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

    public function isAdmin()
    {
        foreach ($this->role()->get() as $role)
        {
            if ($role->name == 'admin')
            {
                return true;
            }
        }
    }
    public function isUser()
    {
        foreach ($this->role()->get() as $role)
        {
            if ($role->name == 'user')
            {
                return true;
            }
        }
    }
}
