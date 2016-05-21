<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteColumnIdbidanagOnSlotTugasBidang extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('slot-tugas-bidang', function(Blueprint $table) {
			$table->dropColumn('idtugasbidnag');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('slot-tugas-bidang', function(Blueprint $table) {
			$table->integer('idtugasbidnag');
		});
	}

}
