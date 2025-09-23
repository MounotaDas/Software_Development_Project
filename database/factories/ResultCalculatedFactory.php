<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ResultCalculated;
use App\Models\TheoryPartNumber;
use App\Models\LabPartNumber;

class ResultCalculatedFactory extends Factory
{
    protected $model = ResultCalculated::class;

    public function definition(): array
    {
    $theory = TheoryPartNumber::factory()->create();
    $lab = LabPartNumber::factory()->create();

    $finalMarks = $theory->theory_total + $lab->lab_total;
        // Simple grade calculation logic
        if ($finalMarks >= 80) {
            $letterGrade = 'A+';
            $gradePoint = 4.00;
            $status = 'pass';
        } elseif ($finalMarks >= 70) {
            $letterGrade = 'A';
            $gradePoint = 3.75;
            $status = 'pass';
        } elseif ($finalMarks >= 60) {
            $letterGrade = 'B+';
            $gradePoint = 3.50;
            $status = 'pass';
        } elseif ($finalMarks >= 50) {
            $letterGrade = 'B';
            $gradePoint = 3.00;
            $status = 'pass';
        } elseif ($finalMarks >= 40) {
            $letterGrade = 'C';
            $gradePoint = 2.00;
            $status = 'pass';
        } else {
            $letterGrade = 'F';
            $gradePoint = 0.00;
            $status = 'fail';
        }

        return [
            'theory_part_number_id' => $theory->id,
            'lab_part_number_id' => $lab->id,
            'theory_part_numbers' => json_encode([$theory]),
            'lab_part_numbers' => json_encode([$lab]),
            'final_marks' => $finalMarks,
            'letter_grade' => $letterGrade,
            'grade_point' => $gradePoint,
            'status' => $status,
            'is_auto_calculated' => true,
        ];
    }
}