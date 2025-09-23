<?php


namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Display a listing of the courses
    public function index() {
        $courses = Course::all();
        return view('course.index', compact('courses'));
    }

    // Show the form for creating a new course
    public function create() {
        return view('course.create');
    }

    // Store a newly created course in the database
    public function store(Request $request) {
        $data = $request->validate([
            'semester_no' => 'required|string|min:1',
            'course_code' => 'required|unique:courses|max:255',
            'course_name' => 'required|max:255',
            'credit_hours' => 'required|numeric|min:0',
        ]);

        Course::create($data);

        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    // Display the specified course
    public function show($id) {
        $course = Course::findOrFail($id);
        return view('course.show', compact('course'));
    }

    // Show the form for editing the specified course
    public function edit($id) {
        $course = Course::findOrFail($id);
        return view('course.edit', compact('course'));
    }

    // Update the specified course in the database
    public function update(Request $request, $id) {
        $data = $request->validate([
            'semester_no' => 'required|string|min:1',
            'course_code' => 'required|max:255|unique:courses,course_code,' . $id,
            'course_name' => 'required|max:255',
            'credit_hours' => 'required|numeric|min:0',
        ]);

        $course = Course::findOrFail($id);
        $course->update($data);

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    // Remove the specified course from the database
    public function destroy($id) {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}