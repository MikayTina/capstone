<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEvent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
<<<<<<< HEAD
             $table->string('venue');
            $table->date('start');
            $table->date('end');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();

=======
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
>>>>>>> 600cab594feb8db6b13cf6bbc56dd8a801ec984c
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop("events");
    }
}
