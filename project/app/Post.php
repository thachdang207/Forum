<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=["title","description","content","category_id"];
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function reports()
    {
        return $this->hasMany('App\Report');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
