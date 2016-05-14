<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteTableSlotTugas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::drop('slot-tugas');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::create('slot-tugas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('iduser');
			$table->integer('idtugas');
			$table->text('tugas');
			$table->timestamps();
		});
	}

}
