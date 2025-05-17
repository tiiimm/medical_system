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
        Schema::create('profiles', function (Blueprint $table) {
            $table->engine = 'InnoDB';$table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name')->default('');
            $table->string('extension_name')->default('');
            $table->string('contact_number');
            $table->string('civil_status');
            $table->string('address');
            $table->string('profile_photo_path', 2048)->nullable();
            $table->string('zppsu_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
