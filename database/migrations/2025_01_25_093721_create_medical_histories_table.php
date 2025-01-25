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
        Schema::create('medical_histories', function (Blueprint $table) {
            $table->engine = 'InnoDB';$table->id();
            $table->foreignId('medical_profile_id')->constrained();
            $table->string('condition_name');
            $table->enum('treatment', ['Ongoing', 'Resolved', 'In remission'])->nullable(); 
            $table->boolean('is_chronic')->default(false); 
            $table->date('last_checkup')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_histories');
    }
};
