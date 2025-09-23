<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\LabPartNumber;

class LabPartNumberFactory extends Factory
{
    protected $model = LabPartNumber::class;

    public function definition(): array
    {
        $labAttendance = fake()->numberBetween(6, 10); // out of 10
        $labPerformance = fake()->numberBetween(12, 20); // out of 20
        $labReport = fake()->numberBetween(12, 20); // out of 20
        $labViva = fake()->numberBetween(6, 10); // out of 10
        $labProject = fake()->numberBetween(20, 40); // out of 40
        $labTotal = $labAttendance + $labPerformance + $labReport + $labViva + $labProject;
        return [
            'lab_attendance' => $labAttendance,
            'lab_performance' => $labPerformance,
            'lab_report' => $labReport,
            'lab_viva' => $labViva,
            'lab_project' => $labProject,
            'lab_total' => $labTotal,
        ];
    }
}
