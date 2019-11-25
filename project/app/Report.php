<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ["content", "post_id", "user_id"];

    public function post()
    {
        return $this->beLongTo('App\Post');
    }

    public function user()
    {
        return $this->beLongTo('App\User');
    }
}
