<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_registers', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid');
            $table->string('location', 300);
            $table->string('judul', 100);
            $table->string('mime', 50);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->string('note', 150);
            $table->integer('size');
            $table->string('sifat', 50)->nullable();
            $table->json('tag')->nullable();
            $table->string('model_relation', 100)->nullable();
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_registers');
    }
}
