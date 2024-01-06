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
        Schema::create('university_notifications', function (Blueprint $table) {
            $table->id('university_notification_id');
            $table->unsignedBigInteger('university_id');
            $table->unsignedBigInteger('notification_id');
            $table->foreign('university_id')->references('university_id')->on('universities');
            $table->foreign('notification_id')->references('notification_id')->on('notifications');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('university_notifications');
    }
};
