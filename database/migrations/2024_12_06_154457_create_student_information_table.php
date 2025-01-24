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
        Schema::create('student_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('campus_id');
            $table->foreignId('program_id');
            $table->string('major')->nullable()->default('NA');
            $table->enum('year_level',['1st year', '2nd year', '3rd year', '4th year']);
            $table->enum('status', ['Regular', 'Irregular']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_information');
    }
};
