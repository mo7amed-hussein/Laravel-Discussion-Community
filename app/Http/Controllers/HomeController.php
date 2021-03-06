<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\User;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Storage;
use File;
class HomeController extends Controller
{
    //

    public function getIndex()
    {
    	$questions = Question::orderBy('created_at','desc')->paginate(10);

        $comments = Comment::where('commentable_type','App\Question')->orderBy('created_at','desc')->take(10)->get();

    	return view('welcome')->with('questions',$questions)->with('comments',$comments->all());
    }

    public function getPopular()
    {
    	$questions = Question::orderBy('views','desc')->paginate(10);

    	$comments = Comment::where('commentable_type','App\Question')->orderBy('created_at','desc')->take(10)->get();
        
        return view('welcome')->with('questions',$questions)->with('comments',$comments);
    }

    public function getRated()
    {
        $questions = Question::withCount('votes')->orderBy('votes_count','desc')->paginate(10);
        //dd($questions);
        $comments = Comment::where('commentable_type','App\Question')->orderBy('created_at','desc')->take(10)->get();
        
        return view('welcome')->with('questions',$questions)->with('comments',$comments);
    }


    public function getProfile($userName)
    {
        if(Auth::check() & (Auth::user()->userName == $userName) )
        {
            return redirect()->route('profile.show',Auth::id());
        }

        $user = User::where('userName',$userName)->first();
        $questions = Question::where('user_id',$user->id)->paginate(5);
        //dd($user);
        return view('profile')->with('user',$user)->with('questions',$questions);
    }

    public function getQuestion($slug)
    {
        $question = Question::where('slug',$slug)->first();
        if(Auth::check() & (Auth::id() == $question->user_id) )
        {

            return redirect()->route('questions.show',$question->id);
            
        }
        $question->increment('views');
        $recentQuestions = Question::orderBy('created_at','desc')->take(10)->get();
        return view('question')->with('question',$question)->with('recentQuestions',$recentQuestions);
    }

    public function getUsers()
    {
        $users = User::orderBy('created_at','desc')->paginate(10);
        return view('users')->with('users',$users);
    }

    public function getAvatar($file)
    {
        dd('test');
        $img = Storage::disk('public')->get('avatar/'.$file);
        dd($img);
        return new Response($img,200);
    }

}
