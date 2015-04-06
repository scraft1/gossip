<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('users', 'TestController@users');
Route::get('want', 'TestController@want');
Route::get('rumor', 'TestController@rumor');

Route::get('peers', 'PeersController@index');
Route::get('peers/create', 'PeersController@create');
Route::post('peers', 'PeersController@store');

Route::get('messages', 'MessagesController@index');
Route::post('messages', 'MessagesController@store');
Route::post('receive/{x}', 'MessagesController@receive');
Route::post('send', 'MessagesController@send');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


// CREATIVITY PROJECT
Route::get('paintings/quiz', 'PaintingsController@quiz');
Route::get('paintings/artists', 'PaintingsController@artists');
Route::get('paintings/artists/{x}', 'PaintingsController@artist');
Route::resource('paintings', 'PaintingsController');
