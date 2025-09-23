<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Semester>
 */
class SemesterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $seasons = ['Fall', 'Spring'];
        $years = ['2024', '2025', '2026'];
        
        return [
            'session' => fake()->randomElement($seasons) . ' ' . fake()->randomElement($years),
            'semester_no' => fake()->numberBetween(1, 8),
        ];
    }

    /**
     * Create Fall semester.
     */
    public function fall(string $year = '2024'): static
    {
        return $this->state(fn (array $attributes) => [
            'session' => "Fall {$year}",
        ]);
    }

    /**
     * Create Spring semester.
     */
    public function spring(string $year = '2025'): static
    {
        return $this->state(fn (array $attributes) => [
            'session' => "Spring {$year}",
        ]);
    }

    /**
     * Create specific semester number.
     */
    public function semester(int $semesterNo): static
    {
        return $this->state(fn (array $attributes) => [
            'semester_no' => $semesterNo,
        ]);
    }
}
