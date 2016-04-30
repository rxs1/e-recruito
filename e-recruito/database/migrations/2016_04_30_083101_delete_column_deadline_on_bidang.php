<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteColumnDeadlineOnBidang extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('bidang', function(Blueprint $table) {
			$table->dropColumn(array('deadline'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('bidang', function(Blueprint $table) {
			$table->date('deadline');
		});
	}

}
