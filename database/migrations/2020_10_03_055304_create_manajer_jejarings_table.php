<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManajerJejaringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manajer_jejarings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->uuid("uid")->unique();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('sekolah_id');

            // relation
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('sekolah_id')->references('id')->on('sekolahs');

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
        Schema::dropIfExists('manajer_jejarings');
    }
}
