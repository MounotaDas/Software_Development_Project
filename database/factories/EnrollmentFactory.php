<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enrollment>
 */
class EnrollmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $course = Course::inRandomOrder()->first();
        
        return [
            'student_id' => User::where('role', 'student')->inRandomOrder()->first()?->id ?? User::factory()->student(),
            'course_code' => $course?->course_code ?? 'CSE111',
            'course_name' => $course?->course_name ?? 'Programming Language I',
            'semester_no' => fake()->numberBetween(1, 8),
            'type' => fake()->randomElement(['regular', 'retake', 'recourse']),
        ];
    }

    /**
     * Create regular enrollment.
     */
    public function regular(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'regular',
        ]);
    }

    /**
     * Create retake enrollment.
     */
    public function retake(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'retake',
        ]);
    }

    /**
     * Create recourse enrollment.
     */
    public function recourse(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'recourse',
        ]);
    }

    /**
     * Create enrollment for specific semester.
     */
    public function forSemester(int $semesterNo): static
    {
        return $this->state(fn (array $attributes) => [
            'semester_no' => $semesterNo,
        ]);
    }

    /**
     * Create enrollment for specific student.
     */
    public function forStudent(int $studentId): static
    {
        return $this->state(fn (array $attributes) => [
            'student_id' => $studentId,
        ]);
    }

    /**
     * Create enrollment for specific course.
     */
    public function forCourse(string $courseCode): static
    {
        return $this->state(function (array $attributes) use ($courseCode) {
            $course = Course::where('course_code', $courseCode)->first();
            
            return [
                'course_code' => $courseCode,
                'course_name' => $course?->course_name ?? 'Unknown Course',
            ];
        });
    }

    /**
     * Create enrollment for student in specific semester with all courses.
     */
    public function forStudentInSemester(int $studentId, int $semesterNo): static
    {
        return $this->state(function (array $attributes) use ($studentId, $semesterNo) {
            $courses = Course::where('course_code', 'like', 'CSE%')->get();
            $semesterCourses = $courses->filter(function ($course) use ($semesterNo) {
                // Filter courses based on semester pattern in course code
                $courseNumber = (int) substr($course->course_code, 3, 1);
                return $courseNumber == $semesterNo || 
                       ($semesterNo <= 2 && in_array($courseNumber, [1, 2])) ||
                       ($semesterNo >= 3 && $semesterNo <= 4 && in_array($courseNumber, [2, 3])) ||
                       ($semesterNo >= 5 && $semesterNo <= 6 && in_array($courseNumber, [3, 4])) ||
                       ($semesterNo >= 7 && $semesterNo <= 8 && in_array($courseNumber, [4, 5]));
            });

            $course = $semesterCourses->random();

            return [
                'student_id' => $studentId,
                'course_code' => $course->course_code,
                'course_name' => $course->course_name,
                'semester_no' => $semesterNo,
            ];
        });
    }
}
