<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable=["name"];
    public function users(){
        return $this->hasMany('App\User');
    }
    public function user(){
        return $this->beLongTo('App\User');
    }
}
