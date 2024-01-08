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
        Schema::create('subscription__requests', function (Blueprint $table) {
            $table->id('subscription_id');
            $table->string('name');
            $table->string('college');
            $table->string('college_number');
            $table->string('email');
            $table->string('password');
            $table->string('phone_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription__requests');
    }
};
