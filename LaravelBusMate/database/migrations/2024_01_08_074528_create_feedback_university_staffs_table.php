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
        Schema::create('feedback_university_staffs', function (Blueprint $table) {
            $table->id('feedback_id');
            $table->unsignedBigInteger('university_staff_id');
            $table->string('title');
            $table->string('type');
            $table->text('message');
            $table->timestamps();
            $table->foreign('university_staff_id')->references('university_staff_id')->on('university_staffs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback_university_staffs');
    }
};
