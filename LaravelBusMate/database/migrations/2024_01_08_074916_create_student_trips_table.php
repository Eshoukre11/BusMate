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
        Schema::create('student_trips', function (Blueprint $table) {
            $table->id('student_trip_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('trip_id');
            $table->timestamps();

            $table->foreign('student_id')->references('student_id')->on('students');
            $table->foreign('trip_id')->references('trip_id')->on('trips');
       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_trips');
    }
};
