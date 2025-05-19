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
        Schema::create('medical_results', function (Blueprint $table) {
            $table->engine = 'InnoDB';$table->id();
            $table->foreignId('user_id')->constrained();
            $table->unsignedBigInteger('appointment_id')->nullable();
            $table->json('test_results')->nullable();
            $table->text('condition')->nullable();
            $table->text('additional_comments')->nullable();
            $table->string('result_file_path')->nullable();
            $table->string('school_year');
            $table->string('semester');
            $table->date('upload_date');
            $table->unsignedBigInteger('reviewed_by')->nullable();
            $table->unsignedBigInteger('uploaded_by');
            $table->timestamps();


            $table->foreign('appointment_id')->references('id')->on('appointments')->onDelete('cascade');
            $table->foreign('reviewed_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('uploaded_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_results');
    }
};
