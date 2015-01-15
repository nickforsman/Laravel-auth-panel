<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array(
	'as' => 'home', 
	'uses' => 'HomeController@home'
));


// User profiles
Route::get('/user/{username}', array(
	'as' => 'profile-user',
	'uses' => 'ProfileController@user'
));


// Authenticated group
Route::group(array('before' => 'auth'), function() {

	// Logging out
	Route::get('/account/logout', array(
		'as' => 'account-logout',
		'uses' => 'AccountController@getLogOut'
	));


	// Get Upload & Download forms
	Route::get('/user/{username}/upload', array(
		'as' => 'user-upload',
		'uses' => 'ProfileController@getUpload'
	));

	// Get Upload & Download forms
	Route::get('/user/{username}/download', array(
		'as' => 'user-download',
		'uses' => 'ProfileController@getDownload'
	));

	// Upload + csrf token
	Route::group(array('before' => 'csrf'), function() {

		// Post upload form
		Route::post('/user/upload', array(
			'as' => 'user-upload-post',
			'uses' => 'ProfileController@postUpload'
		));

	});

	// Search form API request with an anonymous function
	Route::get('/request/api/users/json', function() { // <- XML will also be available in the future

		// $searchTerm = Input::get('users'); <- will be used in future
		
		// Get all users from db
		$api = User::select('id','username')->where('username', 'LIKE', '%%');

		// Show recommended user
		$api = $api->get();

		// Return a json response for angular service call
		return Response::json($api);
	
	});

});


// Unauthenticated group
Route::group(array('before' => 'guest'), function() {

	// Generate CSRF token while posting data
	Route::group(array('before' => 'csrf'), function() {
		
		// Post Register Data
		Route::post('/account/create', array(
			'as' => 'account-create-post',
			'uses' => 'AccountController@postCreate'
		));


		// Post Login Data
		Route::post('account/login', array(
			'as' => 'account-login-post',
			'uses' => 'AccountController@postLogin'
		));

	});

	// Login (GET)
	Route::get('/account/login', array(
		'as' => 'account-login',
		'uses' => 'AccountController@getLogin'
	));

	// Get Register Account Form
	Route::get('/account/create', array(
		'as' => 'account-create',
		'uses' => 'AccountController@getCreate'
	));

	// Route to acccount activation
	Route::get('/account/activate/{code}', array(
		'as' => 'account-activate',
		'uses' => 'AccountController@getActivate'
	));

});