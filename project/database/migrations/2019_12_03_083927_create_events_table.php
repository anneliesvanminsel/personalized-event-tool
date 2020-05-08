<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
			$table->string('image');
			$table->string('title');
			$table->text('description');
			$table->string('category');

			$table->dateTime('starttime');
			$table->dateTime('endtime')->nullable();

			$table->boolean('published')->default(0);

			$table->integer('address_id')->nullable();

			$table->string('prim-color')->nullable();
			$table->string('sec-color')->nullable();
			$table->string('tert-color')->nullable();

			$table->string('theme')->nullable();
			$table->string('shape')->nullable();
			$table->string('schedule')->nullable();

			$table->string('username')->nullable();

			$table->softDeletes();
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
        Schema::dropIfExists('events');
    }
}
