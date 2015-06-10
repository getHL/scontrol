<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class Sources extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('sources', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('database');
			$table->string('table');
			$table->integer('stageId');
			$table->integer('sourceId');
			$table->dateTime('savetime');
			$table->integer('vol1');
			$table->integer('volz1');
			$table->integer('cur1');
			$table->integer('vol2');
			$table->integer('volz2');
			$table->integer('cur2');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::drop('sources');
    }
}
