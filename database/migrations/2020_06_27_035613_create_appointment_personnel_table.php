<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentPersonnelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_personnel', function ( Blueprint $table )
        {
            $table -> id();

            $table -> unsignedBigInteger('appointment_id');
            $table -> unsignedBigInteger('personnel_id');

            $table -> timestamps();

            $table -> foreign('appointment_id') -> references('id') -> on('appointments') -> onDelete('cascade');
            $table -> foreign('personnel_id') -> references('id') -> on('personnels') -> onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointment_personnel');
    }
}
