<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;
use App\Favorite;
use Auth;
class FavoriteController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function addFavorites(Question $question)
	{
		$fav = new Favorite;
		$fav->user_id=Auth::id();
		$fav->question_id=$question;
		$fav->save();
		return back();
	}

	public function removeFavorites(Question $question)
	{
		$fav = Favorite::where('question_id',$question)->where('user_id',Auth::id(););
		if($fav)
		{
			$fav->delete();
		}

		return back();
	}

}
