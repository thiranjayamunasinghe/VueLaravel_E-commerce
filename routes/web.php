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

Route::get('/', function () {
    return view('welcome');
});

Route::get('registerPage', ['uses'=>'UserController@registerPage','as' => 'registerPage']);
/*
Route::post('register',['uses'=>'UserController@registerUser',
	'as' => 'signup']);
*/

//Route::post('register','UserController@registerUser');


/*Route::post('login',['uses'=>'UserController@loginUser',
	'as' => 'login']);*/

Route::get('logged', ['uses'=>'UserController@getLogged',
	'as'=>'logged'])->middleware('auth');

Route::get('logout',['uses'=>'UserController@logoutUser',
	'as' => 'logout']);

Route::get('verifyEmailFirst',['uses'=>'UserController@verifyEmailFirst',
    'as' => 'verifyEmail']);

Route::get('verify/{email}/{verifyToken}',['uses'=>'UserController@sendEmailDone',
    'as' => 'sendEmailDone']);

Route::get('loginPage',['uses'=>'UserController@loginPage',
    'as' => 'loginPage']);