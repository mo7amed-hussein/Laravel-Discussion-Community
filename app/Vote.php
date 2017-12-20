<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    //
    public function votable()
    {
    	return $this->morphTo();
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
