<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlotTugasUmumsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create('slot-tugas-umum', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idtugasumum');
			$table->integer('idoprec');
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
		Schema::drop('slot-tugas-umum');
	}

}
