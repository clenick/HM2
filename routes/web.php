<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('login','LoginController@login');
Route::post('login','LoginController@checkLogin');

Route::get('logout','LoginController@logout');

Route::get('signup','RegisterController@index');
Route::post('signup','RegisterController@create');
Route::get('signup/username/{q}','RegisterController@checkUsername');

Route::get('home','HomeController@home');
Route::get('toyCategory','ToyController@toyCategory');
Route::get('toy/category/{category}','ToyController@getToybyCategory');

Route::get('letter','LetterController@letter');
Route::get('toy','ToyController@toy');
Route::get('image', 'ImageController@unsplash');
Route::get('letter/message/{message}/image/{image}', 'LetterController@createLetter');
Route::get('request/toy/{toy}', 'LetterController@createRequest');

Route::get('playlist','PlaylistController@playlist');
Route::get('feedPlaylist','PlaylistController@getPlaylist');
Route::get('feedPlaylist/nome/{n}', 'PlaylistController@createPlaylist');

Route::get('music','MusicController@index');
Route::get('music/track/{track}','MusicController@music');
Route::get('createTrack/title/{title}/link/{link}/artist/{artist}/playlist/{playlist}','MusicController@createTrack');
Route::get('getTrack/playlist/{id_playlist}','PlaylistController@getTrack');
Route::get('deleteTrack/codice/{codice}','PlaylistController@deleteTrack');
Route::get('deletePlaylist/codice/{codice}','PlaylistController@deletePlaylist');

Route::get('readLetter','ReadLetterController@readLetter');
Route::get('getYearLetter','ReadLetterController@getYearLetter');
Route::get('letter/id/{letter_id}','ReadLetterController@getToy');
