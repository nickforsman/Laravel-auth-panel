<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create Database table
		Schema::create('users', function($table) {
			$table->increments('id');
			$table->string('email', 60);
			$table->string('username', 60);
			$table->string('password');
			$table->string('password_temp');
			$table->string('code');
			$table->integer('active');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Drop database table
		Schema::drop('users');
	}

}
