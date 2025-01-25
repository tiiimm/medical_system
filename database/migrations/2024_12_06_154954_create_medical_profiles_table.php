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
        Schema::create('medical_profiles', function (Blueprint $table) {
            $table->engine = 'InnoDB';$table->id();
            $table->foreignId('profile_id')->constrained();
            $table->string('birthdate');
            $table->string('sex');
            $table->string('blood_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_profiles');
    }
};
