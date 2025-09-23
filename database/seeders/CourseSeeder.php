<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            // 1st Semester
            ['semester_no'=>'1st','course_code' => 'CSE 1111', 'course_name' => 'Computer Fundamentals and Ethics', 'credit_hours' => 1.50],
            ['semester_no'=>'1st','course_code' => 'CSE 1113', 'course_name' => 'Programming Fundamentals', 'credit_hours' => 3.00],
            ['semester_no'=>'1st','course_code' => 'CSE 1114', 'course_name' => 'Programming Fundamentals Laboratory', 'credit_hours' => 1.50],
            ['semester_no'=>'1st','course_code' => 'EEE 1101', 'course_name' => 'Introduction to Electrical Engineering', 'credit_hours' => 3.00],
            ['semester_no'=>'1st','course_code' => 'EEE 1102', 'course_name' => 'Introduction to Electrical Engineering Laboratory', 'credit_hours' => 1.50],
            ['semester_no'=>'1st','course_code' => 'ENG 1106', 'course_name' => 'General English', 'credit_hours' => 3.00],
            ['semester_no'=>'1st','course_code' => 'MAT 1203', 'course_name' => 'Differential and Integral Calculus', 'credit_hours' => 3.00],
            ['semester_no'=>'1st','course_code' => 'ME 1104', 'course_name' => 'Mechanical Engineering Drawing', 'credit_hours' => 0.75],
            ['semester_no'=>'1st','course_code' => 'PHY 1103', 'course_name' => 'Introduction to Classical & Modern Physics', 'credit_hours' => 3.00],

            // 2nd Semester
            ['semester_no'=>'2nd','course_code' => 'BAN 1112', 'course_name' => 'Functional Bengali Language', 'credit_hours' => 2.00],
            ['semester_no'=>'2nd','course_code' => 'CSE 1110', 'course_name' => 'Competitive Programming Laboratory', 'credit_hours' => 0.75],
            ['semester_no'=>'2nd','course_code' => 'CSE 1411', 'course_name' => 'Discrete Mathematics and Number Theory', 'credit_hours' => 3.00],
            ['semester_no'=>'2nd','course_code' => 'CSE 1413', 'course_name' => 'Data Structures', 'credit_hours' => 3.00],
            ['semester_no'=>'2nd','course_code' => 'CSE 1414', 'course_name' => 'Data Structures Laboratory', 'credit_hours' => 1.50],
            ['semester_no'=>'2nd','course_code' => 'ECO 1108', 'course_name' => 'Engineering Economics', 'credit_hours' => 3.00],
            ['semester_no'=>'2nd','course_code' => 'EEE 1201', 'course_name' => 'Electronics Devices and Circuits', 'credit_hours' => 3.00],
            ['semester_no'=>'2nd','course_code' => 'EEE 1202', 'course_name' => 'Electronics Device and Circuits Laboratory', 'credit_hours' => 1.50],
            ['semester_no'=>'2nd','course_code' => 'PHY 1109', 'course_name' => 'Physics Laboratory', 'credit_hours' => 0.75],

            // 3rd Semester
            ['semester_no'=>'3rd','course_code' => 'CSE 1115', 'course_name' => 'Object Oriented Programming', 'credit_hours' => 3.00],
            ['semester_no'=>'3rd','course_code' => 'CSE 1116', 'course_name' => 'Object Oriented Programming Laboratory', 'credit_hours' => 3.00],
            ['semester_no'=>'3rd','course_code' => 'CSE 3210', 'course_name' => 'Internet Programming', 'credit_hours' => 1.50],
            ['semester_no'=>'3rd','course_code' => 'EEE 2201', 'course_name' => 'Digital Electronics and Pulse Technique', 'credit_hours' => 3.00],
            ['semester_no'=>'3rd','course_code' => 'EEE 2202', 'course_name' => 'Digital Electronics and Pulse Technique Laboratory', 'credit_hours' => 1.50],
            ['semester_no'=>'3rd','course_code' => 'ENG 1107', 'course_name' => 'Communicative English', 'credit_hours' => 1.50],
            ['semester_no'=>'3rd','course_code' => 'MAT 1205', 'course_name' => 'Coordinate Geometry & Vector Analysis', 'credit_hours' => 3.00],
            ['semester_no'=>'3rd','course_code' => 'MAT 2304', 'course_name' => 'Numerical Methods', 'credit_hours' => 1.50],
            ['semester_no'=>'3rd','course_code' => 'SSC 1105', 'course_name' => 'Bangladesh Studies', 'credit_hours' => 2.00],

            // 4th Semester
            ['semester_no'=>'4th','course_code' => 'BIO 2101', 'course_name' => 'Biology for Engineers', 'credit_hours' => 3.00],
            ['semester_no'=>'4th','course_code' => 'CSE 1117', 'course_name' => 'Database Management Systems', 'credit_hours' => 3.00],
            ['semester_no'=>'4th','course_code' => 'CSE 2222', 'course_name' => 'Database Management Systems Laboratory', 'credit_hours' => 1.50],
            ['semester_no'=>'4th','course_code' => 'CSE 2415', 'course_name' => 'Algorithms', 'credit_hours' => 3.00],
            ['semester_no'=>'4th','course_code' => 'CSE 2416', 'course_name' => 'Algorithms Laboratory', 'credit_hours' => 1.50],
            ['semester_no'=>'4th','course_code' => 'CSE 3815', 'course_name' => 'Microprocessors & Microcontrollers', 'credit_hours' => 3.00],
            ['semester_no'=>'4th','course_code' => 'MAT 1206', 'course_name' => 'Coordinate Geometry & Vector Analysis', 'credit_hours' => 3.00],
            ['semester_no'=>'4th','course_code' => 'CSE 3816', 'course_name' => 'Microcontrollers Laboratory', 'credit_hours' => 1.50],
            ['semester_no'=>'4th','course_code' => 'MAT 2207', 'course_name' => 'Matrix, Linear Algebra, Differential Equation', 'credit_hours' => 3.00],

            // 5th Semester
            ['semester_no'=>'5th','course_code' => 'CSE 2210', 'course_name' => 'Mobile Application Development', 'credit_hours' => 1.50],
            ['semester_no'=>'5th','course_code' => 'CSE 3211', 'course_name' => 'Information System Design', 'credit_hours' => 3.00],
            ['semester_no'=>'5th','course_code' => 'CSE 3317', 'course_name' => 'Artificial Intelligence', 'credit_hours' => 3.00],
            ['semester_no'=>'5th','course_code' => 'CSE 3318', 'course_name' => 'Artificial Intelligence Laboratory', 'credit_hours' => 1.50],
            ['semester_no'=>'5th','course_code' => 'CSE 3733', 'course_name' => 'Operating Systems', 'credit_hours' => 3.00],
            ['semester_no'=>'5th','course_code' => 'CSE 3734', 'course_name' => 'Operating Systems Laboratory', 'credit_hours' => 0.75],
            ['semester_no'=>'5th','course_code' => 'CSE 3737', 'course_name' => 'Computer Organization & Architecture', 'credit_hours' => 3.00],
            ['semester_no'=>'5th','course_code' => 'STA 2107', 'course_name' => 'Statistics and Probability', 'credit_hours' => 1.50],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}