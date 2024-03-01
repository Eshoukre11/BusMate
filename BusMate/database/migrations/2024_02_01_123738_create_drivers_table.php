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
        Schema::create('drivers', function (Blueprint $table) {
            $table->bigIncrements('driver_id');
            $table->string('subscriber_type');
            $table->string('driver_name');
            $table->text('driver_address');
            $table->string('driver_number');
            $table->string('email');
            $table->string('password');
            $table->string('license_number');
            $table->date('date_of_employment');
            $table->unsignedBigInteger('bus_id');
            $table->foreign('bus_id')->references('bus_id')->on('buses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
