<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaranUjisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran_ujis', function (Blueprint $table) {            
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("uji_kompetensi_id");
            $table->unsignedBigInteger("jdwl_ujikom_id")->nullable();
            
            $table->json("dump_profile");
            $table->json("dump_skema");
            $table->string("tujuan_sertifikasi");
            $table->string("catatan")->nullable();
            $table->enum("status",['review','revisi','ditolak','disetujui'])->default('review');
            $table->boolean("disetujui");
            $table->date("tanggal_disetujui")->nullable();
            
            $table->foreign('user_id')->references("id")->on('users');
            $table->foreign('uji_kompetensi_id')->references("id")->on('uji_kompetensis');
            $table->foreign('jdwl_ujikom_id')->references("id")->on('jadwal_uji_koms');
            
            $table->primary(['user_id', 'uji_kompetensi_id']);
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
        Schema::dropIfExists('pendaftaran_ujis');
    }
}
