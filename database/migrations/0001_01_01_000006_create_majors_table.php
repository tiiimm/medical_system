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
        Schema::create('majors', function (Blueprint $table) {
            $table->engine = 'InnoDB';$table->id();
            $table->foreignId('program_id')->constrained();
            $table->string('name');
            $table->string('abbreviation')->nullable();
            $table->integer('duration_years')->default(4);
            $table->boolean('is_active')->default(1);
            $table->boolean('food_related')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('majors');
    }
};
