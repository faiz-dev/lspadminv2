<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalUjiAsesorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_uji_asesors', function (Blueprint $table) {
            $table->unsignedBigInteger('jadwal_id');
            $table->unsignedBigInteger('asesor_id');

            $table->string('status');
            
            // relation
            $table->foreign('jadwal_id')->references('id')->on('jadwal_uji_koms');
            $table->foreign('asesor_id')->references('id')->on('asesors');

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
        Schema::dropIfExists('jadwal_uji_asesors');
    }
}
