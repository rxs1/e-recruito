<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMaxFieldPersonOnOprec extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('oprec', function (Blueprint $table) {
			$table->integer('max-field-person');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('oprec', function (Blueprint $table) {
			$table->dropColumn(array('max-field-person'));
		});
	}

}
