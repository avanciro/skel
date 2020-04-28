<?php

namespace App\Database\Seeds;
use Illuminate\Database\Capsule\Manager as DB;

class Example {
	public function run() {

		// CLEAN
		DB::statement('TRUNCATE TABLE example');

		// SEED
		DB::table('example')->insert([
			'name'		=> "John",
			'email'		=> 'john@example.org',
			'password'	=> password_hash('password', PASSWORD_BCRYPT)
		]);

	}
}

?>