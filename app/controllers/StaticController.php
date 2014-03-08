<?php

class StaticController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function tos()
	{
		return View::make('frontend.static.tos');
	}
}