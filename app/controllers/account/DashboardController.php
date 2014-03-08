<?php namespace Controllers\Account;

use AuthorizedController;
use View;

class DashboardController extends AuthorizedController {

	/**
	 * Show account dashboard page.
	 *
	 * @return View
	 */
	public function getIndex()
	{
		return View::make('frontend.account.dashboard');
	}

}
