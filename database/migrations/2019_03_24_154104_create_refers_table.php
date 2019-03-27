<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refers', function (Blueprint $table) {
            $table->increments('id');
            $table->date('ref_date');
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->string('ref_at');
            $table->string('ref_reason');
            $table->string('ref_by');
            $table->string('contact_person');
            $table->string('recommen')->nullable();
            $table->date('ref_back_date');
            $table->string('ref_back_by');
            $table->string('accepted_by');
            $table->string('ref_slip_return');
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
        Schema::dropIfExists('refers');
    }
}
