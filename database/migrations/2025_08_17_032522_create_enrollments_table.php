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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->string('course_code');
            $table->string('course_name');
            $table->integer('semester_no');
            $table->enum('type', ['regular', 'retake', 'recourse'])->default('regular');
            $table->timestamps();

             $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('course_code')->references('course_code')->on('courses')->onDelete('cascade');
            
            // Prevent duplicate enrollments for same student, course, semester, and type
            $table->unique(['student_id', 'course_code', 'semester_no', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};