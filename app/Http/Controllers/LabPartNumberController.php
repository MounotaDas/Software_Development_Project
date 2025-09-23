<?php


namespace App\Http\Controllers;

use App\Models\LabPartNumber;
use Illuminate\Http\Request;

class LabPartNumberController extends Controller
{
    // Display a listing of the lab part numbers
    public function index() {
        $labs = LabPartNumber::all();
        return view('lab.index', compact('labs'));
    }

    // Show the form for creating a new lab part number
    public function create() {
        return view('lab.create');
    }

    // Store a newly created lab part number in the database
    public function store(Request $request) {
        $data = $request->validate([
            'lab_attendance' => 'required|numeric|min:0|max:100',
            'lab_performance' => 'required|numeric|min:0|max:100',
            'lab_report' => 'required|numeric|min:0|max:100',
            'lab_viva' => 'required|numeric|min:0|max:100',
            'lab_project' => 'required|numeric|min:0|max:100',
            'lab_total' => 'required|numeric|min:0|max:500',
        ]);

        LabPartNumber::create($data);

        return redirect()->route('lab.index')->with('success', 'Lab part number created successfully.');
    }

    // Display the specified lab part number
    public function show($id) {
        $lab = LabPartNumber::findOrFail($id);
        return view('lab.show', compact('lab'));
    }

    // Show the form for editing the specified lab part number
    public function edit($id) {
        $lab = LabPartNumber::findOrFail($id);
        return view('lab.edit', compact('lab'));
    }

    // Update the specified lab part number in the database
    public function update(Request $request, $id) {
        $data = $request->validate([
            'lab_attendance' => 'required|numeric|min:0|max:100',
            'lab_performance' => 'required|numeric|min:0|max:100',
            'lab_report' => 'required|numeric|min:0|max:100',
            'lab_viva' => 'required|numeric|min:0|max:100',
            'lab_project' => 'required|numeric|min:0|max:100',
            'lab_total' => 'required|numeric|min:0|max:500',
        ]);

        $lab = LabPartNumber::findOrFail($id);
        $lab->update($data);

        return redirect()->route('lab.index')->with('success', 'Lab part number updated successfully.');
    }

    // Remove the specified lab part number from the database
    public function destroy($id) {
        $lab = LabPartNumber::findOrFail($id);
        $lab->delete();

        return redirect()->route('lab.index')->with('success', 'Lab part number deleted successfully.');
    }
}