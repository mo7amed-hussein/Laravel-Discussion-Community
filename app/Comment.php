<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public function commentable()
    {
    	return $this->morphTo();
    }
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    public function comments()
    {
    	//return $this->hasMany('App\Comment');
        return $this->morphMany('App\Comment','commentable');
    }
}
