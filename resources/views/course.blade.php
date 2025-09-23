@extends('layout')
@section('title','Course')
@section('content4')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Courses List</h3>
            <!-- Button trigger Add Modal -->
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCourseModal">Add Course</button>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Semester</th>
                        <th>Course Code</th>
                        <th>Course Name</th>
                        <th>Credit Hours</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                    <tr>
                        <td>{{ $course->id }}</td>
                        <td>{{ $course->semester_no }}</td>
                        <td>{{ $course->course_code }}</td>
                        <td>{{ $course->course_name }}</td>
                        <td>{{ $course->credit_hours }}</td>
                        <td>
                            <!-- Edit Button -->
                            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editCourseModal{{ $course->id }}">Edit</button>

                            <!-- Delete Form -->
                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editCourseModal{{ $course->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-success text-white">
                                    <h5 class="modal-title">Edit Course</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('courses.update', $course->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label class="form-label">Semester</label>
                                            <input type="text" name="semester_no" class="form-control" value="{{ $course->semester_no }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Course Code</label>
                                            <input type="text" name="course_code" class="form-control" value="{{ $course->course_code }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Course Name</label>
                                            <input type="text" name="course_name" class="form-control" value="{{ $course->course_name }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Credit Hours</label>
                                            <input type="number" step="0.1" name="credit_hours" class="form-control" value="{{ $course->credit_hours }}" required>
                                        </div>
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addCourseModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Add New Course</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('courses.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Semester</label>
                        <input type="text" name="semester_no" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Course Code</label>
                        <input type="text" name="course_code" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Course Name</label>
                        <input type="text" name="course_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Credit Hours</label>
                        <input type="number" step="0.1" name="credit_hours" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection