<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsesmensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asesmens', function (Blueprint $table) {            
            $table->unsignedBigInteger("user_id");            
            $table->unsignedBigInteger("jdwl_ujikom_id");
            $table->uuid('uid');

            $table->timestamps();
            $table->timestamp('start_time');
            $table->timestamp('end_time');

            // relation
            $table->foreign("user_id")->references('id')->on('users');
            $table->foreign("jdwl_ujikom_id")->references('id')->on('jadwal_uji_koms');

            $table->primary(['user_id','jdwl_ujikom_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asesmens');
    }
}
