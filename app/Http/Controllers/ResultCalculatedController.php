<?php

namespace App\Http\Controllers;

use App\Models\ResultCalculated;
use App\Models\TheoryPartNumber;
use App\Models\LabPartNumber;
use Illuminate\Http\Request;

class ResultCalculatedController extends Controller
{
    public function index() {
        $results = ResultCalculated::all();
        return view('result.index', compact('results'));
    }

    public function create() {
        $theories = TheoryPartNumber::all();
        $labs = LabPartNumber::all();
        return view('result.create', compact('theories', 'labs'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'theory_part_number_id' => 'required|integer|exists:theory_part_numbers,id',
            'lab_part_number_id' => 'required|integer|exists:lab_part_numbers,id',
            'final_marks' => 'required|numeric|min:0|max:1000',
            'letter_grade' => 'required|string|max:2',
            'grade_point' => 'required|numeric|min:0|max:4',
            'status' => 'required|string|in:pass,fail',
            'is_auto_calculated' => 'required|boolean',
        ]);

        ResultCalculated::create($data);

        return redirect()->route('results.index')->with('success', 'Result calculated successfully.');
    }

    public function show($id) {
        $result = ResultCalculated::findOrFail($id);
        return view('result.show', compact('result'));
    }

    public function edit($id) {
        $result = ResultCalculated::findOrFail($id);
        $theories = TheoryPartNumber::all();
        $labs = LabPartNumber::all();
        return view('result.edit', compact('result', 'theories', 'labs'));
    }

    public function update(Request $request, $id) {
        $data = $request->validate([
            'theory_part_number_id' => 'required|integer|exists:theory_part_numbers,id',
            'lab_part_number_id' => 'required|integer|exists:lab_part_numbers,id',
            'final_marks' => 'required|numeric|min:0|max:1000',
            'letter_grade' => 'required|string|max:2',
            'grade_point' => 'required|numeric|min:0|max:4',
            'status' => 'required|string|in:pass,fail',
            'is_auto_calculated' => 'required|boolean',
        ]);

        $result = ResultCalculated::findOrFail($id);
        $result->update($data);

        return redirect()->route('results.index')->with('success', 'Result updated successfully.');
    }

    public function destroy($id) {
        $result = ResultCalculated::findOrFail($id);
        $result->delete();

        return redirect()->route('results.index')->with('success', 'Result deleted successfully.');
    }
}
