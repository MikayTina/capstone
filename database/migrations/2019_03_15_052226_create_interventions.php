<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterventions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interventions', function (Blueprint $table) {
            $table->increments('id');
<<<<<<< HEAD
            $table->timestamps();
=======
            $table->int('parent');
            $table->string('interven_name');
            $table->string('descrpt');
            //$table->timestamps();
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
        Schema::dropIfExists('interventions');
    }
}
