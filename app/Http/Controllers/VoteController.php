<?php

namespace App\Http\Controllers;

use App\Vote;
use Illuminate\Http\Request;
use App\Question;
use App\Comment;
use Auth;
class VoteController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function voteQuestionUp(Question $question)
    {
        //
        $vote = Vote::where('votable_type','App\Question')->where('user_id',Auth::id())->where('votable_id',$question->id)->first();
        if(!$vote)
        {
            $vote = new Vote;
            
        }
        
        $vote->user_id= Auth::id();
        $vote->value=1;
        $question->votes()->save($vote);
        return back();
    }

    public function voteQuestionDown(Question $question)
    {
        //

        $vote = Vote::where('votable_type','App\Question')->where('user_id',Auth::id())->where('votable_id',$question->id)->first();
        //dd($vote ,$question);
        if(!$vote)
        {
            $vote = new Vote;
            
        }
        
        
        $vote->user_id= Auth::id();
        $vote->value=-1;
        $question->votes()->save($vote);
       
        
        return back();
    }

    public function voteCommentUp(Comment $comment)
    {
        //
        $vote = Vote::where('votable_type','App\Comment')->where('user_id',Auth::id())->where('votable_id',$comment->id)->first();
        if(!$vote)
        {
            $vote = new Vote;
            
        }
        $vote->user_id= Auth::id();
        $vote->value=1;
        $comment->votes()->save($vote);
        return back();
    }

    public function voteCommentDown(Comment $comment)
    {
        //
        $vote = Vote::where('votable_type','App\Comment')->where('user_id',Auth::id())->where('votable_id',$comment->id)->first();
        if(!$vote)
        {
            $vote = new Vote;
            
        }
        $vote->user_id= Auth::id();
        $vote->value=-1;
        $comment->votes()->save($vote);
        return back();
    }
    
    

}
