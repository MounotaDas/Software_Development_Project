<?php


namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    // Display a listing of the enrollments
    public function index() {
        $enrollments = Enrollment::all();
        return view('enrollment.index', compact('enrollments'));
    }

    // Show the form for creating a new enrollment
    public function create() {
        return view('enrollment.create');
    }

    // Store a newly created enrollment in the database
    public function store(Request $request) {
        $data = $request->validate([
            'student_id' => 'required|integer|exists:users,id',
            'course_code' => 'required|string|max:255',
            'course_name' => 'required|string|max:255',
            'semester_no' => 'required|integer|min:1',
            'type' => 'required|string|in:Regular,Retake,Recourse',
        ]);

        Enrollment::create($data);

        return redirect()->route('enrollments.index')->with('success', 'Enrollment created successfully.');
    }

    // Display the specified enrollment
    public function show($id) {
        $enrollment = Enrollment::findOrFail($id);
        return view('enrollment.show', compact('enrollment'));
    }

    // Show the form for editing the specified enrollment
    public function edit($id) {
        $enrollment = Enrollment::findOrFail($id);
        return view('enrollment.edit', compact('enrollment'));
    }

    // Update the specified enrollment in the database
    public function update(Request $request, $id) {
        $data = $request->validate([
            'student_id' => 'required|integer|exists:users,id',
            'course_code' => 'required|string|max:255',
            'course_name' => 'required|string|max:255',
            'semester_no' => 'required|integer|min:1',
            'type' => 'required|string|in:Regular,Retake,Recourse',
        ]);

        $enrollment = Enrollment::findOrFail($id);
        $enrollment->update($data);

        return redirect()->route('enrollments.index')->with('success', 'Enrollment updated successfully.');
    }

    // Remove the specified enrollment from the database
    public function destroy($id) {
        $enrollment = Enrollment::findOrFail($id);
        $enrollment->delete();

        return redirect()->route('enrollments.index')->with('success', 'Enrollment deleted successfully.');
    }
    public function submit(Request $request)
    {
        
        $selected = $request->input('selected_courses', []);
        $types    = $request->input('type', []);

        $selectedCourses = [];

        foreach ($selected as $courseId) {
            $course = Enrollment::find($courseId);
            if ($course) {
                // Attach selected type (not saved in DB, just for display)
                $course->selected_type = $types[$courseId] ?? 'Regular';
                $selectedCourses[] = $course;
            }
        }

        return view('enrollment.result', compact('selectedCourses'));
    }

}
   

