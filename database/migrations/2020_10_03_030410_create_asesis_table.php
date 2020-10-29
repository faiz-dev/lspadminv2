<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsesisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asesis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->uuid('uid');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('sekolah_id')->nullable();
            $table->unsignedInteger('no_urut');
            $table->year('tahun_daftar');
            $table->string('no_reg', 25)->nullable();
            $table->string('tipe',10);
            $table->boolean('isActive');
            $table->string('status',10);
            $table->string('jurusan')->nullable();
            $table->string('kelas')->nullable();
            
            // relation
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('sekolah_id')->references('id')->on('sekolahs');

            // index
            $table->index(['no_reg']);
            $table->index(['tipe','status']);

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
        Schema::dropIfExists('asesis');
    }
}
