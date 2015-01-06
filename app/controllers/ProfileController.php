<?php


/*
|
|-------------------------------------------------------	
|	ProfileController
|-------------------------------------------------------
|
|	Methods foruser profiles
|
*/

class ProfileController extends BaseController {
	
	public function user($username)
	{
		
		$user = User::where('username', '=', $username);

		if ($user->count()) {

			$user = $user->first();

			// If user exist return user view
			return View::make('profile.user')->with('user', $user);
		}

		return App::abort(404);
	}


	/*
	*
	*	(GET) & (POST)
	*	Upload form & Download form. List files in Dropbox
	*
	*/

	// Get upload form
	public function getUpload($username)
	{
		
		if ($username === Auth::user()->username) {

			// Return view if user exist 
			return View::make('profile.upload');

		} 

		return App::abort(404);
	}

	// Post uploaded data
	public function postUpload()
	{

		// Grab all files
		$files = Input::file('files');
				
			foreach ($files as $file) {
				
				// Validate each file
				$validator = Validator::make(array('files' => $file), array('files' => 'required|image')); // <- Bug report can't store arrays in variables, Validator always fails

				if ($validator->passes()) {
					
					// If all Okay, move files to predetermined destination

					$path = 'uploads';
					$file_name = $file->getClientOriginalName();
					$success = $file->move($path, $file_name);

				} else {
					
					// If errors exist reroute user back to upload form
					return Redirect::back()->withErrors($validator)->withInput();

				}

			}

		// If successful redirect back with msg
		return Redirect::back()->with('global', 'Files were successfully uploaded');

	}


	// Get download view
	public function getDownload($username)
	{
		if ($username === Auth::user()->username) {

			// Return download view
			return View::make('profile.download')->with('files', File::files('uploads'));

		}

		return App::abort(404);

	}

}