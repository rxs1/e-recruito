<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteTableTugas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::drop('tugas');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::create('tugas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idbidang');
			$table->integer('idoprec');
			$table->string('tipe',255);
			$table->text('deskripsi');
			$table->timestamps();
		});
	}

}
