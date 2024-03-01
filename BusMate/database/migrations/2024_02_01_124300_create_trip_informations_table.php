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
        Schema::create('trip_informations', function (Blueprint $table) {
            $table->bigIncrements('tinformation_id');
            $table->unsignedBigInteger('trip_id');
            $table->foreign('trip_id')->references('trip_id')->on('trips');
            $table->unsignedBigInteger('bus_id');
            $table->foreign('bus_id')->references('bus_id')->on('buses');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trip_informations');
    }
};
