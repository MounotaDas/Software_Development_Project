<!DOCTYPE html>
<html>
<head>
    <title>Enrollment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<!-- ✅ Show success message -->
@if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
@endif

<!-- ✅ Display Validation Errors -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- ✅ Main Section Switch --}}
@if($page == 'index')
    {{-- ================== ENROLLMENT LIST ================== --}}
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <h4>Enrollments List</h4>
        <a href="{{ route('enrollments.create') }}" class="btn btn-primary">Add Enrollment</a>
      </div>
      <div class="card-body">
        @if($enrollments->isEmpty())
          <p>No enrollments available. <a href="{{ route('enrollments.create') }}">Add one</a>.</p>
        @else
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Student ID</th>
                <th>Course Code</th>
                <th>Course Name</th>
                <th>Semester No</th>
                <th>Type</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($enrollments as $enrollment)
              <tr>
                <td>{{ $enrollment->id }}</td>
                <td>{{ $enrollment->student_id }}</td>
                <td>{{ $enrollment->course_code }}</td>
                <td>{{ $enrollment->course_name }}</td>
                <td>{{ $enrollment->semester_no }}</td>
                <td>{{ ucfirst($enrollment->type) }}</td>
                <td>
                  <a href="{{ route('enrollments.show', $enrollment->id) }}" class="btn btn-info btn-sm">Show</a>
                  <a href="{{ route('enrollments.edit', $enrollment->id) }}" class="btn btn-success btn-sm">Edit</a>
                  <form action="{{ route('enrollments.destroy', $enrollment->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        @endif
      </div>
    </div>

@elseif($page == 'create')
    {{-- ================== CREATE ENROLLMENT ================== --}}
    <h3>Add New Enrollment</h3>
    <form action="{{ route('enrollments.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label>Student ID</label>
        <input type="number" name="student_id" class="form-control" value="{{ old('student_id') }}" required>
      </div>
      <div class="mb-3">
        <label>Course Code</label>
        <input type="text" name="course_code" class="form-control" value="{{ old('course_code') }}" required>
      </div>
      <div class="mb-3">
        <label>Course Name</label>
        <input type="text" name="course_name" class="form-control" value="{{ old('course_name') }}" required>
      </div>
      <div class="mb-3">
        <label>Semester No</label>
        <input type="number" name="semester_no" class="form-control" value="{{ old('semester_no') }}" required>
      </div>
      <div class="mb-3">
        <label>Type</label>
        <select name="type" class="form-control" required>
          <option value="">Select Type</option>
          <option value="regular">Regular</option>
          <option value="optional">Optional</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Save</button>
      <a href="{{ route('enrollments.index') }}" class="btn btn-secondary">Back</a>
    </form>

@elseif($page == 'edit')
    {{-- ================== EDIT ENROLLMENT ================== --}}
    <h3>Edit Enrollment</h3>
    <form action="{{ route('enrollments.update', $enrollment->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label>Student ID</label>
        <input type="number" name="student_id" class="form-control" value="{{ old('student_id', $enrollment->student_id) }}" required>
      </div>
      <div class="mb-3">
        <label>Course Code</label>
        <input type="text" name="course_code" class="form-control" value="{{ old('course_code', $enrollment->course_code) }}" required>
      </div>
      <div class="mb-3">
        <label>Course Name</label>
        <input type="text" name="course_name" class="form-control" value="{{ old('course_name', $enrollment->course_name) }}" required>
      </div>
      <div class="mb-3">
        <label>Semester No</label>
        <input type="number" name="semester_no" class="form-control" value="{{ old('semester_no', $enrollment->semester_no) }}" required>
      </div>
      <div class="mb-3">
        <label>Type</label>
        <select name="type" class="form-control" required>
          <option value="regular" {{ old('type', $enrollment->type) == 'regular' ? 'selected' : '' }}>Regular</option>
          <option value="optional" {{ old('type', $enrollment->type) == 'optional' ? 'selected' : '' }}>Optional</option>
        </select>
      </div>
      <button type="submit" class="btn btn-success">Update</button>
      <a href="{{ route('enrollments.index') }}" class="btn btn-secondary">Back</a>
    </form>

@elseif($page == 'show')
    {{-- ================== SHOW ENROLLMENT ================== --}}
    <h3>Enrollment Details</h3>
    <div class="card">
      <div class="card-body">
        <ul class="list-group">
          <li class="list-group-item"><strong>ID:</strong> {{ $enrollment->id }}</li>
          <li class="list-group-item"><strong>Student ID:</strong> {{ $enrollment->student_id }}</li>
          <li class="list-group-item"><strong>Course Code:</strong> {{ $enrollment->course_code }}</li>
          <li class="list-group-item"><strong>Course Name:</strong> {{ $enrollment->course_name }}</li>
          <li class="list-group-item"><strong>Semester No:</strong> {{ $enrollment->semester_no }}</li>
          <li class="list-group-item"><strong>Type:</strong> {{ ucfirst($enrollment->type) }}</li>
        </ul>
      </div>
    </div>
    <div class="mt-3">
      <a href="{{ route('enrollments.index') }}" class="btn btn-secondary">Back</a>
      <a href="{{ route('enrollments.edit', $enrollment->id) }}" class="btn btn-warning">Edit</a>
    </div>
@endif

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
