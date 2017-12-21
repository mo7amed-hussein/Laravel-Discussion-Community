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