<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\TheoryPartNumberController;
use App\Http\Controllers\LabPartNumberController;
use App\Http\Controllers\ResultCalculatedController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontController;


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
Route::get('/front', [FrontController::class, 'index'])->name('front');

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



// Authentication routes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('DOLOGIN');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/front', function () {
    if (!Session::get('logged_in')) {
        return redirect()->route('login');
    }
    return view('front');
})->name('front');

// Users CRUD
Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/', [UserController::class, 'store'])->name('users.store');
    Route::get('/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});

// Semesters CRUD
Route::prefix('semesters')->group(function () {
    Route::get('/', [SemesterController::class, 'index'])->name('semesters.index');
    Route::get('/create', [SemesterController::class, 'create'])->name('semesters.create');
    Route::post('/', [SemesterController::class, 'store'])->name('semesters.store');
    Route::get('/{id}', [SemesterController::class, 'show'])->name('semesters.show');
    Route::get('/{id}/edit', [SemesterController::class, 'edit'])->name('semesters.edit');
    Route::put('/{id}', [SemesterController::class, 'update'])->name('semesters.update');
    Route::delete('/{id}', [SemesterController::class, 'destroy'])->name('semesters.destroy');
});

// Courses CRUD

Route::prefix('courses')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('courses.index'); // List all courses
    Route::get('/create', [CourseController::class, 'create'])->name('courses.create'); // Show create form
    Route::post('/', [CourseController::class, 'store'])->name('courses.store'); // Store new course
    Route::get('/{id}', [CourseController::class, 'show'])->name('courses.show'); // Show course details
    Route::get('/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit'); // Show edit form
    Route::put('/{id}', [CourseController::class, 'update'])->name('courses.update'); // Update course
    Route::delete('/{id}', [CourseController::class, 'destroy'])->name('courses.destroy'); // Delete course
});

// Enrollments CRUD
Route::prefix('enrollments')->group(function () {
    Route::get('/', [EnrollmentController::class, 'index'])->name('enrollments.index');
    Route::get('/create', [EnrollmentController::class, 'create'])->name('enrollments.create');
    Route::post('/', [EnrollmentController::class, 'store'])->name('enrollments.store');
    Route::get('/{id}', [EnrollmentController::class, 'show'])->name('enrollments.show');
    Route::get('/{id}/edit', [EnrollmentController::class, 'edit'])->name('enrollments.edit');
    Route::put('/{id}', [EnrollmentController::class, 'update'])->name('enrollments.update');
    Route::delete('/{id}', [EnrollmentController::class, 'destroy'])->name('enrollments.destroy');
});

// Theory Part Numbers CRUD
Route::prefix('theory')->group(function () {
    Route::get('/', [TheoryPartNumberController::class, 'index'])->name('theory.index');
    Route::get('/create', [TheoryPartNumberController::class, 'create'])->name('theory.create');
    Route::post('/', [TheoryPartNumberController::class, 'store'])->name('theory.store');
    Route::get('/{id}', [TheoryPartNumberController::class, 'show'])->name('theory.show');
    Route::get('/{id}/edit', [TheoryPartNumberController::class, 'edit'])->name('theory.edit');
    Route::put('/{id}', [TheoryPartNumberController::class, 'update'])->name('theory.update');
    Route::delete('/{id}', [TheoryPartNumberController::class, 'destroy'])->name('theory.destroy');
});

// Lab Part Numbers CRUD
Route::prefix('lab')->group(function () {
    Route::get('/', [LabPartNumberController::class, 'index'])->name('lab.index');
    Route::get('/create', [LabPartNumberController::class, 'create'])->name('lab.create');
    Route::post('/', [LabPartNumberController::class, 'store'])->name('lab.store');
    Route::get('/{id}', [LabPartNumberController::class, 'show'])->name('lab.show');
    Route::get('/{id}/edit', [LabPartNumberController::class, 'edit'])->name('lab.edit');
    Route::put('/{id}', [LabPartNumberController::class, 'update'])->name('lab.update');
    Route::delete('/{id}', [LabPartNumberController::class, 'destroy'])->name('lab.destroy');
});

// Results Calculated CRUD
Route::prefix('results')->group(function () {
    Route::get('/', [ResultCalculatedController::class, 'index'])->name('results.index');
    Route::get('/create', [ResultCalculatedController::class, 'create'])->name('results.create');
    Route::post('/', [ResultCalculatedController::class, 'store'])->name('results.store');
    Route::get('/{id}', [ResultCalculatedController::class, 'show'])->name('results.show');
    Route::get('/{id}/edit', [ResultCalculatedController::class, 'edit'])->name('results.edit');
    Route::put('/{id}', [ResultCalculatedController::class, 'update'])->name('results.update');
    Route::delete('/{id}', [ResultCalculatedController::class, 'destroy'])->name('results.destroy');
});
Route::get('/enrollments', [EnrollmentController::class, 'index'])->name('enrollments.index');
Route::get('/enrollments', [EnrollmentController::class, 'index'])->name('enrollments.index');
Route::get('/search', [CourseController::class, 'search'])->name('search');
Route::get('/enrollment', [EnrollmentController::class, 'index'])->name('enrollment.index');
Route::post('/enrollment-submit', [EnrollmentController::class, 'submit'])->name('enrollment.submit');
