<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumIdtugasumumToIdoprecOnSlotTugasUmum extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('slot-tugas-umum', function(Blueprint $table) {
			$table->dropColumn('idtugasumum');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('slot-tugas-umum', function(Blueprint $table) {
			$table->integer('idtugasumum');
		});
	}

}
