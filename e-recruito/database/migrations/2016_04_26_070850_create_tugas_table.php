<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTugasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
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

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tugas');
	}

}
