<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitSkemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_skemas', function (Blueprint $table) {            
            
            $table->unsignedBigInteger('unit_kompetensi_id');
            $table->unsignedBigInteger('skema_id');

            
            // relation
            $table->foreign('unit_kompetensi_id')->references('id')->on('unit_kompetensis')->onDelete('cascade');
            $table->foreign('skema_id')->references('id')->on('skemas')->onDelete('cascade');
            
            $table->primary(['skema_id', 'unit_kompetensi_id']);            
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
        Schema::dropIfExists('unit_skemas');
    }
}
