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
        Schema::create('companies_notifications', function (Blueprint $table) {
            $table->id('company_notification_id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('notification_id');
            $table->foreign('company_id')->references('company_id')->on('companies');
            $table->foreign('notification_id')->references('notification_id')->on('notification');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies_notifications');
    }
};
