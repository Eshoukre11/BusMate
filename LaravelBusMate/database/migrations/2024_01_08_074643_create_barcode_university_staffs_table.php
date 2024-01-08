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
        Schema::create('barcode_university_staffs', function (Blueprint $table) {
            $table->id('barcode_id');
            $table->string('barcode');
            $table->unsignedBigInteger('university_staff_id');
            $table->timestamps();

            $table->foreign('university_staff_id')->references('university_staff_id')->on('university_staffs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barcode_university_staffs');
    }
};
