<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnFileproveinstasiToFileproveinstansiOnInstansi extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('instansi', function($table)
		{
			$table->renameColumn('fileproveinstasi', 'fileproveinstansi');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('instansi', function($table)
		{
			$table->renameColumn('fileproveinstansi', 'fileproveinstasi');
		});
	}

}
