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
            $table->id('trip_id');
            $table->unsignedBigInteger('bus_id');
            $table->string('destination');
            $table->dateTime('departure_date');
            $table->dateTime('arrival_date');
            $table->timestamps();

            $table->foreign('bus_id')->references('bus_id')->on('buses');
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
