<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameLinkTugasOnSlotTugasBidang extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('slot-tugas-bidang', function(Blueprint $table) {
			$table->dropColumn('link-tugas');
		});

		Schema::table('slot-tugas-bidang', function(Blueprint $table) {
			$table->text('link_tugas');
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
			$table->dropColumn('link_tugas');
		});

		Schema::table('slot-tugas-bidang', function(Blueprint $table) {
			$table->text('link-tugas');
		});
	}

}
