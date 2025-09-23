<?php


namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function index() {
        $semesters = Semester::all();
        return view('semester.index', compact('semesters'));
    }

    public function create() {
        return view('semester.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'session' => 'required|string|max:255',
            'semester_no' => 'required|integer|min:1',
        ]);

        Semester::create($data);

        return redirect()->route('semesters.index')->with('success', 'Semester created successfully.');
    }

    public function show($id) {
        $semester = Semester::findOrFail($id);
        return view('semester.show', compact('semester'));
    }

    public function edit($id) {
        $semester = Semester::findOrFail($id);
        return view('semester.edit', compact('semester'));
    }

    public function update(Request $request, $id) {
        $data = $request->validate([
            'session' => 'required|string|max:255',
            'semester_no' => 'required|integer|min:1',
        ]);

        $semester = Semester::findOrFail($id);
        $semester->update($data);

        return redirect()->route('semesters.index')->with('success', 'Semester updated successfully.');
    }

    public function destroy($id) {
        $semester = Semester::findOrFail($id);
        $semester->delete();

        return redirect()->route('semesters.index')->with('success', 'Semester deleted successfully.');
    }
}