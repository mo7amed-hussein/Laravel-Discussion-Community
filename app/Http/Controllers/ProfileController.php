<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Question;
use App\Comment;
use App\Favorite;
use Auth;
class ProfileController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function updateName(Request $request)
    {
        $this->validate($request,['name'=>'required']);
        $user = Auth::user();
        $user->name = $request->name;
        $user->update();
        return back()->with('success','Name updated successfully');
    }

    public function updateUserName(Request $request)
    {
        $user = Auth::user();
        if($user->userName != $request->userName)
        {
            $this->validate($request,['userName'=>'required|unique:users']);
            $user->name = $request->name;
             $user->update();
        }
        return back()->with('success','user Name updated successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::find($id);
        $comments = Comment::where('user_id',$id)->where('commentable_type','App\Question')->count();
        $favs = $user->favorites->count();
        $questions = $user->questions->count();
        $data = Question::where('user_id',$id)->paginate(5);
        $tab = 'questions';
        return view('profile.show')->with('data',$data)->with('user',$user)->with('questions',$questions)->with('comments',$comments)->with('favs',$favs)->with('tab',$tab);
    }

    public function showComments($id)
    {
        //
        $user = User::find($id);
        $comments = Comment::where('user_id',$id)->where('commentable_type','App\Question')->count();
        $favs = $user->favorites->count();
        $questions = $user->questions->count();
        $data = Comment::where('user_id',$id)->where('commentable_type','App\Question')->paginate(5);
        $tab = 'comments';
        return view('profile.showComments')->with('data',$data)->with('user',$user)->with('questions',$questions)->with('comments',$comments)->with('favs',$favs)->with('tab',$tab);
    }

    public function showFavs($id)
    {
        //
        $user = User::find($id);
        $comments = Comment::where('user_id',$id)->where('commentable_type','App\Question')->count();
        $favs = $user->favorites->count();
        $questions = $user->questions->count();
        $data = Favorite::where('user_id',$id)->paginate(5);
        $tab = 'favs';
        return view('profile.showFavs')->with('data',$data)->with('user',$user)->with('questions',$questions)->with('comments',$comments)->with('favs',$favs)->with('tab',$tab);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
