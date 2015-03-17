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
Route::get('home', 'HomeController@index');
Route::get('about', 'PagesController@about');

Route::get('tasks', 'TasksController@index');

Route::resource('emails', 'EmailController');

Route::get('days', 'DaysController@index');
Route::get('days/{day}', 'DaysController@show');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('foo', ['middleware' => 'instructor', function(){
	return 'this page may only be viewed by instructor';
}]);
