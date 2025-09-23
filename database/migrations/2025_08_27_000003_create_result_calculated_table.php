<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('result_calculated', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('theory_part_number_id');
            $table->unsignedBigInteger('lab_part_number_id');

            // Store all theory and lab part numbers as arrays (optional, for detailed breakdown)
            $table->json('theory_part_numbers')->nullable();
            $table->json('lab_part_numbers')->nullable();
            
            // Final Result (Auto-calculated)
            $table->decimal('final_marks', 5, 2)->default(0); // Combined theory + lab
            $table->string('letter_grade', 2)->nullable(); // A+, A, B+, B, C+, C, D, F
            $table->decimal('grade_point', 3, 2)->default(0); // GPA points (0-4.00)
            $table->enum('status', ['pass', 'fail'])->nullable();
            $table->boolean('is_auto_calculated')->default(true);
            $table->timestamps();

            $table->foreign('theory_part_number_id')->references('id')->on('theory_part_numbers')->onDelete('cascade');
            $table->foreign('lab_part_number_id')->references('id')->on('lab_part_numbers')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('result_calculated');
    }
};
