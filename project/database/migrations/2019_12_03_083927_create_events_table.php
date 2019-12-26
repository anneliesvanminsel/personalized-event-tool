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
			$table->string('title');
			$table->text('description');
			$table->string('type');
			$table->string('bkgcolor')->nullable();
			$table->string('textcolor')->nullable();
			$table->string('logo');
			$table->date('starttime');
			$table->date('endtime')->nullable();
			$table->boolean('status')->default(0);
			$table->integer('address_id')->nullable();
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
