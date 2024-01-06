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
        Schema::create('drivers_notifications', function (Blueprint $table) {
            $table->id('driver_notification_id');
            $table->unsignedBigInteger('driver_id');
            $table->unsignedBigInteger('notification_id');
            $table->foreign('driver_id')->references('driver_id')->on('drivers');
            $table->foreign('notification_id')->references('notification_id')->on('notifications');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers_notifications');
    }
};
