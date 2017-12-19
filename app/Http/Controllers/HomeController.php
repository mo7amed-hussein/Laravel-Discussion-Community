<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\User;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    //

    public function getIndex()
    {
    	$questions = Question::orderBy('created_at','desc')->paginate(3);
    	return view('welcome')->with('questions',$questions);
    }

    public function getPopular()
    {
    	$questions = Question::orderBy('views','desc')->paginate(3);
    	return view('welcome')->with('questions',$questions);
    }

    public function getProfile($userName)
    {
        if(Auth::check() & (Auth::user()->userName == $userName) )
        {
            return redirect()->route('profile.show',Auth::id());
        }

        $user = User::where('userName',$userName)->first();
        $questions = Question::where('user_id',Auth::id())->paginate(5);
        //dd($user);
        return view('profile')->with('user',$user)->with('questions',$questions);
    }


}
