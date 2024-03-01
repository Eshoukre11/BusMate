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
        Schema::create('change_trip_requests', function (Blueprint $table) {
            $table->bigIncrements('chtrequest_id');
            $table->unsignedBigInteger('subscriber_id');
            $table->foreign('subscriber_id')->references('subscriber_id')->on('subscribers');
            $table->integer('old_trip_number');
            $table->integer('new_trip_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('change_trip_requests');
    }
};
