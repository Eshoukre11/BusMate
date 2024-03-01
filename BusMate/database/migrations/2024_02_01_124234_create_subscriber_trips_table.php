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
        Schema::create('subscriber_trips', function (Blueprint $table) {
            $table->bigIncrements('subscriber_trip_id');
            $table->unsignedBigInteger('trip_id');
            $table->foreign('trip_id')->references('trip_id')->on('trips');
            $table->unsignedBigInteger('subscriber_id');
            $table->foreign('subscriber_id')->references('subscriber_id')->on('subscribers');
            $table->binary('QrCode', 1773);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriber_trips');
    }
};
