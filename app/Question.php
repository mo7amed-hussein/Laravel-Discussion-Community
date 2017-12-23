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

    public function favorites()
    {
        return $this->hasMany('App\Favorite');
    }

    public function delete()
    {
        //dd( $this->comments()->get());
        $commentsStack = array();
        foreach ($this->comments()->get() as $comment) {
            # code...
            $comment->votes()->delete();
            $commentsStack[]= $comment;
            while(count($commentsStack)>0)
            {
                $tmp = array_pop($commentsStack);
                if($tmp->comments->count()>0)
                {
                    $commentsStack = array_merge($commentsStack,$tmp->comments->all());
                }
                $tmp->delete();

            }
            
        }
        $this->votes()->delete();
        $this->favorites()->delete();
        Parent::delete();
    }
}
