<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        // Check for hardcoded credentials
        if ($credentials['email'] === 'mounota@gmail.com' && 
            $credentials['password'] === 'mounota') {
            
            // Create a session
            session(['logged_in' => true]);
            return redirect('/front');
        }

        return redirect()
            ->back()
            ->with('error', 'Invalid credentials');
    }

    public function logout(Request $request)
    {
        session()->forget('logged_in');
        return redirect()->route('login');
    }
}
