<?php namespace Controllers\Account;

use AuthorizedController;
use View;

class SettingsController extends AuthorizedController {

	/**
	 * Show account settings page.
	 *
	 * @return View
	 */
	public function getIndex()
	{
		return View::make('frontend.account.settings');
	}

}
