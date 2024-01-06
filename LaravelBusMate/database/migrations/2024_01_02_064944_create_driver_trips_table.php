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
        Schema::create('driver_trips', function (Blueprint $table) {
            $table->id('trip_id');
            $table->unsignedBigInteger('driver_id');
            $table->string('destination');
            $table->dateTime('departure_date');
            $table->dateTime('return_date');
            $table->timestamps();

            $table->foreign('driver_id')->references('driver_id')->on('drivers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driver_trips');
    }
};
