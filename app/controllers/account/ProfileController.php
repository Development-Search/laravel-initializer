<?php namespace Controllers\Account;

use AuthorizedController;
use Input;
use Redirect;
use Sentry;
use Validator;
use View;

class ProfileController extends AuthorizedController {

	/**
	 * User profile page.
	 *
	 * @return View
	 */
	public function getIndex()
	{
		// Get the user information
		$user = Sentry::getUser();

		// Show the page
		return View::make('frontend.account.profile', compact('user'));
	}

	/**
	 * User profile form processing page.
	 *
	 * @return Redirect
	 */
	public function postIndex()
	{
		// Declare the rules for the form validation
		$rules = array(
			'first_name' => 'required|min:3',
			'last_name'  => 'required|min:3',
		);

		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails())
		{
			// Ooops.. something went wrong
			return Redirect::back()->withInput()->withErrors($validator);
		}

		// Grab the user
		$user = Sentry::getUser();

		// Update the user information
		$user->first_name = Input::get('first_name');
		$user->last_name  = Input::get('last_name');
		$user->save();

		// Redirect to the settings page
		return Redirect::route('account.profile.index')->with('success', 'Account successfully updated');
	}

}
