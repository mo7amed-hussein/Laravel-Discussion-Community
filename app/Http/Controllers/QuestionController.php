<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Tag;
use Session;
use Illuminate\Support\Facades\Auth;
class QuestionController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $recentQuestions = Question::orderBy('created_at','desc')->take(10)->get();
        return view('questions.create')->with('tags',$tags)->with('recentQuestions',$recentQuestions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate data
        $this->validate($request,[
            'title'=>'required|max:255',
              'body'=>'required|min:10',
              'slug'=> 'required|alpha_dash |unique:questions| max:255|min:5']);
        //create new question object and assign recieved values to it
        $question = new Question;
        $question->title=$request->title;
        $question->body=$request->body;
        $question->slug=$request->slug;
        $question->user()->associate(Auth::user());
        $question->views=0;
        $question->save();
        //create tags in link table
        $question->tags()->sync($request->tags,false);
        Session::flash("success","question added successfully");
        return redirect()->route('questions.show',$question->id);
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
        $question = Question::find($id);
        $question->increment('views');
        $recentQuestions = Question::orderBy('created_at','desc')->take(10)->get();
        return view('questions.show')->with('question',$question)->with('recentQuestions',$recentQuestions);
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
        $tags = Tag::all();
        $question = Question::find($id);
        $recentQuestions = Question::orderBy('created_at','desc')->take(10)->get();
        return view('questions.edit')->with('question',$question)->with('recentQuestions',$recentQuestions)->with('tags',$tags);
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
        $question = Question::find($id);
        if($question->slug == $request->slug)
        {
            $this->validate($request,[
            'title'=>'required|max:255',
              'body'=>'required|min:10']);
        }
        else
        {
          $this->validate($request,[
            'title'=>'required|max:255',
              'body'=>'required|min:10',
              'slug'=> 'required|alpha_dash |unique:questions| max:255|min:5']);  
        }
    
        $question->title=$request->title;
        $question->body=$request->body;
        $question->slug=$request->slug;
        //$question->user_id=1;
        $question->save();
        //create tags in link table
        $question->tags()->sync($request->tags);
        Session::flash("success","question updated successfully");
        return redirect()->route('questions.show',$question->id);
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
        $question = Question::find($id);
        $question->tags()->detach();
        $question->delete();
        Session::flash("success","Question deleted successfully");
        return redirect()->back();
    }
}
