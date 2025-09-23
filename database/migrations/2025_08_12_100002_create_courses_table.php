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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
             $table->string('semester_no');
            $table->string('course_code')->unique(); // e.g., "CSE101", "MAT201"
            $table->string('course_name');
            $table->decimal('credit_hours', 3, 1); // e.g., 3.0, 1.5
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
