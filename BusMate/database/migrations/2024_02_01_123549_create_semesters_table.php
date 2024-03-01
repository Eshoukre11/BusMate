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
        Schema::create('semesters', function (Blueprint $table) {
            $table->bigIncrements('semester_id');
            $table->string('semester_name');
            $table->string('semester_code')->unique();
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedBigInteger('year_id');
            $table->foreign('year_id')->references('year_id')->on('years');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semesters');
    }
};
