<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUjiKompetensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uji_kompetensis', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid');
            
            $table->string('nama');
            $table->date('tgl_awal');
            $table->date('tgl_akhir');
            $table->integer('jml_asesi');
            $table->string('deskripsi');
            $table->boolean('isActive')->default(true);
            
            $table->unsignedBigInteger('skema_id');

            // related
            $table->foreign('skema_id')->references('id')->on('skemas');
            
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
        Schema::dropIfExists('uji_kompetensis');
    }
}
