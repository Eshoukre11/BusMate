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
        Schema::create('dashboard_users', function (Blueprint $table) {
            $table->bigIncrements('duser_id');
            $table->string('user_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone_number')->unique();
            $table->enum('role', ['admin', 'user_university', 'user_company']);
            $table->unsignedBigInteger('year_id');
            $table->foreign('year_id')->references('year_id')->on('years');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dashboard_users');
    }
};
