<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * CSE courses by semester
     */
    private static array $cseCourses = [
        1 => [
            ['code' => 'CSE111', 'name' => 'Programming Language I', 'credits' => 3.0],
            ['code' => 'CSE112', 'name' => 'Programming Language I Lab', 'credits' => 1.5],
            ['code' => 'MAT110', 'name' => 'Mathematics I', 'credits' => 3.0],
            ['code' => 'PHY111', 'name' => 'Physics I', 'credits' => 3.0],
            ['code' => 'ENG101', 'name' => 'English I', 'credits' => 3.0],
        ],
        2 => [
            ['code' => 'CSE121', 'name' => 'Programming Language II', 'credits' => 3.0],
            ['code' => 'CSE122', 'name' => 'Programming Language II Lab', 'credits' => 1.5],
            ['code' => 'MAT120', 'name' => 'Mathematics II', 'credits' => 3.0],
            ['code' => 'PHY121', 'name' => 'Physics II', 'credits' => 3.0],
            ['code' => 'ENG102', 'name' => 'English II', 'credits' => 3.0],
        ],
        3 => [
            ['code' => 'CSE211', 'name' => 'Data Structures', 'credits' => 3.0],
            ['code' => 'CSE212', 'name' => 'Data Structures Lab', 'credits' => 1.5],
            ['code' => 'CSE213', 'name' => 'Digital Logic Design', 'credits' => 3.0],
            ['code' => 'MAT210', 'name' => 'Discrete Mathematics', 'credits' => 3.0],
            ['code' => 'STA201', 'name' => 'Statistics and Probability', 'credits' => 3.0],
        ],
        4 => [
            ['code' => 'CSE221', 'name' => 'Algorithms', 'credits' => 3.0],
            ['code' => 'CSE222', 'name' => 'Algorithms Lab', 'credits' => 1.5],
            ['code' => 'CSE223', 'name' => 'Computer Architecture', 'credits' => 3.0],
            ['code' => 'CSE224', 'name' => 'Object Oriented Programming', 'credits' => 3.0],
            ['code' => 'MAT220', 'name' => 'Linear Algebra', 'credits' => 3.0],
        ],
        5 => [
            ['code' => 'CSE311', 'name' => 'Database Management Systems', 'credits' => 3.0],
            ['code' => 'CSE312', 'name' => 'Database Management Systems Lab', 'credits' => 1.5],
            ['code' => 'CSE313', 'name' => 'Operating Systems', 'credits' => 3.0],
            ['code' => 'CSE314', 'name' => 'Software Engineering', 'credits' => 3.0],
            ['code' => 'CSE315', 'name' => 'Computer Networks', 'credits' => 3.0],
        ],
        6 => [
            ['code' => 'CSE321', 'name' => 'Web Programming', 'credits' => 3.0],
            ['code' => 'CSE322', 'name' => 'Web Programming Lab', 'credits' => 1.5],
            ['code' => 'CSE323', 'name' => 'Compiler Design', 'credits' => 3.0],
            ['code' => 'CSE324', 'name' => 'Artificial Intelligence', 'credits' => 3.0],
            ['code' => 'CSE325', 'name' => 'Computer Graphics', 'credits' => 3.0],
        ],
        7 => [
            ['code' => 'CSE411', 'name' => 'Machine Learning', 'credits' => 3.0],
            ['code' => 'CSE412', 'name' => 'Machine Learning Lab', 'credits' => 1.5],
            ['code' => 'CSE413', 'name' => 'Mobile Application Development', 'credits' => 3.0],
            ['code' => 'CSE414', 'name' => 'Cyber Security', 'credits' => 3.0],
            ['code' => 'CSE415', 'name' => 'Project I', 'credits' => 2.0],
        ],
        8 => [
            ['code' => 'CSE421', 'name' => 'Data Mining', 'credits' => 3.0],
            ['code' => 'CSE422', 'name' => 'Distributed Systems', 'credits' => 3.0],
            ['code' => 'CSE423', 'name' => 'Cloud Computing', 'credits' => 3.0],
            ['code' => 'CSE424', 'name' => 'Internet of Things', 'credits' => 3.0],
            ['code' => 'CSE425', 'name' => 'Project II', 'credits' => 3.0],
        ],
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Use faker to generate a unique course code for seeding
        return [
            'semester_no' => $this->faker->randomElement(['1st', '2nd', '3rd', '4th', '5th', '6th', '7th', '8th']),
            'course_code' => $this->faker->unique()->bothify('CSE###'),
            'course_name' => $this->faker->words(3, true),
            'credit_hours' => $this->faker->randomElement([1.5, 2, 3]),
        ];
    }

    /**
     * Create course for specific semester.
     */
    public function forSemester(int $semesterNo): static
    {
        return $this->state(function (array $attributes) use ($semesterNo) {
            $courses = self::$cseCourses[$semesterNo] ?? self::$cseCourses[1];
            $course = fake()->randomElement($courses);

            return [
                'semester_no' => match($semesterNo) {
                    1 => '1st',
                    2 => '2nd',
                    3 => '3rd',
                    4 => '4th',
                    5 => '5th',
                    6 => '6th',
                    7 => '7th',
                    8 => '8th',
                    default => '1st',
                },
                'course_code' => $course['code'],
                'course_name' => $course['name'],
                'credit_hours' => $course['credits'],
            ];
        });
    }

    /**
     * Create all courses for a specific semester.
     */
    public static function createAllForSemester(int $semesterNo): array
    {
        $courses = self::$cseCourses[$semesterNo] ?? [];
        $createdCourses = [];

        foreach ($courses as $course) {
            $createdCourses[] = [
                'semester_no' => match($semesterNo) {
                    1 => '1st',
                    2 => '2nd',
                    3 => '3rd',
                    4 => '4th',
                    5 => '5th',
                    6 => '6th',
                    7 => '7th',
                    8 => '8th',
                    default => '1st',
                },
                'course_code' => $course['code'],
                'course_name' => $course['name'],
                'credit_hours' => $course['credits'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        return $createdCourses;
    }

    /**
     * Get all CSE courses data.
     */
    public static function getAllCSECourses(): array
    {
        return self::$cseCourses;
    }
}
