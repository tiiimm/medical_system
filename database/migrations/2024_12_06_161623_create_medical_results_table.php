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
            $table->foreignId('appointment_id')->constrained();
            $table->string('hematology_result')->nullable();
            $table->string('hematology_abnormality')->nullable();
            $table->text('hematology_remarks')->nullable();
            $table->string('urinalysis_result')->nullable();
            $table->string('urinalysis_abnormality')->nullable();
            $table->text('urinalysis_remarks')->nullable();
            $table->string('xray_result')->nullable();
            $table->string('xray_abnormality')->nullable();
            $table->text('xray_remarks')->nullable();
            $table->string('ishihara_result')->nullable();
            $table->string('ishihara_abnormality')->nullable();
            $table->text('ishihara_remarks')->nullable();
            $table->string('drugtest_result')->nullable();
            $table->string('drugtest_abnormality')->nullable();
            $table->text('drugtest_remarks')->nullable();
            $table->text('condition')->nullable();
            $table->text('additional_comments')->nullable();
            $table->string('result_file_path')->nullable();
            $table->string('school_year');
            $table->string('semester');
            $table->date('upload_date');
            $table->unsignedBigInteger('reviewed_by');
            $table->unsignedBigInteger('uploaded_by');
            $table->timestamps();


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
