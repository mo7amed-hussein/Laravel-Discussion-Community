<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Question extends Model
{
    //
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function tags()
    {
    	return $this->belongsToMany('App\Tag');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment','commentable');
    }

    public function votes()
    {
        return $this->morphMany('App\Vote','votable');
    }
}
