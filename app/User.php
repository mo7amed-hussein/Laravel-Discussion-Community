<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Question;
use Auth;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','userName'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function questions()
    {
        return $this->hasMany('App\Question');
    }

    public function comments()
    {
        //return $this->hasMany('App\Comment');
        return $this->hasMany('App\Comment');
    }
    public function votes()
    {
        return $this->hasMany('App\Vote');
    }

    public function favorites()
    {
        return $this->hasMany('App\Favorite');
    }

    public function favorite( $question)
    {
        $fav =Favorite::where('question_id',$question)->where('user_id',Auth::id())->first();
       // Question::find($question)->favorites()->where('user_id',Auth::id());
       // dd($fav);
        if($fav)
        {
            return $fav->id;
        }
        return null;
    }
}
