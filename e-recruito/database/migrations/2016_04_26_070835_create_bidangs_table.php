<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidangsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bidang', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idoprec');
			$table->string('name',225);
			$table->string('cp',225);
			$table->text('deskripsi');
			$table->date('deadline');
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
		Schema::drop('bidang');
	}

}
