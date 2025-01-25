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
        Schema::create('appointment_logs', function (Blueprint $table) {
            $table->engine = 'InnoDB';$table->id();
            $table->foreignId('appointment_id')->constrained();
            $table->string('status');
            $table->unsignedBigInteger('updated_by');
            $table->timestamps();


            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment_logs');
    }
};
