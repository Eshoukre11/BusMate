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
        Schema::create('driver_feedbacks', function (Blueprint $table) {
            $table->bigIncrements('dfeedback_id');
            $table->unsignedBigInteger('feedback_id');
            $table->foreign('feedback_id')->references('feedback_id')->on('feedback');
            $table->unsignedBigInteger('driver_id');
            $table->foreign('driver_id')->references('driver_id')->on('drivers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driver_feedbacks');
    }
};
