<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendaftarBidangsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pendaftar-bidang', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('iduser');
			$table->integer('idbidang');
			$table->integer('idoprec');
			$table->integer('idwawancara');
			$table->integer('status');
			$table->text('komentar');
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
		Schema::drop('pendaftar-bidang');
	}

}
