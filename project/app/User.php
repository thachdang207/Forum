<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
<<<<<<< HEAD
    protected $fillable = ["name", "email", "password", "role_id"];
=======
    protected $fillable = ["name", "email", "password"];
>>>>>>> 9530b70f61c5b3d8879a8521bd73597622c8fdf2

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
<<<<<<< HEAD
        return $this->beLongto('App\Role');
=======
        return $this->belongsTo('App\Role');
>>>>>>> 9530b70f61c5b3d8879a8521bd73597622c8fdf2
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
