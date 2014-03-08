<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExtendUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// change first_name, last_name column order
		DB::update('ALTER TABLE `users` MODIFY COLUMN `first_name` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL AFTER `email`');
		DB::update('ALTER TABLE `users` MODIFY COLUMN `last_name` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL AFTER `first_name`');

		// extend user table
		Schema::table('users', function($table)
		{
			$table->string('website')->nullable()->after('last_name');
			$table->string('country')->nullable()->after('website');
			$table->string('gravatar')->nullable()->after('country');
			$table->timestamp('deleted_at')->nullable()->after('reset_password_code');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function($table)
		{
			$table->dropColumn('deleted_at', 'website', 'country', 'gravatar');
		});

		// change first_name, last_name column order
		DB::update('ALTER TABLE `users` MODIFY COLUMN `first_name` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL AFTER `reset_password_code`');
		DB::update('ALTER TABLE `users` MODIFY COLUMN `last_name` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL AFTER `first_name`');
	}

}
