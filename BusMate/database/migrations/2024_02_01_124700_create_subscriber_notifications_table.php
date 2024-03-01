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
        Schema::create('subscriber_notifications', function (Blueprint $table) {
            $table->id('snotification_id');
            $table->unsignedBigInteger('notification_id');
            $table->foreign('notification_id')->references('notification_id')->on('notifications');
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
        Schema::dropIfExists('subscriber_notifications');
    }
};
