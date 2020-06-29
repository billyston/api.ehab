<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientHospitalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_hospital', function ( Blueprint $table )
        {
            $table -> id();

            $table -> unsignedBigInteger('hospital_id');
            $table -> unsignedBigInteger('client_id');

            $table -> timestamps();

            $table -> foreign('hospital_id') -> references('id') -> on('hospitals') -> onDelete('cascade');
            $table -> foreign('client_id') -> references('id') -> on('clients') -> onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_hospital' );
    }
}
