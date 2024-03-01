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
        Schema::create('subscription_requests', function (Blueprint $table) {
            $table->bigIncrements('srequest_id');
            $table->string('subscriber_type');
            $table->string('full_name');
            $table->string('college');
            $table->integer('college_number');
            $table->string('phone');
            $table->string('email');
            $table->string('password');
            $table->unsignedBigInteger('semester_id');
            $table->foreign('semester_id')->references('semester_id')->on('semesters');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_requests');
    }
};
