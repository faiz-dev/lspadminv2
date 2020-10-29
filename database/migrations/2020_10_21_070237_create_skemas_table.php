<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skemas', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid');

            $table->string('nama');
            $table->string('kode')->nullable();
            $table->string('level_kkni')->nullable();
            $table->string('judul_klaster')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();


            // recursive relation
            $table->foreign('parent_id')->references('id')->on('skemas');

            $table->timestamps();
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
        Schema::dropIfExists('skemas');
    }
}
