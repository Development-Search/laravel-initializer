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

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Register all the admin routes.
|
*/

Route::group(['prefix' => 'admin'], function()
{

	# User Management
	Route::group(['prefix' => 'users'], function()
	{
		Route::get('/'               , ['as' => 'user.index'         , 'uses' => 'Controllers\Admin\UsersController@getIndex']);
		Route::get('/non-activate'   , ['as' => 'user.non-activate'  , 'uses' => 'Controllers\Admin\UsersController@getNonActivate']);
		Route::get('/deleted'        , ['as' => 'user.activate'      , 'uses' => 'Controllers\Admin\UsersController@getDeleted']);
		Route::get('/all'            , ['as' => 'user.all'           , 'uses' => 'Controllers\Admin\UsersController@getAll']);
		Route::get('create'          , ['as' => 'user.create.index'  , 'uses' => 'Controllers\Admin\UsersController@getCreate']);
		Route::post('create'         , ['as' => 'user.create.process', 'uses' => 'Controllers\Admin\UsersController@postCreate']);
		Route::get('{userId}/edit'   , ['as' => 'user.update.index'  , 'uses' => 'Controllers\Admin\UsersController@getEdit']);
		Route::post('{userId}/edit'  , ['as' => 'user.update.process', 'uses' => 'Controllers\Admin\UsersController@postEdit']);
		Route::get('{userId}/delete' , ['as' => 'user.delete.index'  , 'uses' => 'Controllers\Admin\UsersController@getDelete']);
		Route::get('{userId}/restore', ['as' => 'user.restore.index' , 'uses' => 'Controllers\Admin\UsersController@getRestore']);
	});

	# Group Management
	Route::group(['prefix' => 'groups'], function()
	{
		Route::get('/'                , ['as' => 'group.index'         , 'uses' => 'Controllers\Admin\GroupsController@getIndex']);
		Route::get('create'           , ['as' => 'group.create.index'  , 'uses' => 'Controllers\Admin\GroupsController@getCreate']);
		Route::post('create'          , ['as' => 'group.create.process', 'uses' => 'Controllers\Admin\GroupsController@postCreate']);
		Route::get('{groupId}/edit'   , ['as' => 'group.update.index'  , 'uses' => 'Controllers\Admin\GroupsController@getEdit']);
		Route::post('{groupId}/edit'  , ['as' => 'group.update.process', 'uses' => 'Controllers\Admin\GroupsController@postEdit']);
		Route::get('{groupId}/delete' , ['as' => 'group.delete.index'  , 'uses' => 'Controllers\Admin\GroupsController@getDelete']);
		Route::get('{groupId}/restore', ['as' => 'group.restore.index' , 'uses' => 'Controllers\Admin\GroupsController@getRestore']);
	});

	# Dashboard
	Route::get('/', ['as' => 'admin.index', 'uses' => 'Controllers\Admin\DashboardController@getIndex']);

});

/*
|--------------------------------------------------------------------------
| Authentication and Authorization Routes
|--------------------------------------------------------------------------
|
|
|
*/
Route::group(['prefix' => 'auth'], function()
{

	# Login
	Route::get('signin' , ['as' => 'auth.signin.index'  , 'uses' => 'AuthController@getSignin']);
	Route::post('signin', ['as' => 'auth.signin.process', 'uses' => 'AuthController@postSignin']);

	# Register
	Route::get('signup' , ['as' => 'auth.signup.index'  , 'uses' => 'AuthController@getSignup']);
	Route::post('signup', ['as' => 'auth.signup.process', 'uses' => 'AuthController@postSignup']);

	# Account Activation
	Route::get('activate'                 , ['as' => 'auth.activate.index', 'uses' => 'AuthController@getActivate']);
	Route::get('activate/{activationCode}', ['as' => 'auth.activate.bycode', 'uses' => 'AuthController@getActivateByCode']);
	Route::post('activate/check'          , ['as' => 'auth.activate.check', 'uses' => 'AuthController@postActivateCheck']);
	Route::post('post-activation'         , ['as' => 'auth.post-activation', 'uses' => 'AuthController@postPostActivation']);
	
	# Resend Account Activation Email
	Route::get('resend-activation' , ['as' => 'auth.resend-activation.index'  , 'uses' => 'AuthController@getResendActivation']);
	Route::post('resend-activation', ['as' => 'auth.resend-activation.process', 'uses' => 'AuthController@postResendActivation']);

	# Forgot Password
	Route::get('forgot-password' , ['as' => 'auth.forgot-password.index'  , 'uses' => 'AuthController@getForgotPassword']);
	Route::post('forgot-password', ['as' => 'auth.forgot-password.process', 'uses' => 'AuthController@postForgotPassword']);

	# Forgot Password Confirmation
	Route::get('forgot-password/{passwordResetCode}' , ['as' => 'auth.forgot-password-confirm.index'  , 'uses' => 'AuthController@getForgotPasswordConfirm']);
	Route::post('forgot-password/{passwordResetCode}', ['as' => 'auth.forgot-password-confirm.process', 'uses' => 'AuthController@postForgotPasswordConfirm']);

	# Logout
	Route::get('logout', ['as' => 'auth.logout', 'uses' => 'AuthController@getLogout']);

});

/*
|--------------------------------------------------------------------------
| Account Routes
|--------------------------------------------------------------------------
|
|
|
*/

Route::group(['prefix' => 'account'], function()
{

	# Account Dashboard
	Route::get('/', ['as' => 'account.index', 'uses' => 'Controllers\Account\DashboardController@getIndex']);

	# Profile
	Route::get('profile' , ['as' => 'account.profile.index'  , 'uses' => 'Controllers\Account\ProfileController@getIndex']);
	Route::post('profile', ['as' => 'account.profile.process', 'uses' => 'Controllers\Account\ProfileController@postIndex']);

	# Change Password
	Route::get('change-password' , ['as' => 'account.change-password.index'  , 'uses' => 'Controllers\Account\ChangePasswordController@getIndex']);
	Route::post('change-password', ['as' => 'account.change-password.process', 'uses' => 'Controllers\Account\ChangePasswordController@postIndex']);

	# Change Email
	Route::get('change-email' , ['as' => 'account.change-email.index'  , 'uses' => 'Controllers\Account\ChangeEmailController@getIndex']);
	Route::post('change-email', ['as' => 'account.change-email.process', 'uses' => 'Controllers\Account\ChangeEmailController@postIndex']);

	# Settings
	Route::get('settings', ['as' => 'account.settings.index' , 'uses' => 'Controllers\Account\SettingsController@getIndex']);

});


/** 
 *  ------------------------------------------
 *  Frontend Routes
 *  ------------------------------------------
 */
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('/tos', ['as' => 'tos', 'uses' => 'StaticController@tos']);
