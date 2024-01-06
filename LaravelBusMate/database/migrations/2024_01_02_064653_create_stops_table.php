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
        Schema::create('stops', function (Blueprint $table) {
            $table->id('stop_id');
            $table->unsignedBigInteger('route_id');
            $table->string('name');
            $table->timestamp('arrival_time');
            $table->timestamp('departure_time');
            $table->timestamps();

            $table->foreign('route_id')->references('route_id')->on('routes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stops');
    }
};
