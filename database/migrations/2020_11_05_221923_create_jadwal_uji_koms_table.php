<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalUjiKomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_uji_koms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('ujikom_id');
            $table->unsignedBigInteger('asesor_id')->nullable();

            $table->date('tgl_pelaksanaan');
            $table->boolean('ishadir');

            // relation
            $table->foreign('user_id')->references("id")->on('users');
            $table->foreign('ujikom_id')->references('id')->on('uji_kompetensis');
            $table->foreign('asesor_id')->references('id')->on('asesors');

            $table->primary(['user_id', 'ujikom_id']);

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
        Schema::dropIfExists('jadwal_uji_koms');
    }
}
