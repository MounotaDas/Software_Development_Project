<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\TheoryPartNumber;

class TheoryPartNumberFactory extends Factory
{
    protected $model = TheoryPartNumber::class;

    public function definition(): array
    {
        $theoryAttendance = fake()->numberBetween(6, 10); // out of 10
        $theoryCt = fake()->numberBetween(12, 20); // out of 20
        $theoryMidterm = fake()->numberBetween(10, 20); // out of 20
        $theoryAssignment = fake()->numberBetween(6, 10); // out of 10
        $theoryFinal = fake()->numberBetween(20, 40); // out of 40
        $theoryTotal = $theoryAttendance + $theoryCt + $theoryMidterm + $theoryAssignment + $theoryFinal;
        return [
            'theory_attendance' => $theoryAttendance,
            'theory_ct' => $theoryCt,
            'theory_midterm' => $theoryMidterm,
            'theory_assignment' => $theoryAssignment,
            'theory_final' => $theoryFinal,
            'theory_total' => $theoryTotal,
        ];
    }
}
