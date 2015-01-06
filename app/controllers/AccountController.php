<?php


class AccountController extends BaseController {
	
	/*
	|--------------------------------------------------------------------------
	| Account Controllers
	|--------------------------------------------------------------------------
	|
	| We create functions for logins, registers and activations. 
	|
	*/

	public function getCreate()
	{
		// Return the created account View
		return View::make('account.create');
	}

	public function postCreate()
	{
		// Select all form inputs
		$validator = Validator::make(Input::all(), 
			array(
				'email' => 'required|max:50|email|unique:users',
				'username' => 'required|max:50|min:3|unique:users',
				'password' => 'required|min:6',
				'passwordAgain' => 'required|same:password'
			)
		);

		if($validator->fails()) {

			// if errors exist reroute user back to register form
			return Redirect::route('account-create')->withErrors($validator)->withInput();
		
		} else {

			// Save $_GET data in variables THE laravel way

			$email = Input::get('email');
			$username = Input::get('username');
			$password = Input::get('password');

			// Activation code
			$code = str_random(60);

			// Use Eloquent User model
			$user = User::create(array(
				'email' => $email,
				'username' => $username,
				'password' => Hash::make($password),
				'code' => $code,
				'active' => 0
			));

			if ($user) {

				// Send activation email to user
				Mail::send('emails.auth.activate', array(
					'link' 		=> URL::route('account-activate', $code), 
					'username' 	=> $username
				), function($message) use ($user) {
					$message->to($user->email, $user->username)->subject('Activate your account');
				});

				// If successful
				return Redirect::route('home')->with('global', 'Your account has been created. Please verify your account in the email we sent you.');
			}

		}

	}


	public function getActivate($code) 
	{
		// Find the current user
		$user = User::where('code', '=', $code)->where('active', '=', 0);

		if ($user->count()) {
			// Find first matching user
			$user = $user->first();

			// Update user to active
			$user->active = 1;
			$user->code = '';

			if ($user->save()) {
				// Activation was successful
				return Redirect::route('home')->with('global', 'Account activation was successful.');
			}

		}

		// If all fails display error msg
		return Redirect::route('home')->with('global', 'We could not activate your account, you may cry :(');
	}

	public function getLogin() 
	{
		return View::make('account.login');
	}

	public function postLogin() 
	{
		$validator = Validator::make(Input::all(), 
			array(
				'username' => 'required',
				'password' => 'required'
			)
		);

		if ($validator->fails()) {
			
			return Redirect::route('account-login')->withErrors($validator)->withInput();
		
		} else {

			// Attempt sign in
			$auth = Auth::attempt(array(
				'username' => Input::get('username'),
				'password' => Input::get('password'),
				'active' => 1
			), Input::has('remember')); // Remember me checked

			if ($auth) {
				// Redirect to intended page
				return Redirect::intended('/');
			} else {
				return Redirect::route('account-login')->with('global', 'Login error, password & username missmatch.');
			}

		}

		return Redirect::route('account-login')->with('global', 'Could not login, try again later.');

	}

	public function getLogOut() 
	{
		Auth::logout();
		return Redirect::route('home');
	}


}