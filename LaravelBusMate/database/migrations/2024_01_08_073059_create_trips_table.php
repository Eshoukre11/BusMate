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
        Schema::create('trips', function (Blueprint $table) {
            $table->id('trip_id');
            $table->integer('trip_number');
            $table->string('trip_name');
            $table->string('trip_destination');
            $table->string('trip_day');
            $table->timestamp('trip_time');
            $table->timestamps();
            $table->unsignedBigInteger('route_id');
            $table->foreign('route_id')->references('route_id')->on('routes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
