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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->date('date_of_birth');
            $table->string('gender');
            $table->string('phone_number')->nullable();
            $table->string('enrollment_status');
            $table->decimal('gpa', 3, 2)->nullable(); 
            $table->json('subjects_enrolled')->nullable(); 
            $table->json('grades_by_subject')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students_info');
        
    }
};
