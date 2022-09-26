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
            $table->uuid('scooter_uuid')->nullable(false);
            $table->uuid('client_uuid')->nullable(false);
            $table->point('start_location');
            $table->point('current_location')->nullable();
            $table->point('end_location')->nullable();
            $table->integer('status')->default(0);
            $table->foreign('scooter_uuid')->references('uuid')->on('scooters')->onDelete('cascade');
            $table->foreign('client_uuid')->references('uuid')->on('clients')->onDelete('cascade');
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
