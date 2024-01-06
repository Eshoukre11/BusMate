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
        Schema::create('student_notifications', function (Blueprint $table) {
            $table->id('student_notification_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('notification_id');
            $table->foreign('student_id')->references('student_id')->on('students');
            $table->foreign('notification_id')->references('notification_id')->on('notification');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_notifications');
    }
};
