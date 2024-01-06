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
        Schema::create('feedback_university_staffs', function (Blueprint $table) {
            $table->id('feedback_id');
            $table->unsignedBigInteger('university_id');
            $table->unsignedBigInteger('staff_id');
            $table->text('message');
            $table->timestamps();

            $table->foreign('university_id')->references('university_id')->on('universities');
            $table->foreign('staff_id')->references('staff_id')->on('university_staff');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback_university_staffs');
    }
};
