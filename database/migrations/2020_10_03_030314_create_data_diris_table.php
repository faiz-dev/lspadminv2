<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataDirisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_diris', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->string("nik",20)->unique();
            $table->string('nama',50);
            $table->string('gelar_depan',10)->nullable();
            $table->string('gelar_belakang',10)->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('tempat_lahir',20)->nullable();        
            $table->date('tanggal_lahir');
            $table->string('url_foto')->nullable();
            $table->string('no_telp',20);
            $table->string('pendidikan_terakhir',10);
            $table->string('kewarganegaraan',20)->nullable();
            
            // pekerjaan
            $table->string('pekerjaan_instansi',50)->nullable();
            $table->string('pekerjaan_jabatan', 30)->nullable();
            $table->string('pekerjaan_alamat', 250)->nullable();
            $table->string('pekerjaan_telp', 20)->nullable();
            $table->string('pekerjaan_kode_pos',10)->nullable();

            // domisili
            $table->string('domisili_alamat',250);
            $table->string('domisili_provinsi', 20);
            $table->string('domisili_kota',30);
            $table->string('domisili_kode_pos', 10);

            // ktp
            $table->string('ktp_alamat', 250);
            $table->string('ktp_provinsi', 20);
            $table->string('ktp_kota', 30);            
            $table->string('ktp_kode_pos', 10)->nullable();

            //# relation
            $table->foreign('user_id')->references('id')->on('users');

            //# index
            $table->index(['user_id']);            
            $table->index(['nama']);

            $table->softDeletes('deleted_at', 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_diris');
    }
}
