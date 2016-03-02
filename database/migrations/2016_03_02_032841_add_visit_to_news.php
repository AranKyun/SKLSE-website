<?php

use Illuminate\Database\Migrations\Migration;

class AddVisitToNews extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('news', function ($table) {
			$table->integer('visit')->default(0);
		});

		Schema::table('users', function ($table) {
			$table->dropColumn('visit');
		});
	}
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		//
	}
}
