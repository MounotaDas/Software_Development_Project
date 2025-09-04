<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', function () {
    return view('login');
})->name('login');


Route::post('/login', function (Request $request) {
    $email = $request->input('email');
    $password = $request->input('password');
    
    if($email === 'mounota@gmail.com' && $password === 'mounota') {
        Session::put('logged_in', true);
        return redirect('/front');
    }
    return redirect()->back()->with('error', 'Invalid credentials');
})->name('DOLOGIN');
Route::get('/front', function () {
    if (!Session::get('logged_in')) {
        return redirect()->route('login');
    }
    return view('front');
})->name('front');

Route::get('/logout', function () {
    Session::flush();
    return redirect()->route('login');
})->name('logout');

Route::get('/Home', function () {
    return view('Home');
});
Route::get('/Contact', function () {
    return view('Contact');
});
Route::get('/home', function () {
    return view('Home'); 
})->name('home');

Route::get('/contact', function () {
    return view('Contact'); 
})->name('contact');

