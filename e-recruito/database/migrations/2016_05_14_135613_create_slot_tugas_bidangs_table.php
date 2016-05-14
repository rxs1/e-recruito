<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlotTugasBidangsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('slot-tugas-bidangs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idtugasbidnag');
			$table->integer('idoprec');
			$table->integer('idbidang');
			$table->text('link-tugas');
			
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
		Schema::drop('slot-tugas-bidang');
	}

}
