<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
class HomeController extends Controller
{
    //

    public function getIndex()
    {
    	$questions = Question::orderBy('created_at','desc')->paginate(3);
    	return view('welcome')->with('questions',$questions);
    }
}
