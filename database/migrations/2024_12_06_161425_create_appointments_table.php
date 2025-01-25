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
        Schema::create('appointments', function (Blueprint $table) {
            $table->engine = 'InnoDB';$table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('appointment_number');
            $table->date('appointment_date');
            $table->string('appointment_schedule');
            $table->string('school_year');
            $table->string('semester');
            $table->string('status')->default('Pending');
            $table->string('remarks')->nullable();
            $table->string('purpose')->default('Enrollment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
