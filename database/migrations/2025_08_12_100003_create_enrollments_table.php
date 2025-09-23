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
            
            // Make sure length matches courses.course_code (e.g. 50)
            $table->string('course_code', 50);
            $table->string('course_name');
            $table->integer('semester_no');
            $table->enum('type', ['regular', 'retake', 'recourse'])->default('regular');
            $table->timestamps();

            // Foreign keys
            $table->foreign('student_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreign('course_code')
                  ->references('course_code')
                  ->on('courses')
                  ->onDelete('cascade');

            // Prevent duplicate enrollments
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
