<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('buses_trips', function (Blueprint $table) {
            $table->id('buses_trip_id');
            $table->unsignedBigInteger('bus_id');
            $table->unsignedBigInteger('trip_id');
            $table->timestamps();

            $table->foreign('bus_id')->references('bus_id')->on('buses');
            $table->foreign('trip_id')->references('trip_id')->on('trips');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buses_trips');
    }
};
