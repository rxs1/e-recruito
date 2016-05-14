<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FromSlotTugasBidangsToSlotTugasBidang extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::rename('slot-tugas-bidangs', 'slot-tugas-bidang');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::rename('slot-tugas-bidang', 'slot-tugas-bidangs');
		

	}

}
