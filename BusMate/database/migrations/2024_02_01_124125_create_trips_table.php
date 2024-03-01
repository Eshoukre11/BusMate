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
            $table->bigIncrements('trip_id');
            $table->integer('trip_number');
            $table->enum('trip_type', ['go', 'return', 'special']);
            $table->string('start_point');
            $table->string('end_point');
            $table->string('trip_day');
            $table->time('start_time');
            $table->string('stops');
            $table->unsignedBigInteger('semester_id');
            $table->foreign('semester_id')->references('semester_id')->on('semesters');

            $table->timestamps();
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
