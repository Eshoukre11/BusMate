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
        Schema::create('subscribers', function (Blueprint $table) {
            $table->bigIncrements('subscriber_id');
            $table->enum('subscriber_type', ['student', 'staff']);
            $table->string('full_name');
            $table->string('college');
            $table->integer('college_number');
            $table->string('phone');
            $table->string('email');
            $table->string('password');
            $table->enum('subscriber_state', ['active', 'inactive']);
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
        Schema::dropIfExists('subscribers');
    }
};
