<?php


namespace App\Http\Controllers;

use App\Models\TheoryPartNumber;
use Illuminate\Http\Request;

class TheoryPartNumberController extends Controller
{
    public function index() {
        $theories = TheoryPartNumber::all();
        return view('theory.index', compact('theories'));
    }

    public function create() {
        return view('theory.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'theory_attendance' => 'required|numeric|min:0|max:100',
            'theory_ct' => 'required|numeric|min:0|max:100',
            'theory_midterm' => 'required|numeric|min:0|max:100',
            'theory_assignment' => 'required|numeric|min:0|max:100',
            'theory_final' => 'required|numeric|min:0|max:100',
            'theory_total' => 'required|numeric|min:0|max:500',
        ]);

        TheoryPartNumber::create($data);

        return redirect()->route('theory.index')->with('success', 'Theory part number created successfully.');
    }

    public function show($id) {
        $theory = TheoryPartNumber::findOrFail($id);
        return view('theory.show', compact('theory'));
    }

    public function edit($id) {
        $theory = TheoryPartNumber::findOrFail($id);
        return view('theory.edit', compact('theory'));
    }

    public function update(Request $request, $id) {
        $data = $request->validate([
            'theory_attendance' => 'required|numeric|min:0|max:100',
            'theory_ct' => 'required|numeric|min:0|max:100',
            'theory_midterm' => 'required|numeric|min:0|max:100',
            'theory_assignment' => 'required|numeric|min:0|max:100',
            'theory_final' => 'required|numeric|min:0|max:100',
            'theory_total' => 'required|numeric|min:0|max:500',
        ]);

        $theory = TheoryPartNumber::findOrFail($id);
        $theory->update($data);

        return redirect()->route('theory.index')->with('success', 'Theory part number updated successfully.');
    }

    public function destroy($id) {
        $theory = TheoryPartNumber::findOrFail($id);
        $theory->delete();

        return redirect()->route('theory.index')->with('success', 'Theory part number deleted successfully.');
    }
}