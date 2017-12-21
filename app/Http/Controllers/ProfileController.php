<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Question;
use Auth;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $comments = $user->comments->count();
        $favs = $user->favorites->count();
        $questions = Question::where('user_id',$id)->paginate(5);
        return view('profile.show')->with('user',$user)->with('questions',$questions)->with('comments',$comments)->with('favs',$favs);
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
