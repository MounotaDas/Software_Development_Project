<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function create() {
        return view('user.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            // validation rules
        ]);
        User::create($data);
        return redirect()->route('user.index');
    }

    public function show($id) {
        $user = User::findOrFail($id);
        return view('user.show', compact('user'));
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id) {
        $data = $request->validate([
            // validation rules
        ]);
        $user = User::findOrFail($id);
        $user->update($data);
        return redirect()->route('user.index');
    }

    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index');
    }
}
