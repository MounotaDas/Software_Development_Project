<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('theory_part_numbers', function (Blueprint $table) {
            $table->id();
            // Theory Part (Total: 100 marks)
            $table->decimal('theory_attendance', 5, 2)->default(0); // Teacher input
            $table->decimal('theory_ct', 5, 2)->default(0); // Class Test - Teacher input
            $table->decimal('theory_midterm', 5, 2)->default(0); // Teacher input
            $table->decimal('theory_assignment', 5, 2)->default(0); // Teacher input
            $table->decimal('theory_final', 5, 2)->default(0); // Teacher input
            $table->decimal('theory_total', 5, 2)->default(0); // Auto-calculated
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('theory_part_numbers');
    }
};
