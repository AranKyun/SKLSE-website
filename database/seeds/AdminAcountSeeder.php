<?php

use App\User;
use Illuminate\Database\Seeder;

class AdminAcountSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		if (User::where('tag', 'admin')->count() == 0) {
			$admin = User::create([
				'name' => 'admin',
				'email' => 'root@admin.com',
				'password' => bcrypt('root'),
				'tag' => 'admin',
			]);
			$this->command->info('Creating a default admin acount successful!');
		} else {
			$this->command->info('Admin acount is already existing in the user table!');
		}
	}
}
