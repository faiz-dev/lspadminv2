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
            $table->unsignedBigInteger('ujikom_id');            

            $table->date('tgl_pelaksanaan');
            $table->string('status');
            $table->string('url_surat_tugas')->nullable();
            $table->string('url_berita_acara')->nullable();
            $table->unsignedBigInteger('asesor_id');

            // relation
            $table->foreign('ujikom_id')->references('id')->on('uji_kompetensis');           
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
        Schema::dropIfExists('jadwal_uji_koms');
    }
}
