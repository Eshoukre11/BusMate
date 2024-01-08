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
            $table->id('semester_id');
            $table->string('semester_name');
            $table->string('semester_date');
            $table->string('company_name');
            $table->unsignedBigInteger('subscription_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('university_staff_id');
            $table->unsignedBigInteger('trip_id');
            $table->unsignedBigInteger('university_id');
            $table->timestamps();
            $table->foreign('subscription_id')->references('subscription_id')->on('subscription__requests');
            $table->foreign('student_id')->references('student_id')->on('students');
            $table->foreign('university_staff_id')->references('university_staff_id')->on('university_staffs');
            $table->foreign('trip_id')->references('trip_id')->on('trips');
            $table->foreign('university_id')->references('university_id')->on('universities');
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
