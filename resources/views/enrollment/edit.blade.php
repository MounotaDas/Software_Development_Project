<!DOCTYPE html>
<html>
<head>
    <title>Edit Enrollment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h3>Edit Enrollment</h3>

<!-- Display Validation Errors -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

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

</body>
</html>