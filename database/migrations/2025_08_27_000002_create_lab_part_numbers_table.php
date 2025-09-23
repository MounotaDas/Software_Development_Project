<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lab_part_numbers', function (Blueprint $table) {
            $table->id();
            // Lab Part (Total: 100 marks)
            $table->decimal('lab_attendance', 5, 2)->default(0); // Teacher input
            $table->decimal('lab_performance', 5, 2)->default(0); // Teacher input
            $table->decimal('lab_report', 5, 2)->default(0); // Teacher input
            $table->decimal('lab_viva', 5, 2)->default(0); // Teacher input
            $table->decimal('lab_project', 5, 2)->default(0); // Teacher input
            $table->decimal('lab_total', 5, 2)->default(0); // Auto-calculated
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lab_part_numbers');
    }
};
