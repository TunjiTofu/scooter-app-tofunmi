<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->index();
            $table->foreignId('scooter_id')->nullable(false);
            $table->foreignId('client_id')->nullable(false);
            $table->point('start_location');
            $table->point('current_location')->nullable();
            $table->point('end_location')->nullable();
            $table->integer('status')->default(0);
            // $table->polygon('area');
            $table->foreign('scooter_id')->references('id')->on('scooters')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
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
        Schema::dropIfExists('trips');
    }
};
