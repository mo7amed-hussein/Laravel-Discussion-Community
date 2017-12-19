<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Question;
class SearchController extends Controller
{
    //
    public function searchQuestions(Request $request)
    {
    	$keyword = $request->keyword;
    	$questions = Question::where('title','like','%'.$keyword.'%')->orWhere('body','like','%'.$keyword.'%')->paginate(10);
    	$questionTags = Question::whereHas('tags',function($query)use($keyword){
    		 return $query->where('name','like','%'.$keyword.'%');
    	})->paginate(10);

    	$items = array_merge($questions->items(),$questionTags->items());
    	$total = $questions->total()+$questionTags->total();
    	$items = collect($items)->unique();
    	$count = count($items)==0?1:count($items);
    	//dd($questionTags);
    	$currentPage = LengthAwarePaginator::resolveCurrentPage();
    	$data = new LengthAwarePaginator($items,$total,$count,$currentPage);
    	return view('search.questions')->with('questions',$data)->with('keyword',$keyword);
    }
}
