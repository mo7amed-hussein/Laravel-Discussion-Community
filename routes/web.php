<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'HomeController@getIndex')->name('home');
Route::get('/popular', 'HomeController@getPopular')->name('home.popular');

Route::get('/rated', 'HomeController@getRated')->name('home.rated');
//questions routes
Route::resource('questions','QuestionController',['except'=>['update','destroy'] ]);

Route::post('questions/{id}','QuestionController@update')->name('questions.update');

Route::get('questions/{id}/del','QuestionController@destroy')->name('questions.destroy');


Route::resource('profile','ProfileController');
Auth::routes();

//tags route
Route::resource('tags','TagController',['except'=>['update','destroy'] ]);
Route::post('tags/{id}','TagController@update')->name('tags.update');

Route::get('tags/{id}/del','TagController@destroy')->name('tags.destroy');

Route::get('/{userName}', 'HomeController@getProfile')->name('profile.all.show');
Route::get('question/{slug}', 'HomeController@getQuestion')->name('question.all.show');

Route::get('search/all/', 'SearchController@searchQuestions')->name('search');

Route::post('comments/{qestion}','CommentController@store')->name('comments.store');
Route::post('repy/{comment}','CommentController@storeReply')->name('comments.reply');

Route::get('voteComment/up/{comment}', 'VoteController@voteCommentUp')->name('vote.comment.up');

Route::get('voteComment/down/{comment}', 'VoteController@voteCommentDown')->name('vote.comment.down');

Route::get('voteQuestion/down/{question}', 'VoteController@voteQuestionDown')->name('vote.question.down');

Route::get('voteQuestion/up/{question}', 'VoteController@voteQuestionUp')->name('vote.question.up');

Route::get('favorite/add/{question}', 'FavoriteController@addFavorites')->name('favorite.add');

Route::get('favorite/remove/{id}', 'FavoriteController@removeFavorites')->name('favorite.remove');

Route::post('updateName','ProfileController@updateName')->name('updateName');
Route::post('updateUserName','ProfileController@updateUserName')->name('updateUserName');

Route::post('updateBio','ProfileController@updateBio')->name('updateBio');

Route::post('updateEmail','ProfileController@updateEmail')->name('updateEmail');
Route::post('updateCountry','ProfileController@updateCountry')->name('updateCountry');

Route::post('updateAvatar','ProfileController@updateAvatar')->name('updateAvatar');

Route::get('users/all/', 'HomeController@getUsers')->name('users');

Route::get('profile/comments/{id}', 'ProfileController@showComments')->name('profile.comments');
Route::get('profile/favs/{id}', 'ProfileController@showFavs')->name('profile.favs');

Route::get('userImg/{file}', 'HomeController@getAvatar')->name('user.img');
