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
        Schema::create('subscriber_feedbacks', function (Blueprint $table) {
            $table->bigIncrements('sfeedback_id');
            $table->unsignedBigInteger('feedback_id');
            $table->foreign('feedback_id')->references('feedback_id')->on('feedback');
            $table->unsignedBigInteger('subscriber_id');
            $table->foreign('subscriber_id')->references('subscriber_id')->on('subscribers');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriber_feedbacks');
    }
};
