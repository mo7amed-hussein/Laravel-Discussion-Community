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
Route::resource('questions','QuestionController');
Route::resource('profile','ProfileController');
Auth::routes();

//tags route
Route::resource('tags','TagController',['except'=>['update','destroy'] ]);
Route::post('tags/{id}','TagController@update')->name('tags.update');

Route::get('tags/{id}/del','TagController@destroy')->name('tags.destroy');

Route::get('/{userName}', 'HomeController@getProfile')->name('profile.all.show');