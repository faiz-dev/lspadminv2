<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tuks', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid');
            $table->unsignedBigInteger('sekolah_id')->nullable();

            $table->string('nama');
            $table->string('jenis');
            
            $table->string('telp');
            $table->string('alamat');
            $table->string('provinsi', 20);
            $table->string('kota', 30);            
            $table->string('kode_pos', 10)->nullable();


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
        Schema::dropIfExists('tuks');
    }
}
