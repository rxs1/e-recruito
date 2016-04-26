<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstansisTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('instansi', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('iduser');
			$table->string('email', 225);
			$table->text('foto');
			$table->text('deskripsi');
			$table->text('fileproveinstasi');
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
		Schema::drop('instansi');
	}

}
