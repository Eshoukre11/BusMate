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
        Schema::create('university_staff_trips', function (Blueprint $table) {
            $table->id('university_staff_trip_id');
            $table->unsignedBigInteger('university_staff_id');
            $table->unsignedBigInteger('trip_id');

            $table->timestamps();

            $table->foreign('university_staff_id')->references('university_staff_id')->on('university_staffs');
            $table->foreign('trip_id')->references('trip_id')->on('trips');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('university_staff_trips');
    }
};
